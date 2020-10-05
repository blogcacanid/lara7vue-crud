/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App.vue';
import VueSweetalert2 from 'vue-sweetalert2'; 
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
 
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination')); 

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

import Home from './components/Home.vue';
import PegawaiList from './components/PegawaiList.vue';
import PegawaiAdd from './components/PegawaiAdd.vue';
import PegawaiView from './components/PegawaiView.vue';
import PegawaiEdit from './components/PegawaiEdit.vue';

const routes = [
  {
      name: 'home',
      path: '/',
      component: Home
  },
  {
      name: 'pegawai-list',
      path: '/pegawai-list',
      component: PegawaiList
  },
  {
      name: 'pegawai-add',
      path: '/pegawai-add',
      component: PegawaiAdd
  },
  {
      name: 'pegawai-edit',
      path: '/pegawai-edit/:id',
      component: PegawaiEdit
  },
  {
    name: 'pegawai-view',
    path: '/pegawai-view/:id',
    component: PegawaiView
  }
];
 
const router = new VueRouter({ 
    mode: 'history', 
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
