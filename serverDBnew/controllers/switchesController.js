const switchModel = require('./../models/switchesModel')

exports.listarSwitches = async (req,res) => {
    try {
        const switches = await switchModel.listarSwitches();
        res.status(200).json({
            sucess:true,
            data:switches
        })
    } catch (error) {
        console.log(error)
        res.status(500).json({
            sucess:false,
            message:"Error al obtener los switches"
        })
    }
}

exports.obtenerX = async (req,res) => {
    try { 
        const valuesX = await switchModel.obtenerX();
        res.status(200).json({
            sucess:true,
            data:valuesX
        })
    } catch (error) {
        res.status(500).json({
            sucess:false,
            message:"Error al obtener los datos de X"
        })
    }
}

exports.obtenerY = async (req,res) => {
    const ubicacion = req.params.switch
    try {
        const valuesY = await switchModel.obtenerY(ubicacion);
        res.status(200).json({
            sucess:true,
            data:valuesY
        })
    } catch (error) {
        res.status(500).json({
            sucess:false,
            message:"Error al obtener datos de Y"
        })
    }
}