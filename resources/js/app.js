require('./bootstrap');

import Vue    from 'vue';

import http   from './http/http'
import store  from './store/store'
import router from './router/router'
import config from './config/config'

import App from './views/App';


new Vue({
    el: '#app',
    http: http,
    store: store,
    router: router,
    config: config,
    render: h => h(App)
});
