require('./bootstrap');

window.Vue = require('vue');			//import vue same as(import Vue from 'vue')

import VueRouter from 'vue-router';		//import vue router
Vue.use(VueRouter);

import Vuex from 'vuex'					//import vuex
Vue.use(Vuex)

import storeData from './store/store.js'
const store = new Vuex.Store(
  storeData
)

Vue.component('header-section', require('./components/public/inc/header.vue').default);
Vue.component('footer-section', require('./components/public/inc/footer.vue').default);
Vue.component('content-section', require('./components/public/master.vue').default);

//all vue routes from routes.js file
import {routes} from './routes.js';

//router instance and pass the `routes` option
const router = new VueRouter({
    routes,
    mode:'history'
})

//vue instance
const app = new Vue({
    el: '#app',
    router,
    store
});
