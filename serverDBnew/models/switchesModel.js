const db = require('../config/db');

//Obtiene lista de switches
exports.listarSwitches = async () => {
    const [rows,fields] = await db.execute('select switch from switches');
    return rows;
}

//Obtener fechas para valores Y
exports.obtenerX = async () => {
    const [rows,fields] = await db.execute('select distinct dia from diario_ps');
    return rows;
} 

exports.obtenerY = async (ubicacion) => {
    const [rows,fields] = await db.execute('select medido from diario_ps where ubicacion = ?', [ubicacion]);
    return rows;
}

