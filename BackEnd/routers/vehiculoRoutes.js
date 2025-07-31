const express = require("express");
const router = express.Router();
const {
  obtenerModelosVehiculos,
  ingresarVehiculo,
  listarVehiculosPorUsuario // NUEVO
} = require("../controllers/vehiculoController");

router.get("/modelos", obtenerModelosVehiculos);
router.post("/crear", ingresarVehiculo);

// NUEVA RUTA: Para listar vehículos del usuario por ID
router.get("/listarvehiculo/usuario/:id", listarVehiculosPorUsuario);

module.exports = router;