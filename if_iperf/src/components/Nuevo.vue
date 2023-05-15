<template>
<div>
    <div class="row">
        <select name="switch2" style="margin-top: 5px">
                <option value="0">switch</option>
                <option v-for="switch of switches" v-bind:key=""></option>
        </select>
    </div>
</div>
</template>
<script>
    export default {
        name: 'Nuevo',
        data(){
            return {
                switches:[]
            }
        },
        methods:{
            listar_switches(){
                this.axios.get("http://localhost:7000/switches").then(result => {
                    this.switches = result.data;
                })
            }
        },
        mounted(){
            this.listar_switches()
        }
    }
</script>