const express = require("express");
const router = express.Router();
const { crearReserva } = require("../controllers/reservaController");

router.post("/crear", crearReserva);

module.exports = router;