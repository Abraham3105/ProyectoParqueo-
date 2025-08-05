const oracledb = require("oracledb");
const { OpenDB } = require("../db/oracleConnection");

// Registrar vehículo
const ingresarVehiculo = async (req, res) => {
  const { id_modelo, placa, id_usuario } = req.body;

  try {
    const connection = await OpenDB();

    const result = await connection.execute(
      `BEGIN
         SP_INGRESAR_VEHICULO(:id_modelo, :placa, :id_usuario, :resultado);
       END;`,
      {
        id_modelo: { val: id_modelo, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        placa: { val: placa, dir: oracledb.BIND_IN, type: oracledb.STRING },
        id_usuario: { val: id_usuario, dir: oracledb.BIND_IN, type: oracledb.NUMBER },
        resultado: { dir: oracledb.BIND_OUT, type: oracledb.STRING, maxSize: 100 }
      }
    );

    const mensaje = result.outBinds.resultado;

    if (mensaje === 'VEHICULO_REGISTRADO') {
      res.status(200).json({ ok: true, mensaje });
    } else {
      res.status(400).json({ ok: false, mensaje });
    }

    await connection.close();
  } catch (error) {
    console.error("Error al registrar vehículo:", error);
    res.status(500).json({ ok: false, mensaje: error.message });
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

