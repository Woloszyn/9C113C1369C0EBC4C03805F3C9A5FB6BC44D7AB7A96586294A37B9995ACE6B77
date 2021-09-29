<template>
    <div class="historico">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Movimentacao</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="produto in produtos" :key="produto.sku">
                    <th>{{produto.sku}}</th>
                    <td>{{produto.nome}}</td>
                    <td>{{produto.movimentacao}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {

    props:{
        'sku' : {required : true}
    },
    data() {
        return {
            produtos: []
        }
    }

}
</script>

<style>

</style>