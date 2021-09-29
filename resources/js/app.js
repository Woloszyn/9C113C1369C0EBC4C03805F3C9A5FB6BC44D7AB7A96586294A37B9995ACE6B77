require('./bootstrap');
import axios from 'axios'
import VueAxios from 'vue-axios'

window.Vue = require('vue');

Vue.component('produto', require('./components/Produto.vue').default);

Vue.use(VueAxios, axios)

const app = new Vue({
    el: '#app',
});