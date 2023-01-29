import Register from './components/Auth/Registration';
import Login from './components/Auth/Login';
import Dashboard from './components/Dashboard';
import QuestComponent from './components/Quests/QuestComponent';
import ObjectiveComponent from './components/Objectives/ObjectiveComponent';

export default{
    mode: 'history',
    linkActiveClass: 'font-semibold',
    routes: [
        {
            path: '/',
            component: QuestComponent
        },
        {
            path: '/objectives',
            component: ObjectiveComponent
        },
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