const express = require('express');
const router = express.Router();
const switchesController = require('./../controllers/switchesController');

router.get('/',switchesController.listarSwitches);
router.get('/dataX',switchesController.obtenerX);
router.get('/dataY/:switch',switchesController.obtenerY);
module.exports = router;