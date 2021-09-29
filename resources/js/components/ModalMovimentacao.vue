<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                Movimentacao
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                Movimentar
            </div>
            <div class="col-6">
                <input type="text" v-model="totalMovimentacao">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <button @click="totalMovimentacao++"> + </button>
            </div>
            <div class="col-6">
                <button @click="totalMovimentacao--"> - </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button class="btn btn-success" @click="salvarMovimentacao">
                    <i class="material-icons">save</i> Salvar
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        'sku' : {required: true, type: String}
    },
    data() {
        return {
            totalMovimentacao: 0
        }
    },
    methods:{
        salvarMovimentacao() {
            let data = {
                sku : this.sku,
                quantidade : this.totalMovimentacao,
            };
            this.axios.post('/movimentacao', data).then((response) => {
                this.totalMovimentacao = 0;
            }).catch((error) => {
                alert('Oh no ' + error.data.error)
            })
        },
    }
}
</script>

<style>

</style>