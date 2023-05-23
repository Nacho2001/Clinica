// Conexion con la base de datos
const mysql = require('mysql2');
//const config = require('./../config');
const pool = mysql.createPool({
    host: "localhost",
    user: "ServerDB2",
    password: "ServerClinica",
    database: "iperf"
})

module.exports = pool.promise()