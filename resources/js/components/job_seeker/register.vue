<script setup>
	import navigation from '@/layouts/navigation.vue';
	import axios from 'axios';
	import {onMounted, ref} from "vue";
	import { useRouter } from "vue-router";
	const router = useRouter();

	let firstname=ref('');
	let middlename=ref('');
	let lastname=ref('');
	let email=ref('');
	let password=ref('');
	let contact_no=ref('');
	let otp=ref('');
	let otpSent=ref(false);
	let captchaVerified=ref(false);
	let captchaResponse=ref('');

	let message=ref('');
	let fname_message=ref('');
	let lname_message=ref('');
	let contact_message=ref('');
	let email_message=ref('');
	let pass_message=ref('');

	onMounted(async () => {
		loadRecaptcha()
	})

	const loadRecaptcha = async () => {
      if (typeof grecaptcha !== 'undefined') {
        grecaptcha.render('recaptcha', {
		sitekey: '6Lcsrr4qAAAAABRyxv3qYA6U437gXKYAqB88z4K7', // Replace with your site key
          callback: onCaptchaVerified,
        });
      }else{
		captchaVerified.value = false;
	  }
    }

	const onCaptchaVerified = (response) => {
		captchaVerified.value = true;
		captchaResponse.value = response;
	}

	const SaveNewJobseeker = () => {
		const formData= new FormData()
		formData.append('firstname',firstname.value)
		formData.append('middlename',middlename.value)
		formData.append('lastname',lastname.value)
		formData.append('contact_no',contact_no.value)
		formData.append('email',email.value)
		formData.append('password',password.value)
			axios.post("/api/add_jobseeker",formData).then(function () {
				router.push('/login')
			});
	}

	const sendOTP = () => {
		const formOTP= new FormData()
		formOTP.append('email',email.value)
		if(firstname.value != '' && lastname.value != '' && contact.value != '' && email.value != '' && password.value != ''){
			axios.post(`/api/send-otp`,formOTP).then(function (response) {
				message.value = response.data.message;
				otpSent.value = true;
			}, function (error) {
				message.value = error.response.data.message;
			});
		}else{
			if(firstname.value==''){
				// document.getElementById('fname').style.backgroundColor = '#FAA0A0';
				fname_message.value = 'First Name is required!'
			}
			if(lastname.value==''){
				// document.getElementById('lname').style.backgroundColor = '#FAA0A0';
				lname_message.value = 'Last Name is required!'
			}
			if(contact.value==''){
				// document.getElementById('contact').style.backgroundColor = '#FAA0A0';
				contact_message.value = 'Contact No is required!'
			}
			if(email.value==''){
				// document.getElementById('email').style.backgroundColor = '#FAA0A0';
				email_message.value = 'Email is required!'
			}
			if(password.value==''){
				// document.getElementById('password').style.backgroundColor = '#FAA0A0';
				pass_message.value = 'Password is required!'
			}
			// const btn_save = document.getElementById("save");
			// btn_save.disabled = true;
		}
	}

	const verifyOTP = () => {
		const formOTP= new FormData()
		formOTP.append('email',email.value)
		formOTP.append('otp',otp.value)
		axios.post(`/api/verify-otp`,formOTP).then(function (response) {
			message.value = response.data.message;
			otpSent.value = true;
			SaveNewJobseeker()
		}, function (error) {
			message.value = error.response.data.message;
		}); 
	}

	const loginWithEmail = () => {
      axios .post('/login/email', {
			email: email.value,
          password: password.value,
        }).then(response => {
          // Store user data or redirect
          console.log(response.data);
        })
        .catch(error => {
          console.error(error.response.data);
        });
    }

	const resetError = (button) => {
		
		if(button==='fname'){
			// document.getElementById('fname').style.backgroundColor = '#FEFCE8';
			fname_message.value = '';
		}
		if(button==='lname'){
			// document.getElementById('lname').style.backgroundColor = '#FEFCE8';
			lname_message.value = '';
		}
		if(button==='email'){
			// document.getElementById('email').style.backgroundColor = '#FEFCE8';
			email_message.value = '';
		}
		if(button==='password'){
			// document.getElementById('password').style.backgroundColor = '#FEFCE8';
			pass_message.value = '';
		}
		if(button==='contact'){
			// document.getElementById('contact').style.backgroundColor = '#FEFCE8';
			contact_message.value = '';
		}
		// const btn_save = document.getElementById("save");
		// btn_save.disabled = false;
	}

	
	const isNumber = (evt)=> {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode == 46) {
			//Check if the text already contains the . character
			if (evt.target.value.indexOf('.') === -1) {
				return true;
			} else {
				evt.preventDefault();
			}
		} else {
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				evt.preventDefault();
		}
		return true;
    }

