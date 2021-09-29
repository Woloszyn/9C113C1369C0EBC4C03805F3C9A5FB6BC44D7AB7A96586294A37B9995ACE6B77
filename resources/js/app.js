require('./bootstrap');
import axios from 'axios'
import VueAxios from 'vue-axios'
import VModal from 'vue-js-modal'

window.Vue = require('vue');

Vue.component('produto', require('./components/Produto.vue').default);

Vue.use(VueAxios, axios)
Vue.use(VModal)

const app = new Vue({
    el: '#app',
});