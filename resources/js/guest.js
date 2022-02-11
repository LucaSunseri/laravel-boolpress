window.Vue = require('vue');
window.axios = require('axios');

import App from './App.vue';
import router from './router';

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
