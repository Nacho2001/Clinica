<template>
    <div>
        <h3>Seleccionar Switches</h3>
        <div>
            <select id="switch">
                <option v-for="element of listaFull" v-bind:key="element.switch" v-bind:value="element.switch">{{element.switch}}</option>
            </select> 
            <button style="margin-left: 1%;" @click="getSwitch()">Añadir</button>
            <div style="margin-top: 1%;">
                Switches seleccionados: <a id="switchList"></a>
            </div>
            <button @click="obtenerY()">Ver elegidos</button>
        </div>
    </div>
</template>
<script>
const axios = require('axios');

export default {
    name:'GraficosComponent',
    data(){
        return {
            listaFull:[],
            mySwitches:[],
            valuesX:[],
            valuesY:[]
        }
    },
    methods: {
        obtenerSwitches(){
            axios.get('http://localhost:9770/switches/')
            /*.then(function(response){
                this.listaFull=response.data.data
                lista.forEach(objeto => {
                    let option = document.createElement("option")
                    option.text = objeto.switch,
                    option.value = objeto.switch
                    document.getElementById("switch").appendChild(option)
                });
            })*/
            .then(result => {
                this.listaFull = result.data.data
            })
            .catch(function(error){
                console.log(error)
            })
        },
        obtenerX(){
            axios.get('http://localhost:9770/switches/dataX')
            .then(result => { 
                let objetoFechas = result.data.data
                for (let i = 0; i < objetoFechas.length; i++) {
                    this.valuesX.push(objetoFechas[i])
                }
            })
        },
        obtenerY(){
            for (let i1 = 0; i1 < this.mySwitches.length; i1++) {
                this.valuesY[i1] = []
                axios.get(`http://localhost:9770/switches/dataY/${this.mySwitches[i1]}`)
                .then(result => {
                    let objetoDatoY = (result.data.data)
                    for (let i2 = 0; i2 < objetoDatoY.length; i2++) {
                        this.valuesY[i1].push(objetoDatoY[i2].medido)
                        
                    }
                })
                this.valuesY[i1].push(this.valuesY)
            }
        },
        getSwitch(){
            let host = document.getElementById("switch").value
            document.getElementById("switchList").append(`${host} `)
            this.mySwitches.push(host);
        }
    },
    mounted(){
        this.obtenerSwitches()
    }
}
</script>