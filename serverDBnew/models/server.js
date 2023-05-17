const express = require('express');
const cors = require('cors');
const morgan = require('morgan');

class Server {
    constructor(){
        this.app = express();
        this.routes();
        this.middlewares();
    }
    routes(){
        this.app.use('/api/switches', require('./../routes/switchesRoute'))
    }
    middlewares(){
        this.app.use(express.json());
        this.app.use(cors());
        this.app.use(morgan());
    }
    listen(){
        this.app.listen(9770, () =>{
            console.log("Servidor corriendo en el puerto 9770");
        })
    }
}