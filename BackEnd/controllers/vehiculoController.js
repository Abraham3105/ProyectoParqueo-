const oracledb = require("oracledb");
const { OpenDB } = require("../db/oracleConnection");

const ingresarVehiculo = async (req, res) => {
  const { idTipoVehiculo, idModelo, idPlaca, idUsuario } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN
         SP_INGRESAR_VEHICULO(:idTipoVehiculo, :idModelo, :idPlaca, :idUsuario, :resultado);
       END;`,
      {
        idTipoVehiculo: { val: idTipoVehiculo, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        idModelo: { val: idModelo, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        idPlaca: { val: idPlaca, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        idUsuario: { val: idUsuario, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        resultado: { dir: oracledb.BIND_OUT, type: oracledb.STRING, maxSize: 100 }
      }
    );

    await connection.commit();
    await connection.close();

    const estado = result.outBinds.resultado;

    if (estado === 'VEHICULO_REGISTRADO') {
      res.status(200).json({ message: 'Vehículo registrado correctamente.' });
    } else {
      res.status(500).json({ message: 'Error al registrar el vehículo.' });
    }
  } catch (error) {
    console.error("Error al registrar vehículo:", error);
    res.status(500).json({ message: "Error en el servidor al registrar el vehículo." });
  }
};

module.exports = { ingresarVehiculo };
