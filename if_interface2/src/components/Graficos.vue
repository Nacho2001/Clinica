<template>
    <div>
        <h3>Seleccionar Switches</h3>
        <div>
            <select id="switch"></select>
            <button style="margin-left: 1%;" @click="getSwitch()">Añadir</button>
            <div style="margin-top: 1%;">
                Switches seleccionados: <a id="switchList"></a>
            </div>
        </div>
    </div>
</template>
<script>
const axios = require('axios');

export default {
    name:'GraficosComponent',
    methods: {
        obtenerSwitches(){
            axios.get('http://localhost:9770/switches/')
            .then(function(response){
                let lista=response.data.data
                lista.forEach(objeto => {
                    let option = document.createElement("option")
                    option.text = objeto.switch,
                    option.value = objeto.switch
                    document.getElementById("switch").appendChild(option)
                });
            })
            .catch(function(error){
                console.log(error)
            })
        },
        getSwitch(){
            let host = document.getElementById("switch").value
            document.getElementById("switchList").append(host)
            /*seleccionados.push(host)
            seleccionados.forEach(element => {
                console.log(element)
            });*/
        }
    },
    mounted(){
        this.obtenerSwitches()
        /*let seleccionados = []*/

    }
}
</script>