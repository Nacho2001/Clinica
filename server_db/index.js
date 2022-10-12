const express = require('express')
const cors = require('cors')
const morgan = require('morgan')
const enrutador = require('./routes/rutas')

const server = express()
server.use(express.json())
server.use(cors())
server.use(morgan('serve'))
server.set('port', process.env.PORT || 9090)
server.listen(server.get('port'))
server.use(enrutador)
console.log(`Servidor corriendo en el puerto ${server.get('port')}`)