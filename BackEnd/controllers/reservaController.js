const oracledb = require('oracledb');
const { OpenDB } = require('../db/oracleConnection');

// Crear reserva
const crearReserva = async (req, res) => {
  const { idUsuario, idEspacio, montoTotal } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN
         SP_CREAR_RESERVA(:idUsuario, :idEspacio, :montoTotal, :resultado);
       END;`,
      {
        idUsuario: { val: idUsuario, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        idEspacio: { val: idEspacio, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        montoTotal: { val: montoTotal, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        resultado: { dir: oracledb.BIND_OUT, type: oracledb.STRING, maxSize: 50 }
      }
    );

    await connection.commit();
    await connection.close();

    const estado = result.outBinds.resultado;

    if (estado === 'RESERVA_EXITOSA') {
      res.status(200).json({ message: 'Reserva creada exitosamente.' });
    } else {
      res.status(500).json({ message: 'Error al crear la reserva.' });
    }

  } catch (error) {
    console.error('Error al crear reserva:', error);
    res.status(500).json({ message: 'Error en el servidor al crear la reserva.' });
  }
};

module.exports = {
  crearReserva
};