</script>
<template>
	<navigation>
		<div class="hero-wrap hero-wrap-2" >
		  <div class="overlay"></div>
			  <div class="container">
				  <div class="row no-gutters slider-text align-items-end justify-content-start">
					  <div class="col-md-12 text-center mb-5" >
					  <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register</span></p>
					  <h1 class="mb-3 bread">Create Jobseeker Profile</h1>
					 
				  </div>
			  </div>
		  </div>
		</div>
  
		<!-- <section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8 mb-5">
						<form action="#" class="p-5 bg-white">
							<p class="">Be found by employers. Start a MagAbroad Profile.</p>
							<hr>
							<div class="row form-group">
								<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
									<label class="font-weight-bold" for="fullname">First Name</label>
									<input type="text" id="fullname" class="form-control" placeholder="">
								</div>
								<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
									<label class="font-weight-bold" for="fullname">Last Name</label>
									<input type="text" id="fullname" class="form-control" placeholder="">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="email">Email Address</label>
									<input type="email" id="email" class="form-control" placeholder="">
								</div>
							</div>
							
							<hr>
							<div class="row">
								<div class="col-lg-12 col-md-12"><h3>Recent Experience</h3></div>
								<div class="col-lg-12 col-md-12">
									<div class="toggle-container mb-3">
										<label class="toggle-switch mb-0">
											<input type="checkbox" v-model="hasExperience" @change="toggleExperience">
											<span class="slider"></span>
										</label>
										<span class="label-text">I have experience</span>
									</div>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="jobtitle">Job Title</label>
									<input type="text" id="jobtitle" class="form-control" placeholder="">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="company">Company</label>
									<input type="text" id="company" class="form-control" placeholder="">
								</div>
							</div>

							<label class="font-weight-bold">Started</label>
							<div class="row form-group">
								<div class="col-md-4 mb-3 mb-md-0 !pr-0">
									<select class="form-control">
										<option value="">Month</option>
									</select>
								</div>
								<div class="col-md-3 mb-3 mb-md-0 !pr-0">
									<select class="form-control">
										<option value="">Year</option>
									</select>
								</div>
							</div>
							<label class="font-weight-bold">Ended</label>
							<div class="row form-group">
								<div class="col-md-4 mb-3 mb-md-0 !pr-0">
									<select class="form-control">
										<option value="">Month</option>
									</select>
								</div>
								<div class="col-md-3 mb-3 mb-md-0 !pr-0">
									<select class="form-control">
										<option value="">Year</option>
									</select>
								</div>
								<div class="col-md-3 mb-3 mb-md-0 !pr-0">
									<label class="" for="role">
									<input type="checkbox" id="role" class="">
									Still in role</label>
								</div>
							</div>
							<hr>

							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="town">Permanent Address</label>
									<input type="text" id="town" class="form-control" placeholder="">
								</div>
							</div>
							<hr>

							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="town">Preferred Job</label>
									<input type="text" id="town" class="form-control" placeholder="">
								</div>
							</div>
							<hr>
							<div class="row form-group">
								<div class="col-md-12">
									<input type="submit" value="Save and Continue" class="btn btn-primary  py-2 px-5">
								</div>
							</div>
						</form>
					</div>
	
					<div class="col-lg-4">
					<div class="p-4 mb-3 bg-white">
						<h3 class="h5 text-black mb-3">Contact Info</h3>
						<p class="mb-0 font-weight-bold">Address</p>
						<p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>
	
						<p class="mb-0 font-weight-bold">Phone</p>
						<p class="mb-4"><a href="#">+1 232 3235 324</a></p>
	
						<p class="mb-0 font-weight-bold">Email Address</p>
						<p class="mb-0"><a href="#"><span class="" data-cfemail="">[email&#160;protected]</span></a></p>
					</div>
					
					<div class="p-4 mb-3 bg-white">
						<h3 class="h5 text-black mb-3">More Info</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
						<p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
					</div>
					</div>
				</div>
			</div>
		</section> -->

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8 mb-5">
							<!-- <h4 class="mb-0">Your Employer Account</h4> -->
							<p class="">Be found by employers. Start a MagAbroad Profile.</p>
							<hr>
							<form @submit.prevent="sendOTP">
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
										<label class="font-weight-bold" for="fullname">First Name</label>
										<input type="text" id="fname" class="form-control" placeholder="" v-model="firstname" @click="resetError('fname')">
										<p v-if="fname_message" style="color: red;">{{ fname_message }}</p>
									</div>
									<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
										<label class="font-weight-bold" for="fullname">Middle Name</label>
										<input type="text" id="" class="form-control" placeholder="" v-model="middlename">
									</div>
									<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
										<label class="font-weight-bold" for="fullname">Last Name</label>
										<input type="text" id="lname" class="form-control" placeholder="" v-model="lastname" @click="resetError('lname')">
										<p v-if="lname_message" style="color: red;">{{ lname_message }}</p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="phone">Phone Number</label>
										<input type="text" id="contact" class="form-control" placeholder="" v-model="contact_no" @keypress="isNumber($event)" @click="resetError('contact')">
										<p v-if="contact_message" style="color: red;">{{ contact_message }}</p>

									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="email">Email Address</label>
										<input type="email" id="email" class="form-control" placeholder="" v-model="email" @click="resetError('email')">
										<p v-if="email_message" style="color: red;">{{ email_message }}</p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="email">Password</label>
										<input type="password" id="password" class="form-control" placeholder="" v-model="password" @click="resetError('password')">
										<p v-if="pass_message" style="color: red;">{{ pass_message }}</p>

									</div>
								</div>
								<div class="row form-group">
									<div id="recaptcha" class="col-lg-12 g-recaptcha" :data-sitekey="siteKey"></div>
								</div>
								
								<div class="row form-group" v-if="otpSent != true">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary mr-2 w-44" :disabled = "captchaVerified == false">Send OTP</button>
									</div>
								</div>
							</form>
							<p v-if="message">{{ message }}</p>
							<div>
								<form @submit.prevent="verifyOTP" v-if="otpSent">
									<div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<input type="text" v-model="otp" class="form-control" placeholder="Enter OTP" required />
										</div>
									</div>
								<div class="row form-group">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary mr-2 w-44">Create Account</button>
										<button type="button" @click="sendOTP()" id="save" class="btn btn-primary mr-2 w-44">Resend OTP</button>
									</div>
								</div>
								</form>
							</div>
							<hr>
					</div>
	
					<div class="col-lg-4">
					<div class="p-4 mb-3 bg-white">
						<h3 class="h5 text-black mb-3">Contact Info</h3>
						<p class="mb-0 font-weight-bold">Address</p>
						<p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>
	
						<p class="mb-0 font-weight-bold">Phone</p>
						<p class="mb-4"><a href="#">+1 232 3235 324</a></p>
	
						<p class="mb-0 font-weight-bold">Email Address</p>
						<p class="mb-0"><a href="#"><span class="" data-cfemail="">[email&#160;protected]</span></a></p>
					</div>
					
					<div class="p-4 mb-3 bg-white">
						<h3 class="h5 text-black mb-3">More Info</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
						<p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
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