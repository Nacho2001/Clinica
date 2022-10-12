const express = require('express');

// se importan todas las funciones de router
const enrutador = express.Router();

//Llamada a la bd
const db = require('../database')

//Operación para agregar un email
enrutador.post('/db', (req,res) => {
    const email = req.body;
    db.query('insert into login set ?',[email], (err,result) => {
        if(err){
            return console.log('Ocurrió un error')
        }else{
            res.json('Email insertado')
        };
    });

})

module.exports = enrutador