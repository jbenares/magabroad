<script setup>
	import navigation from '@/layouts/navigation.vue';
	import	{ExclamationCircleIcon} from '@heroicons/vue/24/solid'
	import {reactive, ref} from "vue";
	import { useRouter } from "vue-router";
	import axios from 'axios';
	const router = useRouter();

	let role = ref('Jobseeker');
	let form = reactive({
        email:'',
        password:'',
    })
    let error = ref('')
    const login = async () =>{
		if(role.value == 'Jobseeker'){
			await axios.post('/api/jobseeker_login_process', form).then(response =>{
				if(response.data.success){
					localStorage.setItem('token', response.data.data.token)
						router.push('/job_seeker/dashboard')
				} else {
					error.value = response.data.message;
				}
			})
		}else{
			await axios.post('/api/employeer_login_process', form).then(response =>{
				if(response.data.success){
					localStorage.setItem('token', response.data.data.token)
						router.push('/employer/dashboard')
				} else {
					error.value = response.data.message;
				}
			})
		}
    }

</script>

<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
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

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-6 mb-5">
						<!-- <form action="#" class="p-5 bg-white"> -->
							<h2 class="text-center mb-4">Login</h2>
							<hr>

							<div class="btn-group d-flex mb-4" role="group" aria-label="Role Selection">
								<button type="button" class="btn btn-secondary w-50" :class="{ active: role === 'Jobseeker' }"  v-on:click="role = 'Jobseeker'">Jobseeker</button>
								<button type="button" class="btn !bg-gray-100 w-50" :class="{ active: role === 'Employer' }" v-on:click="role = 'Employer'">Employer</button>
							</div>
								<div class="alert alert-danger" v-if="error">
									<div class="flex justify-start space-x-2">
										<div>
											<ExclamationCircleIcon fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"></ExclamationCircleIcon>
										</div> 
										<div> {{ error }} </div>
									</div>
								</div>
								<form class="pt-3" @submit.prevent="login()">
									<div class="form-group">
									<label for="email" class="font-weight-bold">Email Address</label>
									<input type="email" id="email" class="form-control" placeholder="Enter your email" v-model="form.email">
									</div>

									<div class="form-group">
										<label for="password" class="font-weight-bold">Password</label>
										<input type="password" id="password" class="form-control" placeholder="Enter your password" v-model="form.password">
									</div>

									<div class="form-group">
										<button type="button" class="btn btn-primary btn-block py-2" @click="login">Login</button>
									</div>
									<template v-if="(role =='Jobseeker')">
										<hr>
										<span>Or</span>
											<!-- <a :href="'/google-auth/'" class="btn btn-primary mr-2 w-44">Login with GMAIL</a> -->
											<div class="form-group">
												<!-- <button type="button" class="btn btn-primary btn-block py-2" @click="googleLogin">Login with GMAIL</button> -->
												<!-- <a href="/auth/google" class="btn btn-primary mr-2 w-44">Login with Gmail</a> -->
												<a :href="'/auth/facebook/'" class="btn btn-primary mr-2 w-44">Login with Facebook</a>
												<a  :href="'/auth/google/'" class="btn btn-primary mr-2 w-44">Login with Gmail</a>
											</div>
									</template>
									

									<div class="text-center" v-if="(role =='Jobseeker')">
										<p class="mb-0">Don't have an account? <a href="/job_seeker/register">Register here</a></p>
									</div>
									<div class="text-center" v-if="(role =='Employer')">
										<p class="mb-0">Don't have an account? <a href="/employer/register">Register here</a></p>
									</div>
									
								</form>
						<!-- </form> -->
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