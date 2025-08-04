const express = require('express');
const router = express.Router();

// Importa los controladores necesarios
const { crearReserva, listarPendientes, listarReservasActivas } = require('../controllers/reservaController');

// Ruta POST para crear una nueva reserva
router.post('/crear', crearReserva);

// Ruta GET para listar todas las reservas con estado pendiente (ID_Estado = 3)
router.get('/pendientes/:idUsuario', listarPendientes);

// Ruta GET para listar reservas activas (ID_Estado = 1)
router.get('/activas/:idUsuario', listarReservasActivas);

// Exporta el router para que pueda ser usado en server.js
module.exports = router;
