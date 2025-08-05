const oracledb = require('oracledb');
const { OpenDB } = require('../db/oracleConnection');

// CREAR RESERVA
const crearReserva = async (req, res) => {
  const { ID_Usuario, ID_Espacio, ID_Vehiculo } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `
      BEGIN
        PKG_PARQUEO.SP_CREAR_RESERVA(:ID_Usuario, :ID_Espacio, :ID_Vehiculo, :resultado);
      END;
      `,
      {
        ID_Usuario: { val: ID_Usuario, dir: oracledb.BIND_IN },
        ID_Espacio: { val: ID_Espacio, dir: oracledb.BIND_IN },
        ID_Vehiculo: { val: ID_Vehiculo, dir: oracledb.BIND_IN },
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
  const idUsuario = req.params.idUsuario;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN PKG_PARQUEO.SP_LISTAR_RESERVAS_PENDIENTES(:idUsuario, :cursor); END;`,
      {
        idUsuario: parseInt(idUsuario),
        cursor: { dir: oracledb.BIND_OUT, type: oracledb.CURSOR }
      }
    );

    const resultSet = result.outBinds.cursor;
    const rows = await resultSet.getRows();
    await resultSet.close();
    await connection.close();

    const reservas = rows.map(row => ({
      id_reserva: row[0],
      nombre_usuario: row[1],
      placa_vehiculo: row[3], // columna 3 es ID_Espacio
      monto_total: row[4]
    }));

    res.status(200).json(reservas);
  } catch (error) {
    console.error("Error al listar reservas pendientes por usuario:", error);
    res.status(500).json({ error: "Error al obtener reservas del usuario." });
  }
};

// LISTAR RESERVAS ACTIVAS
const listarReservasActivas = async (req, res) => {
const idUsuario = req.params.idUsuario;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN PKG_PARQUEO.SP_LISTAR_RESERVAS_ACTIVAS(:idUsuario, :cursor); END;`,
      {
        idUsuario: parseInt(idUsuario),
        cursor: { dir: oracledb.BIND_OUT, type: oracledb.CURSOR }
      }
    );

    const resultSet = result.outBinds.cursor;
    const rows = await resultSet.getRows();
    await resultSet.close();
    await connection.close();

    const reservas = rows.map(row => ({
      id_reserva: row[0],
      nombre_usuario: row[1],
      placa_vehiculo: row[3],
      monto_total: row[4]
    }));

    res.status(200).json(reservas);
  } catch (error) {
    console.error("Error al listar reservas activas por usuario:", error);
    res.status(500).json({ error: "Error al obtener reservas activas del usuario." });
  }
};

module.exports = {
  crearReserva,
  listarPendientes,
  listarReservasActivas
};

