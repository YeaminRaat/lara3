require('./bootstrap');

window.Vue = require('vue');			//import vue same as(import Vue from 'vue')

import VueRouter from 'vue-router';		//import vue router
Vue.use(VueRouter);

import Vuex from 'vuex'					//import vuex
Vue.use(Vuex)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  color: '#007bff',
  failedColor: 'red',
  thickness: '7px',
  transition: {
    speed: '0.2s',
    opacity: '0.6s',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
})

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
    mode:'hash',
    scrollBehavior (to, from, savedPosition) {
      if (savedPosition) {
        return savedPosition
      } else {
        return { x: 0, y: 0 }
      }
    }
})

//vue instance
const app = new Vue({
    el: '#app',
    router,
    store
});
