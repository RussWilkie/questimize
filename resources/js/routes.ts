import Register from './components/Auth/Registration.vue';
import Login from './components/Auth/Login.vue';
import Dashboard from './components/Dashboard.vue';
import axios from 'axios';
import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter{
    routes: [
        {
            path: '/register',
            component: Register
        },
        {
            path: '/login',
            component: Login,
            name: 'Login'
        },
        {
            path: "/dashboard",
            name: "Dashboard",
            component: Dashboard,
           beforeEnter: (to, form, next) =>{
               axios.get('/api/athenticated').then(()=>{
                   next()
               }).catch(()=>{
                   return next({ name: 'Login'})
               })
           }
       
          }         
    ]
}
