const mysql = require('mysql')
const db = mysql.createConnection({
    host:'10.1.1.199',
    user:'login', 
    password:'cp123456',
    database:'loginData'
});

//acá se pone en marcha la conexion
db.connect(function(err){
    if (err){
        console.log("Error de conexión")
        return;
    }else{
        console.log('La conexión fue exitosa!')
    }
})

module.exports = db;