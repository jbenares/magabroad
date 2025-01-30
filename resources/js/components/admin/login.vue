<script setup>
	import navigation from '@/layouts/navigation.vue';
	import	{ExclamationCircleIcon} from '@heroicons/vue/24/solid'
	import {reactive, ref} from "vue";
	import { useRouter } from "vue-router";
	import axios from 'axios';
	const router = useRouter();

	let form = reactive({
        email:'',
        password:'',
    })

    let error = ref('')
    const login = async () =>{
        await axios.post('/api/admin_login_process', form).then(response =>{
            if(response.data.success){
                localStorage.setItem('token', response.data.data.token)
				router.push('/admin/dashboard')
            } else {
                error.value = response.data.message;
            }
        })
    }

</script>

<template>
	<div class="bg-blue-600 fixed w-full h-[50%] top-0"></div>
    <div class="flex items-center justify-center min-h-screen relative">
		<div class="container"> 
			<div class="flex justify-center space-x-2 mb-4">
				<span class="shadow rounded-[100%]  border-2 border-white"><img src="../../../images/magabroad_logo.png" alt="" class="size-14 "></span>
				<h2 class="pt-1 font-bold text-white mb-0">MagAbroad</h2>
			</div>
			<div class="flex justify-center">
				<div class="w-full max-w-md p-6 px-8 pb-8 bg-white rounded-lg shadow">
					<h2 class="mb-0 text-2xl font-bold text-center text-gray-800 leading-tight">Admin Login</h2>
					<p class="mb-6 text-center leading-tight">Welcome back Admin!</p>
					<div class="alert alert-danger" v-if="error">
						<div class="flex justify-start space-x-2">
							<div>
								<ExclamationCircleIcon fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"></ExclamationCircleIcon>
							</div> 
							<div> {{ error }} </div>
						</div>
					</div>
					<form class="pt-3" @submit.prevent="login()">
						<div class="mb-4">
							<label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
							<input  type="email" id="email" class="w-full px-4 py-2 text-base text-gray-600 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email" v-model="form.email" required />
						</div>
						<div class="mb-6">
							<label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
							<input type="password" id="password" class="w-full px-4 py-2 text-base text-gray-600 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password" v-model="form.password" required />
						</div>
						<div class="flex items-center justify-between mb-4">
							<div class="flex items-center">
								<input id="remember" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
								<label for="remember" class="ml-2 text-sm text-gray-600 pt-2">Remember me</label>
							</div>
							<a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
						</div>
						<button type="button" @click="login" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1" >
							Login
						</button>
					</form>
				</div>
			</div>
		</div>
    </div>
</template>