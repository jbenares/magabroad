import { createRouter, createWebHistory } from "vue-router";


import notFound from '../components/notFound.vue'
import loginForm from  '../components/login.vue'
import home from '../components/home.vue'

import jobseeker_register from  '../components/job_seeker/register.vue'
import jobseeker_dash from  '../components/job_seeker/dashboard.vue'
import find_job from  '../components/job_seeker/findjob.vue'

import employer_register from  '../components/employer/register.vue'
import employer_dash from  '../components/employer/dashboard.vue'
import employer_profile from  '../components/employer/profile.vue'
import post_job from  '../components/employer/postjob.vue'
import job_list from  '../components/employer/job_list.vue'
import job_view from  '../components/employer/job_view.vue'
import search_candidate from  '../components/employer/search_candidate.vue'
import view_candidate from  '../components/employer/view_candidate.vue'


const routes = [
    {
        path:'/',
        component: home,
    },
    {
        path:'/login',
        name:'login',
        component: loginForm,
    },
    {
        path:'/job_seeker/register',
        name:'jobseeker_register',
        component: jobseeker_register,
    },
    {
        path:'/job_seeker/dashboard',
        name:'jobseeker_dash',
        component: jobseeker_dash,
    },
    {
        path:'/job_seeker/findjob',
        name:'find_job',
        component: find_job,
    },
    {
        path:'/employer/register',
        name:'employer_register',
        component: employer_register,
    },
    {
        path:'/employer/dashboard',
        name:'employer_dash',
        component: employer_dash,
    },
    {
        path:'/employer/profile',
        name:'employer_profile',
        component: employer_profile,
    },
    {
        path:'/employer/postjob',
        name:'post_job',
        component: post_job,
    },
    {
        path:'/employer/job_list',
        name:'job_list',
        component: job_list,
    },
    {
        path:'/employer/job_view',
        name:'job_view',
        component: job_view,
    },
    {
        path:'/employer/search_candidate',
        name:'search_candidate',
        component: search_candidate,
    },
    {
        path:'/employer/view_candidate',
        name:'view_candidate',
        component: view_candidate,
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
