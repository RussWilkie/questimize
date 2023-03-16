require('./bootstrap');
import Form from './Form'
import VueRouter from 'vue-router'
import routes from './routes'
import Vue from 'vue';
import Permissions from './mixins/Permissions';
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

Vue.mixin(Permissions);

window.Form = Form

window.Vue = require('vue').default;
Vue.use(VueRouter);
Vue.use(Vuetify)


Vue.component('quest-component', require('./components/Quests/QuestComponent.vue').default);
Vue.component('search-quests', require('./components/Quests/SearchQuests.vue').default);
Vue.component('add-quest', require('./components/Quests/AddQuest.vue').default);
Vue.component('quests-stats', require('./components/Quests/QuestsStats.vue').default);
Vue.component('quest', require('./components/Quests/Quest.vue').default);
Vue.component('nav-bar', require('./components/Menu/NavBar.vue').default);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router: new VueRouter(routes)
});
