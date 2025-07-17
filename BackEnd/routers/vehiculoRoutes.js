const express = require("express");
const router = express.Router();
const { ingresarVehiculo } = require("../controllers/vehiculoController");

router.post("/registrar", ingresarVehiculo);

module.exports = router;
