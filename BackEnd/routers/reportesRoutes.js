const express = require("express");
const router = express.Router();

const {obtenerCantidadReservas, obtenerCantidadVehiculos} = require("../controllers/reportesController");

router.get("/cantidadReservas/:id_usuario", obtenerCantidadReservas);
router.get("/cantidadVehiculos/:id_usuario", obtenerCantidadVehiculos);

module.exports = router;