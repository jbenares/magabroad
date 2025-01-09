import { createRouter, createWebHistory } from "vue-router";


import notFound from '../components/notFound.vue'
import loginForm from  '../components/login.vue'
import registerForm from  '../components/register.vue'
import jobseeker_dash from  '../components/job_seeker/dashboard.vue'
import employer_dash from  '../components/employer/dashboard.vue'
import dashboard from '../components/dashboard.vue'


const routes = [
    {
        path:'/',
        component: dashboard,
    },
    {
        path:'/login',
        name:'login',
        component: loginForm,
    },
    {
        path:'/register',
        name:'register',
        component: registerForm,
    },
    {
        path:'/job_seeker/dashboard',
        name:'jobseeker_dash',
        component: jobseeker_dash,
    },

    {
        path:'/employer/dashboard',
        name:'employer_dash',
        component: employer_dash,
    },
    {
        path:'/:pathMatch(.*)*',
        name:'notFound',
        component: notFound,
        meta:{
            requiresAuth:false
        }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to,from) => {
    if(to.meta.requiresAuth && !localStorage.getItem('token') ){
        return { name: 'login'}
    } 
})

export default router
