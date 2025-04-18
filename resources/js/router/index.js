import { createRouter, createWebHistory } from "vue-router";


import notFound from '../components/notFound.vue'
import loginForm from  '../components/login.vue'
import home from '../components/home.vue'
import event_list from '../components/event_list.vue'
import event_view from '../components/event_view.vue'

import jobseeker_register from  '../components/job_seeker/register.vue'
import jobseeker_dash from  '../components/job_seeker/dashboard.vue'
import search_job from  '../components/job_seeker/search_job.vue'
import view_job from  '../components/job_seeker/view_job.vue'
import apply_job from  '../components/job_seeker/apply_job.vue'
import jobseeker_profile from  '../components/job_seeker/profile.vue'
import notif_jobseeker from  '../components/job_seeker/notifications.vue'

import employer_register from  '../components/employer/register.vue'
import employer_dash from  '../components/employer/dashboard.vue'
import employer_profile from  '../components/employer/profile.vue'
import post_job from  '../components/employer/postjob.vue'
import update_job from  '../components/employer/update_job.vue'
import post_job_qa from  '../components/employer/postjob_qa.vue'
import job_list from  '../components/employer/job_list.vue'
import job_view from  '../components/employer/job_view.vue'
import search_candidate from  '../components/employer/search_candidate.vue'
import view_candidate from  '../components/employer/view_candidate.vue'
import notif_employer from  '../components/employer/notifications.vue'
import employer_settings from  '../components/employer/settings.vue'
import quest_create from  '../components/employer/quest_create.vue'
import quest_list from  '../components/employer/quest_list.vue'

import admin_login from '../components/admin/login.vue'
import admin_dash from '../components/admin/dashboard.vue'
import emp_cat_index from '../components/admin/masterfile/emp_cat/index.vue'
import countries_index from '../components/admin/masterfile/countries/index.vue'
import skills_index from '../components/admin/masterfile/skills/index.vue'
import industry_index from '../components/admin/masterfile/industry/index.vue'
import jobclass_index from '../components/admin/masterfile/job_class/index.vue'
import appstatus_index from '../components/admin/masterfile/app_status/index.vue'
import employer_adm_index from '../components/admin/employer/index.vue'
import employer_adm_view from '../components/admin/employer/view.vue'

const routes = [
    {
        path:'/',
        component: home,
    },
    {
        path:'/events',
        component: event_list,
    },
    {
        path:'/event_view',
        component: event_view,
    },
    {
        path:'/login',
        name:'login',
        component: loginForm,
        meta:{
            requiresAuth:false
        }
    },
    // ----------------------------------------------------------------------------Job Seeker
    {
        path:'/job_seeker/register',
        name:'jobseeker_register',
        component: jobseeker_register,
    },
    {
        path:'/job_seeker/profile',
        name:'jobseeker_profile',
        component: jobseeker_profile,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/job_seeker/dashboard',
        name:'jobseeker_dash',
        component: jobseeker_dash,
        // meta:{
        //     requiresAuth:true
        // }
    },
    {
        path:'/job_seeker/search_job',
        name:'search_job',
        component: search_job,
    },
    {
        path:'/job_seeker/view_job',
        name:'view_job',
        component: view_job,
    },
    {
        path:'/job_seeker/apply_job',
        name:'apply_job',
        component: apply_job,
    },
    {
        path:'/job_seeker/notifications',
        name:'notif_jobseeker',
        component: notif_jobseeker,
    },

    // ----------------------------------------------------------------------------Employer
    {
        path:'/employer/register',
        name:'employer_register',
        component: employer_register,
    },
    {
        path:'/employer/dashboard',
        name:'employer_dash',
        component: employer_dash,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/profile',
        name:'employer_profile',
        component: employer_profile,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/postjob/:id',
        props:true,
        name:'post_job',
        component: post_job,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/update_job/:id',
        props:true,
        name:'update_job',
        component: update_job,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/postjob_qa/:id',
        props:true,
        name:'post_job_qa',
        component: post_job_qa,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/job_list',
        name:'job_list',
        component: job_list,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/job_view/:id',
        props:true,
        component: job_view,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/search_candidate',
        name:'search_candidate',
        component: search_candidate,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/view_candidate',
        name:'view_candidate',
        component: view_candidate,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/notifications',
        name:'notif_employer',
        component: notif_employer,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/settings',
        name:'employer_settings',
        component: employer_settings,
        meta:{
            requiresAuth:true
        }
    },

    {
        path:'/employer/create_questions',
        name:'quest_create',
        component: quest_create,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/employer/question_list',
        name:'quest_list',
        component: quest_list,
        meta:{
            requiresAuth:true
        }
    },

    // ----------------------------------------------------------------------------Admin


    {
        path:'/admin/',
        name:'admin_login',
        component: admin_login,
        meta:{
            requiresAuth:false
        }

    },
    {
        path:'/admin/dashboard',
        name:'admin_dash',
        component: admin_dash,
        meta:{
            requiresAuth:true
        }
    },
    {
        path:'/admin/employment_category',
        name:'emp_cat_index',
        component: emp_cat_index,
    },
    {
        path:'/admin/countries',
        name:'countries_index',
        component: countries_index,
    },
    {
        path:'/admin/skills',
        name:'skills_index',
        component: skills_index,
    },

    {
        path:'/admin/industry',
        name:'industry_index',
        component: industry_index,
    },
    {
        path:'/admin/job_classification',
        name:'jobclass_index',
        component: jobclass_index,
    },
    {
        path:'/admin/applicant_status',
        name:'appstatus_index',
        component: appstatus_index,
    },

    
    {
        path:'/admin/employer_list',
        name:'employer_adm_index',
        component: employer_adm_index,
    },
    {
        path:'/admin/employer_view',
        name:'employer_adm_view',
        component: employer_adm_view,
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
