/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Form from './Form'
import VueRouter from 'vue-router'
import routes from './routes'
import Vue from 'vue';
import Permissions from './mixins/Permissions';
Vue.mixin(Permissions);

window.Form = Form

window.Vue = require('vue').default;
Vue.use(VueRouter);

// const routes = [
//     { path: '/register', component: require('./components/Auth/Registration.vue') },
//     { path: '/login', component: require('./components/Auth/Login.vue'), name: 'Login' },
//     {
//         path: '/dashboard', component: require('./components/Dashboard.vue'), name: 'Dashboard',
//         beforeEnter: (to, form, next) => {
//             axios.get('/api/athenticated').then(() => {
//                 next()
//             }).catch(() => {
//                 return next({ name: 'Login' })
//             })
//         }
//     },
// ]

// const router = new Vue({
//     routes
// })
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('quest-component', require('./components/QuestComponent.vue').default);
Vue.component('search-quests', require('./components/SearchQuests.vue').default);
Vue.component('add-quest', require('./components/AddQuest.vue').default);
Vue.component('quests-stats', require('./components/QuestsStats.vue').default);
Vue.component('quest', require('./components/Quest.vue').default);
Vue.component('nav-bar', require('./components/Menu/NavBar.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
