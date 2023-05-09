const mysql = require('mysql');

const db = mysql-mysql.createConnection({
    host:'localhost',
    user:'serverDB',
    password:'serverAdmin',
    database:'apidb'
});

db.connect(function(err){
    if (err){
        console.log("Error al conectar con la base")
    }else{
        console.log("Conexion con la base exitosa!")
    }
})

module.exports = db;