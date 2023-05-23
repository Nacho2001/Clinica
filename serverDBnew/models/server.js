const express = require('express');
const cors = require('cors');

class Server {
    constructor(){
        this.app = express();
        this.middlewares();
        this.routes();
    }
    routes(){
        this.app.use('/switches', require('../routes/switchesRoute'))
    }
    middlewares(){
        this.app.use(express.json());
        this.app.use(cors());
    }
    listen(){
        this.app.listen(9770, () => {
            console.log("Servidor corriendo en el puerto 9770");
        })
    }
}

module.exports = Server