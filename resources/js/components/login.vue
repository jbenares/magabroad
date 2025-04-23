<script setup>
	import navigation from '@/layouts/navigation.vue';
	import	{ExclamationCircleIcon} from '@heroicons/vue/24/solid'
	import {reactive, ref} from "vue";
	import { useRouter } from "vue-router";
	import axios from 'axios';
	import { nextTick } from 'vue';

	const router = useRouter();

	let role = ref('Jobseeker');
	let form = reactive({
		employer_email:'',
        employer_password:'',
        jobseeker_email:'',
        jobseeker_password:'',
    })
    let error = ref('')

	const showEmployerPassword = ref(false);
	const showJobseekerPassword = ref(false);
	const isLoading = ref(false);

	const toggleEmployerPassword = () => {
		showEmployerPassword.value = !showEmployerPassword.value
	}
	const toggleJobseekerPassword = () => {
		showJobseekerPassword.value = !showJobseekerPassword.value
	}	
    // const login = async () =>{
	// 	if(role.value == 'Jobseeker'){
	// 		await axios.post('/api/jobseeker_login_process', form).then(response =>{
	// 			if(response.data.success){
	// 				localStorage.setItem('token', response.data.data.token)
	// 					router.push('/job_seeker/dashboard')
	// 			} else {
	// 				error.value = response.data.message;
	// 				setTimeout(function() {
	// 					error.value = '';
	// 				}, 3000);
	// 			}
	// 		})
	// 	}else{
	// 		await axios.post('/api/emp_login_process', form).then(response =>{
	// 			if(response.data.success){
	// 				localStorage.setItem('token', response.data.data.token)
	// 					router.push('/employer/dashboard')
	// 			} else {
	// 				error.value = response.data.message;
	// 				setTimeout(function() {
	// 					error.value = ''; 
	// 				}, 3000);
	// 			}
	// 		})
	// 	}
    // }
	const login = async () => {
    isLoading.value = true; // Start loading

    try {
        if (role.value === 'Jobseeker') {
            const response = await axios.post('/api/jobseeker_login_process', form);
            if (response.data.success) {
                localStorage.setItem('token', response.data.data.token);
                router.push('/job_seeker/dashboard');
            } else {
                error.value = response.data.message;
                setTimeout(() => {
                    error.value = ''; // Clear the message
                }, 3000);
            }
        } else {
            const response = await axios.post('/api/emp_login_process', form);
            if (response.data.success) {
                localStorage.setItem('token', response.data.data.token);
                router.push('/employer/dashboard');
            } else {
                error.value = response.data.message;
                setTimeout(() => {
                    error.value = ''; // Clear the message
                }, 3000);
            }
        }
    } catch (err) {
        console.error('Login failed:', err);
        error.value = "An error occurred during login.";
        setTimeout(() => {
            error.value = ''; // Clear the message
        }, 3000);
    } finally {
        isLoading.value = false; // Stop loading
    }
};
</script>
<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3" id="_page">
			<div class="overlay"></div>
			<div class="container">
				<!-- <div class="row no-gutters slider-text align-items-end justify-content-start">
					<div class="col-md-12 text-center mb-5">
						<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login</span></p>
						<h1 class="mb-3 bread">Login</h1>
					</div>
				</div> -->
			</div>
		</div>

		<section class="ftco-section bg-light" id="login">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-6 mb-5">
						<div action="#" class="p-5 bg-white">
							<h2 class="text-center mb-2">Login</h2>
							<!-- <hr> -->
							<div class="btn-group d-flex mb-2 border-b" role="group" aria-label="Role Selection">
								<button 
									type="button" 
									class="w-full text-right px-4" 
									:class="{ 
										'!text-orange-500 !font-bold !border-b-2 !border-orange-400': role === 'Jobseeker', 
										'': role !== 'Jobseeker',
										'active': role === 'Jobseeker'
									}"
									v-on:click="role = 'Jobseeker'"
								>
									Jobseeker
								</button>
								<button 
									type="button" 
									class="w-full text-left px-4" 
									:class="{ 
										'!text-orange-500 !font-bold !border-b-2 !border-orange-400': role === 'Employer', 
										'': role !== 'Employer',
										'active': role === 'Employer'
									}"
									v-on:click="role = 'Employer'"
								>
									Employer
								</button>
							</div>
							<div class="alert alert-danger !border !border-red-500 !text-red-600 mb-0" v-if="error">
								<div class="flex justify-start space-x-2">
									<div>
										<ExclamationCircleIcon fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"></ExclamationCircleIcon>
									</div> 
									<p class="mb-0 leading-tight"> {{ error }}</p>
								</div>
							</div>
							<form class="pt-3" @submit.prevent="login()">
								<template v-if="(role =='Jobseeker')">
									<div class="form-group">
									<label for="email" class="font-weight-bold mb-0">Email Address</label>
									<input type="email" id="email" class="form-control" placeholder="Enter your email" v-model="form.jobseeker_email">
									</div>

									<div class="form-group">
										<label for="password" class="font-weight-bold mb-0">Password</label>
										<div class="relative">
											<input
											:type="showJobseekerPassword ? 'text' : 'password'"  
											class="form-control" 
											placeholder="Enter your password" 
											v-model="form.jobseeker_password">
											<span class="toggle-password" @click="toggleJobseekerPassword">
												<i :class="showJobseekerPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
											</span>
										</div>
									</div>

									<div class="form-group">
										<!-- <button type="button" class="btn btn-primary btn-block py-2" @click="login">Login</button> -->
										<button type="button" class="btn btn-primary btn-block py-2" @click="login" :disabled="isLoading">
											<span v-if="isLoading">
												<i class="fa fa-spinner fa-spin"></i> Logging in...
											</span>
											<span v-else>Login</span>
										</button>
									</div>
										<div class="flex justify-between space-x-2">
											<span class="w-full"><hr></span>
											<span>Or</span>
											<span class="w-full"><hr></span>
										</div>
											<!-- <a :href="'/google-auth/'" class="btn btn-primary mr-2 w-44">Login with GMAIL</a> -->
											<div class="form-group">
												<!-- <button type="button" class="btn btn-primary btn-block py-2" @click="googleLogin">Login with GMAIL</button> -->
												<!-- <a href="/auth/google" class="btn btn-primary mr-2 w-44">Login with Gmail</a> -->
												<a :href="'/auth/facebook/'" class="btn text-white !bg-blue-600 mr-2 btn-block ">
													<div class="flex justify-center space-x-2">
														<span>
															<svg class="w-6 h-6 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.7 226.4 209.3 245V327.7h-63V256h63v-54.6c0-62.2 37-96.5 93.7-96.5 27.1 0 55.5 4.8 55.5 4.8v61h-31.3c-30.8 0-40.4 19.1-40.4 38.7V256h68.8l-11 71.7h-57.8V501C413.3 482.4 504 379.8 504 256z"/></svg>
														</span>
														<span class="">Login with Facebook</span>
													</div>
												</a>
												<a  :href="'/auth/google/'" class="btn text-white !bg-red-500 mr-2 btn-block">
													<div class="flex justify-center space-x-2">
														<span>
															<svg class="w-6 h-6 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
														</span>
														<span class="">Login with Gmail</span>
													</div>
												</a>
											</div>
									<hr>
									<div class="text-center">
										<p class="mb-0">Don't have an account? <a href="/job_seeker/register">Register here</a></p>
									</div>
								</template>

								<template v-if="(role =='Employer')">
									<div class="form-group">
									<label for="email" class="font-weight-bold mb-0">Email Address</label>
									<input type="email" id="email" class="form-control" placeholder="Enter your email" v-model="form.employer_email">
									</div>

									<div class="form-group">
										<label for="password" class="font-weight-bold mb-0">Password</label>
										<div class="relative">
											<input
											:type="showEmployerPassword ? 'text' : 'password'"  
											class="form-control" 
											placeholder="Enter your password" 
											v-model="form.employer_password">
											<span class="toggle-password" @click="toggleEmployerPassword">
												<i :class="showEmployerPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
											</span>
										</div>
									</div>
									<div class="form-group">
										<!-- <button type="button" class="btn btn-primary btn-block py-2" @click="login">Login</button> -->
										<button type="button" class="btn btn-primary btn-block py-2" @click="login" :disabled="isLoading">
											<span v-if="isLoading">
												<i class="fa fa-spinner fa-spin"></i> Logging in...
											</span>
											<span v-else>Login</span>
										</button>
									</div>
									<div class="text-center">
										<p class="mb-0">Don't have an account? <a href="/employer/register">Register here</a></p>
									</div>
								</template>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section-parallax">
		  <div class="parallax-img d-flex align-items-center">
				<div class="container">
				  <div class="row d-flex justify-content-center">
					  <div class="col-md-7 text-center heading-section heading-section-white">
						  <h2>Subcribe to our Newsletter</h2>
						  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
						  <div class="row d-flex justify-content-center mt-4 mb-4">
							  <div class="col-md-12">
								  <form action="#" class="subscribe-form">
									  <div class="form-group d-flex">
										  <input type="text" class="form-control" placeholder="Enter email address">
										  <input type="submit" value="Subscribe" class="submit px-3">
									  </div>
								  </form>
							  </div>
						  </div>
					  </div>
				  </div>
				</div>
		  </div>
		</section>
  
		<footer class="ftco-footer ftco-bg-dark ftco-section">
		  <div class="container">
			  <div class="row mb-5">
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4">
						  <h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
						  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
							  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						  </ul>
					  </div>
				  </div>
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4">
						  <h2 class="ftco-heading-2">Employers</h2>
						  <ul class="list-unstyled">
							  <li><a href="#" class="pb-1 d-block">Browse Candidates</a></li>
							  <li><a href="#" class="pb-1 d-block">Post a Job</a></li>
							  <li><a href="#" class="pb-1 d-block">Employer Listing</a></li>
							  <li><a href="#" class="pb-1 d-block">Resume Page</a></li>
							  <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
							  <li><a href="#" class="pb-1 d-block">Job Packages</a></li>
						  </ul>
					  </div>
				  </div>
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4 ml-md-4">
						  <h2 class="ftco-heading-2">Candidate</h2>
						  <ul class="list-unstyled">
							  <li><a href="#" class="pb-1 d-block">Browse Jobs</a></li>
							  <li><a href="#" class="pb-1 d-block">Submit Resume</a></li>
							  <li><a href="#" class="pb-1 d-block">Dashboard</a></li>
							  <li><a href="#" class="pb-1 d-block">Browse Categories</a></li>
							  <li><a href="#" class="pb-1 d-block">My Bookmarks</a></li>
							  <li><a href="#" class="pb-1 d-block">Candidate Listing</a></li>
						  </ul>
					  </div>
				  </div>
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4 ml-md-4">
						  <h2 class="ftco-heading-2">Account</h2>
						  <ul class="list-unstyled">
							  <li><a href="#" class="pb-1 d-block">My Account</a></li>
							  <li><a href="#" class="pb-1 d-block">Sign In</a></li>
							  <li><a href="#" class="pb-1 d-block">Create Account</a></li>
							  <li><a href="#" class="pb-1 d-block">Checkout</a></li>
						  </ul>
					  </div>
				  </div>
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4">
						  <h2 class="ftco-heading-2">Have a Questions?</h2>
						  <div class="block-23 mb-3">
							  <ul>
								  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
							  </ul>
						  </div>
					  </div>
				  </div>
			  </div>
			  <div class="row">
				  <div class="col-md-12 text-center">
				  </div>
			  </div>
		  </div>
		</footer>
	</navigation>
</template>