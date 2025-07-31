const oracledb = require('oracledb');
const { OpenDB } = require('../db/oracleConnection');

// CREAR RESERVA
const crearReserva = async (req, res) => {
  const { ID_Usuario, ID_Espacio } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `
      BEGIN
        SP_CREAR_RESERVA(:ID_Usuario, :ID_Espacio, :resultado);
      END;
      `,
      {
        ID_Usuario: { val: ID_Usuario, dir: oracledb.BIND_IN },
        ID_Espacio: { val: ID_Espacio, dir: oracledb.BIND_IN },
        resultado: { dir: oracledb.BIND_OUT, type: oracledb.STRING, maxSize: 100 }
      }
    );

    await connection.commit();
    await connection.close();

    const mensaje = result.outBinds.resultado;

    if (mensaje === 'RESERVA_EXITOSA') {
      res.status(200).json({ mensaje });
    } else {
      res.status(400).json({ error: mensaje });
    }
  } catch (error) {
    console.error('Error al crear reserva:', error);
    res.status(500).json({ error: 'Error interno del servidor.' });
  }
};

// LISTAR RESERVAS PENDIENTES
const listarPendientes = async (req, res) => {
  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `SELECT R.ID_RESERVA, U.NOMBRE AS nombre_usuario, V.PLACA AS placa_vehiculo, R.MONTO_TOTAL
       FROM FIDE_RESERVAS_TB R
       JOIN FIDE_USUARIO_TB U ON R.ID_USUARIO = U.ID_USUARIO
       JOIN FIDE_VEHICULO_TB V ON V.ID_USUARIO = R.ID_USUARIO
       WHERE R.ID_ESTADO = 3`
    );

    const reservas = result.rows.map(row => ({
      id_reserva: row[0],
      nombre_usuario: row[1],
      placa_vehiculo: row[2],
      monto_total: row[3]
    }));

    await connection.close();
    res.status(200).json(reservas);

  } catch (error) {
    console.error("Error al listar reservas pendientes:", error);
    res.status(500).json({ error: "Error al obtener reservas pendientes." });
  }
};

module.exports = {
  crearReserva,
  listarPendientes
};

