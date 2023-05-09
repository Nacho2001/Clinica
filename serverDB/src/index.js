// Invoca servicios requeridos
const express = require('express');
const cors = require('cors');
const morgan = require('morgan');
// Obtiene funciones de express en server
const server = express()

//Utiliza formato JSON
server.use(express.json())

//Establece cominucacion entre cliente y servidor con cors
server.use(cors())

//Notifica las peticiones por consola
server.use(morgan())

// Fijar puerto que utiliza el server
server.set('port', process.env.PORT || 7000)
server.listen(server.get('port'))

console.log(`Server ejecutandose en puerto ${server.get('port')}`)