const express = require('express');
const router = express.Router();
const pagosController = require('../controllers/pagosController');

router.post('/', pagosController.pagarReserva); // POST /api/pagos

module.exports = router;