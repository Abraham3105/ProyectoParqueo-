const oracledb = require("oracledb");
const { OpenDB } = require("../db/oracleConnection");

// Registrar vehículo
const ingresarVehiculo = async (req, res) => {
  const { idModelo, placa, idUsuario } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
    `BEGIN
      PKG_PARQUEO.SP_INGRESAR_VEHICULO(:idModelo, :placa, :idUsuario, :resultado);
    END;`,
    {

      idModelo: { val: idModelo, dir: oracledb.BIND_IN },
      placa: { val: placa, dir: oracledb.BIND_IN },
      idUsuario: { val: idUsuario, dir: oracledb.BIND_IN },
      resultado: { dir: oracledb.BIND_OUT, type: oracledb.STRING, maxSize: 100 }
    }
  );

    await connection.commit();
    await connection.close();

    const estado = result.outBinds.resultado;

    if (estado === "VEHICULO_REGISTRADO") {
      res.status(200).json({ message: "Vehículo registrado correctamente." });
    } else {
      res.status(400).json({ message: estado });
    }
  } catch (error) {
    console.error("Error al registrar vehículo:", error);
    res.status(500).json({ message: "Error en el servidor al registrar el vehículo." });
  }
};

// Obtener modelos y tipos
const obtenerModelosVehiculos = async (req, res) => {
  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN PKG_PARQUEO.SP_OBTENER_MODELOS(:cursor); END;`,
      {
        cursor: { dir: oracledb.BIND_OUT, type: oracledb.CURSOR }
      }
    );

    const resultSet = result.outBinds.cursor;
    const rows = await resultSet.getRows(); // o getRows(n) si quieres limitar

    await resultSet.close();
    await connection.close();

    const data = rows.map(row => ({
      idModelo: row[0],
      descripcion: row[1]
    }));

    res.status(200).json(data);
  } catch (error) {
    console.error("Error al obtener modelos:", error);
    res.status(500).json({ message: "Error al obtener modelos de vehículos" });
  }
};

// Listar vehículos por usuario
const listarVehiculosPorUsuario = async (req, res) => {
  const idUsuario = req.params.idUsuario;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN PKG_PARQUEO.SP_LISTAR_VEHICULOS_USUARIO(:idUsuario, :cursor); END;`,
      {
        idUsuario: { val: Number(idUsuario), dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        cursor: { dir: oracledb.BIND_OUT, type: oracledb.CURSOR }
      }
    );

    const resultSet = result.outBinds.cursor;
    const rows = await resultSet.getRows(); // podés pasarle un número, ej. getRows(100)
    await resultSet.close();
    await connection.close();

    const data = rows.map(row => ({
      idVehiculo: row[0],
      placa: row[1],
      modelo: row[2],
      tipo: row[3],
      estado: row[4]
    }));

    res.status(200).json(data);
  } catch (error) {
    console.error("Error al listar vehículos:", error);
    res.status(500).json({ message: "Error al listar vehículos del usuario" });
  }
};


module.exports = {
  ingresarVehiculo,
  obtenerModelosVehiculos,
  listarVehiculosPorUsuario
};

