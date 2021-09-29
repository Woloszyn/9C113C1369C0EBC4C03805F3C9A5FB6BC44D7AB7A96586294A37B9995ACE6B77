<template>
    <div id="produto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="titulo">
                        <h3>
                            Cadastro de Produtos
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Nome Produto
                </div>
                <div class="col-6">
                    <input type="text" v-model="nome" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    SKU
                </div>
                <div class="col-6">
                    <input type="text" v-model="sku" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    Quantidade
                </div>
                <div class="col-6">
                    <input type="text" v-model="quantidade_inicial" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-success" @click="save">
                        <i class="material-icons">save</i> Salvar
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SKU</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade Inicial</th>
                            <th scope="col">Quantidade Atual</th>
                            <th scope="col">Movimentacões</th>
                            <th scope="col">Histórico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="produto in produtos" :key="produto.sku">
                            <th>{{produto.sku}}</th>
                            <td>{{produto.nome}}</td>
                            <td>{{produto.quantidade_inicial}}</td>
                            <td>{{produto.quantidade_atual}}</td>
                            <td><button><i class="material-icons" @click="movimentar(produto.sku)">edit</i></button></td>
                            <td><button @click="historico(produto.sku)"><i class="material-icons">history</i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import ModalMovimentacao from './ModalMovimentacao.vue';
import Historico from './HistoricoModal.vue';

export default {
    data() {
        return {
            'nome' : '',
            'sku' : '',
            'quantidade_inicial' : '',
            totalMovimentacao: 0,
            produtos: [],
        }
    },
    methods: {
        save() {
            let data = {
                nome : this.nome,
                sku : this.sku,
                quantidade_inicial : this.quantidade_inicial,
            };
            this.axios.post('/produto', data).then((response) => {
                this.limpar();
            }).catch((error) => {
                alert('Oh no ' + error.data.error)
            })
        },
        movimentar(sku) {
            this.$modal.show(ModalMovimentacao, { 'sku': sku });
        },
        historico(sku) {
            this.$modal.show(Historico, { 'sku': sku });
        },
        limpar()  {
            this.nome = ''
            this.sku = ''
            this.quantidade_inicial = ''
        }
    },
    mounted() {
        this.produtos = JSON.parse(this.$attrs.jsonprodutos);
    }

}
</script>

<style>

</style>