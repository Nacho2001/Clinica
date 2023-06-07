<template>
    <div>
        <h3>Seleccionar Switches</h3>
        <div>
            <select id="switch">
                <!--<option v-for="host of lista" v-bind:key="host.switch" v-bind:value="host.switch">{{host.switch}}</option>-->
            </select>
            <div id="result"></div>
        </div>
    </div>
</template>
<script>
const axios = require('axios');
    axios.get('http://localhost:9770/switches/')
    .then(function(response){
        let obe=response.data.data[1].switch
        console.log(obe)
    })
    .catch(function(error){
        console.log(error)
    })
export default {
    name:'GraficosComponent'/*,
    data(){
        return{
            lista:[]
        }
    },
    methods:{
        obtenerListaSwitches(){
            axios.get('http://localhost:9770/switches/')
            .then(function(response){
                lista = response.data;
            })
            .catch(function(error){
                console.log(error)
            })
        }
    },
    mounted(){
        this.obtenerListaSwitches()
    }*/
}
</script>