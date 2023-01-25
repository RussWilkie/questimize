/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import  Form  from './Form.js'
import VueRouter from 'vue-router'
import  routes  from './routes.js'
import Vue from 'vue';
import Permissions from './mixins/Permissions.vue';
Vue.mixin(Permissions);


declare global {
    interface Window { 
        Form: any; }
}

window.Form = Form

window.Vue = require('vue').default;
Vue.use(VueRouter);

Vue.component('quest-component', require('./components/QuestComponent.vue').default);
Vue.component('search-quests', require('./components/SearchQuests.vue').default);
Vue.component('add-quest', require('./components/AddQuest.vue').default);
Vue.component('quests-stats', require('./components/QuestsStats.vue').default);
Vue.component('quest', require('./components/Quest.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
