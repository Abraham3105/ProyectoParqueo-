const oracledb = require("oracledb");
const { OpenDB } = require("../db/oracleConnection");

// Función: cantidad de reservas
const obtenerCantidadReservas = async (req, res) => {
  const id_usuario = Number(req.params.id_usuario); 

  if (isNaN(id_usuario)) {
    return res.status(400).json({ error: "ID de usuario inválido" });
  }

  try {
    const connection = await OpenDB();
    const result = await connection.execute(
      `BEGIN :cantidad := PKG_PARQUEO.FN_CANTIDAD_RESERVAS_USUARIO(:id_usuario); END;`,
      {
        id_usuario: { val: id_usuario, dir: oracledb.BIND_IN },
        cantidad: { dir: oracledb.BIND_OUT, type: oracledb.NUMBER }
      }
    );
    await connection.close();
    res.status(200).json({ cantidad: result.outBinds.cantidad });
  } catch (err) {
    console.error("Error al obtener cantidad de reservas:", err);
    res.status(500).json({ error: "Error al consultar reservas" });
  }
};

// Función: cantidad de vehículos
const obtenerCantidadVehiculos = async (req, res) => {
  const id_usuario = Number(req.params.id_usuario); 

  if (isNaN(id_usuario)) {
    return res.status(400).json({ error: "ID de usuario inválido" });
  }

  try {
    const connection = await OpenDB();
    const result = await connection.execute(
      `BEGIN :cantidad := PKG_PARQUEO.FN_CANTIDAD_VEHICULOS_USUARIO(:id_usuario); END;`,
      {
        id_usuario: { val: id_usuario, dir: oracledb.BIND_IN },
        cantidad: { dir: oracledb.BIND_OUT, type: oracledb.NUMBER }
      }
    );
    await connection.close();
    res.status(200).json({ cantidad: result.outBinds.cantidad });
  } catch (err) {
    console.error("Error al obtener cantidad de vehículos:", err);
    res.status(500).json({ error: "Error al consultar vehículos" });
  }
};

module.exports = {
  obtenerCantidadReservas,
  obtenerCantidadVehiculos
};
