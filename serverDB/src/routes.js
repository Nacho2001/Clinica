const express = require('express');
const enrutador = express.Router()
const db = require('database')

// Consigue todos los switches del listado
enrutador.get('/switches', (req,res) => {
    db.query('select switch from switches', (err, rows) => {
        if(err){
            console.log("Ocurrió un error al obtener los switches")
        }else{
            res.json(rows)
        }
    })
})

// Consigue datos de un unico switch
enrutador.get('/switches/:switch', async (req,res) => {
    const id = req.params.codigo;
    await db.query('select medido from diario_ps', (err, rows) => {
        if(err){
            console.log("Error al obtener switch")
        }else{
            res.json(rows[0]);
        }
    })
})