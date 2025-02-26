<script setup>
	import navigation from '@/layouts/navigation.vue';
	import{CheckIcon} from '@heroicons/vue/24/solid'
	import axios from 'axios';
	import {onBeforeUnmount,onMounted, ref, computed} from "vue";
	import { useRouter } from "vue-router";
	const router = useRouter();

	let countrycodelist=ref([]);

	let firstname=ref('');
	let middlename=ref('');
	let lastname=ref('');
	let email=ref('');
	let password=ref('');
	let re_password=ref('');
	let contact_no=ref('');
	let country_code=ref(1);
	let otp=ref('');
	let captchaResponse=ref('');

	let message=ref('');
	let fname_message=ref('');
	let lname_message=ref('');
	let contact_message=ref('');
	let email_message=ref('');
	let pass_message=ref('');
	let repass_message=ref('');
	let otp_success_message=ref('');
	let otp_error_message=ref('');

	let timer=ref(null);
	let timeLeft=ref(0);
	const isResendDisabled = ref(false)
	const loading = ref(false);

	let repass_color = ref("text-red-500");

	const success =  ref('');
	const otpSent=ref(false);
	const captchaVerified=ref(false);
	const successAlert = ref(true)
	const showPassword = ref(false)
	const showConfirmPassword = ref(false);
	const closeAlert = () => {
		successAlert.value = !hideAlert.value
	}
	const passwordsMatch = computed(() => {
		return password.value && re_password.value && password.value === re_password.value;
	});
	const rejectModal = ref(false);

	onMounted(async () => {
		loadRecaptcha()
		loadRecaptchaScript()
		getcountrycode()
	})

	const togglePassword = () => {
		showPassword.value = !showPassword.value
	}

	const toggleConfirmPassword = () => {
		showConfirmPassword.value = !showConfirmPassword.value;
	};

	const getcountrycode = async () => {
		let response = await axios.get("/api/country_code_list");
		countrycodelist.value=response.data
	}

	// const EmailChecker = async () => {
	// 	let response = await axios.get('/api/check_jobseeker_email/'+email.value)
	// 	if (response.data.exists) {
	// 		email_message.value = 'This email is already exisiting!'
	// 		document.getElementById("password").readOnly = true;
	// 		document.getElementById("re_password").readOnly = true;
	// 		grecaptcha.reset();
	// 		document.getElementById('recaptcha').style.display = 'none';
	// 		document.getElementById("otpbtn").disabled = true;
	// 	} else {
	// 		email_message.value = ''
	// 		document.getElementById("password").readOnly = false;
	// 		document.getElementById("re_password").readOnly = false;
	// 		VerifyConfirmPasword()
	// 	}
	// }

	const email_exists = ref(false); // Tracks if the email exists
	const email_accepted = ref(false); // Tracks if the email is valid and available

	const EmailChecker = async () => {
		if (!email.value) {
			email_message.value = "";
			email_exists.value = false;
			email_accepted.value = false;
			return;
		}

		// try {
			let response = await axios.get('/api/check_jobseeker_email/' + email.value);
			if (response.data.exists) {
				email_message.value = '❌ This email is already existing!';
				email_exists.value = true;
				email_accepted.value = false;

				// Disable password fields
				document.getElementById("password").readOnly = true;
				document.getElementById("re_password").readOnly = true;
				grecaptcha.reset();
				document.getElementById('recaptcha').style.display = 'none';
				document.getElementById("otpbtn").disabled = true;
			} else {
				email_message.value = '✅ Email is available!';
				email_exists.value = false;
				email_accepted.value = true;

				// Enable password fields
				document.getElementById("password").readOnly = false;
				document.getElementById("re_password").readOnly = false;
				VerifyConfirmPasword();
			}
		// } catch (error) {
		// 	console.error("Error checking email:", error);
		// 	email_message.value = "Error checking email. Try again.";
		// 	email_exists.value = true;
		// 	email_accepted.value = false;
		// }
	};

	const VerifyConfirmPasword = () => {
		if (password.value === re_password.value &&  (password.value != '' || re_password.value != '')) {
			repass_message.className = 'success';
			document.getElementById('recaptcha').style.display = 'block';
		} else {
			grecaptcha.reset();
			document.getElementById('recaptcha').style.display = 'none';
			document.getElementById("otpbtn").disabled = true;

			setTimeout(function() {
				repass_message.value = ''; // Clear the message
			}, 3000); // 3000 milliseconds = 3 seconds
		}
	}

	const ConfirmPassword = () => {
		if (!re_password.value) {
			repass_message.value = ""; // Clear message if confirm password is empty
			return;
		}

		if (password.value === re_password.value) {
			repass_message.value = "✅ Password Matched ";
			repass_color.value = "text-green-500";
			document.getElementById('recaptcha').style.display = 'block';

			setTimeout(function() {
				repass_message.value = ''; // Clear the message
			}, 3000); // 3000 milliseconds = 3 seconds
		} else {
			repass_message.value = "❌ Passwords do not match";
			repass_color.value = "text-red-500";
			grecaptcha.reset();
			document.getElementById('recaptcha').style.display = 'none';
			document.getElementById("otpbtn").disabled = true;
		}
	}


	// const ConfirmPasword = () => {
	// 	if (!re_password.value) {
	// 		repass_message.value = ""; 
	// 		return;
	// 	}

	// 	if (password.value === re_password.value) {
	// 		repass_message.value = "✅ Password Matched ";
	// 		repass_color.value = "text-green-500";
	// 		document.getElementById('recaptcha').style.display = 'block';

	// 		setTimeout(function() {
	// 			repass_message.value = ''; 
	// 		}, 3000);
	// 	} else {
	// 		repass_message.value = "❌ Passwords do not match";
	// 		repass_color.value = "text-red-500";
	// 		grecaptcha.reset();
	// 		document.getElementById('recaptcha').style.display = 'none';
	// 		document.getElementById("otpbtn").disabled = true;
	// 	}
	// }

	const loadRecaptchaScript = () => {
      return new Promise((resolve, reject) => {
        if (typeof grecaptcha !== 'undefined') {
          resolve();
        } else {
          const script = document.createElement('script');
          script.src = 'https://www.google.com/recaptcha/api.js';
          script.async = true;
          script.defer = true;
          script.onload = resolve;
          script.onerror = reject;
          document.head.appendChild(script);
        }
      });
    };

	const loadRecaptcha = async () => {
	document.getElementById('recaptcha').style.display = 'none'
      if (typeof grecaptcha !== 'undefined') {
        grecaptcha.render('recaptcha', {
          sitekey: '6Lcsrr4qAAAAABRyxv3qYA6U437gXKYAqB88z4K7', // Replace with your site key
          callback: onCaptchaVerified,
        });
      }else{
		captchaVerified.value = false;
		// console.error('reCAPTCHA is not loaded');
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
		formData.append('country_code_id',country_code.value)
		formData.append('email',email.value)
		formData.append('password',password.value)
			axios.post("/api/add_jobseeker",formData).then(function () {
				rejectModal.value=true;
					setTimeout(function() {
						router.push('/login')
					}, 3000); // 3000 milliseconds = 3 seconds
			});
	}

	const sendOTP = () => {
		const formOTP= new FormData()
		formOTP.append('email',email.value)
		if(firstname.value != '' && lastname.value != '' && contact.value != '' && email.value != '' && password.value != ''){
			axios.post(`/api/send-otp`,formOTP).then(function (response) {
				otp_success_message.value = response.data.message;
					setTimeout(function() {
						otp_success_message.value = ''
					}, 3000); // 3000 milliseconds = 3 seconds
				otpSent.value = true;

			  // Start 5-minute countdown (300 seconds)
			  timeLeft.value = 300;
					isResendDisabled.value = true;
					
					timer.value = setInterval(() => {
						if (timeLeft.value > 0) {
						timeLeft.value--;
						} else {
						isResendDisabled.value = false;
						clearInterval(timer.value);
						}
					}, 1000);
			}, function (error) {
				otp_error_message.value = error.response.data.message;
				setTimeout(function() {
					otp_error_message.value = ''
				}, 3000); // 3000 milliseconds = 3 seconds
				
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

	const beforeUnmount = () => {
		clearInterval(timer.value);
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
			otp_error_message.value = error.response.data.message;
			setTimeout(function() {
				otp_error_message.value = ''
			}, 3000); // 3000 milliseconds = 3 seconds
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
	<!-- <div class="loader-overlay">
		<div class="loader"></div>
	</div> -->
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
							<h4 class="mb-0">Your Job Seeker Account</h4>
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
							<div class="row form-group">
								<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="jobtitle">Job Title</label>
									<input type="text" id="jobtitle" class="form-control" placeholder="">
								</div>
							</div>
							<hr>
							<div class="row form-group">
								<div class="col-lg-5 col-md-5 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold" for="Gender">Gender</label>
									<select class="form-control">
										<option value="">Select</option>
									</select>
								</div>
								<div class="col-lg-5 col-md-5 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold" for="birth">Birthdate</label>
									<input type="date" id="birth" class="form-control" placeholder="">
								</div>
								<div class="col-lg-2 col-md-2 mb-3 mb-md-0">
									<label class="font-weight-bold" for="age">Age</label>
									<input type="number" id="age" class="form-control" disabled="">
								</div>
							</div>
							<label class="font-weight-bold mb-0">Address</label>
							<div class="row form-group">
								<div class="col-md-6 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold mb-0 text-xs" for="Street">Street</label>
									<input type="text" id="Street" class="form-control" placeholder="Street">
								</div>
								<div class="col-md-6 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold mb-0 text-xs" for="City">City</label>
									<input type="text" id="City" class="form-control" placeholder="City">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-6 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold mb-0 text-xs" for="Province">Province</label>
									<input type="text" id="Province" class="form-control" placeholder="Province">
								</div>
								<div class="col-md-6 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold mb-0 text-xs" for="Country">Country</label>
									<input type="text" id="Country" class="form-control" placeholder="Country">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-6 col-md-6 mb-3 mb-md-0 !pr-0">
									<label class="font-weight-bold" for="degree">Degree</label>
									<select class="form-control">
										<option value="">Select</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="jobtitle">Profile Description</label>
									<textarea id="jobtitle" class="form-control" placeholder="" rows="3"></textarea>
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
						<div class="col-md-12 col-lg-8 mb-3">
							<div class="p-5 bg-white">
								<!-- <h4 class="mb-0">Your Employer Account</h4> -->
								<p class="">Be found by employers. Start a MagAbroad Profile.</p>
								<hr>
								<form @submit.prevent="sendOTP">
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="fullname">First Name</label>
											<input type="text" id="fname" class="form-control" placeholder="First Name" v-model="firstname" @click="resetError('fname')">
											<p v-if="fname_message" style="color: red;">{{ fname_message }}</p>
										</div>
										<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="fullname">Middle Name</label>
											<input type="text" id="" class="form-control" placeholder="Middle Name" v-model="middlename">
										</div>
										
									</div>
									<div class="row form-group">
										<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="fullname">Last Name</label>
											<input type="text" id="lname" class="form-control" placeholder="Last Name" v-model="lastname" @click="resetError('lname')">
											<p v-if="lname_message" style="color: red;">{{ lname_message }}</p>
										</div>
									</div>
									<!-- <div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="phone">Phone Number</label>
											<input type="text" id="contact" class="form-control" placeholder="Phone Number" v-model="contact_no" @keypress="isNumber($event)" @click="resetError('contact')">
											<p v-if="contact_message" style="color: red;">{{ contact_message }}</p>

										</div>
									</div> -->
									<div class="row form-group">
										<div class="col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="phone">Phone Number</label>
											<div class="phone-input-group">
												<select id="country-code" v-model="country_code">
													<option :value="cc.id" v-for="cc in countrycodelist" :key="cc.id">{{ cc.country_name }} ({{ cc.country_code }})</option>
												</select>
												<input type="text" id="contact" class="form-control" placeholder="Phone Number" v-model="contact_no" @keypress="isNumber($event)" @click="resetError('contact')">
												<!-- <p v-if="contact_message" style="color: red;">{{ contact_message }}</p> -->
											</div>
											<p v-if="contact_message" style="color: red;">{{ contact_message }}</p>
										</div>
									</div>
									<!-- <div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="email">Email Address</label>
											<input type="email" id="email" class="form-control" placeholder="Email Address" v-model="email" @click="resetError('email')" @blur="EmailChecker()">
											<p v-if="email_message" style="color: red;">{{ email_message }}</p>
										</div>
									</div> -->
									<div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0 mb-0" for="email">Email Address</label>
											<input 
												type="email" 
												id="email" 
												class="form-control" 
												:class="{
													'!border-red-500': email_exists,
													'!border-green-500': email_accepted
												}" 
												placeholder="Email Address" 
												v-model="email" 
												@click="resetError('email')" 
												@blur="EmailChecker()"
											>
											<p v-if="email_message" 
											:class="{
												'text-red-500': email_exists, 
												'text-green-500': email_accepted
											}" 
											class="text-sm mt-1 flex items-center mb-0">
												{{ email_message }}
											</p>
										</div>
									</div>
									<!-- <div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="email">Password</label>
											<input :type="showPassword ? 'text' : 'password'" id="password" class="form-control" placeholder="Password" v-model="password" @click="resetError('password')">
											<p v-if="pass_message" style="color: red;">{{ pass_message }}</p>
										</div>
									</div>
									<span class="toggle-password" @click="togglePassword"  style="position: absolute; top: 72%; right: 20px; transform: translateY(-50%); cursor: pointer;">
										<i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
									</span>

									<div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="email">Confirm Password</label>
											<input type="password" id="re_password" class="form-control" placeholder="Re-enter your password" v-model="re_password" @input="ConfirmPasword($event)">
											<p v-if="repass_message">{{ repass_message }}</p>
										</div>
									</div> -->
									<div class="row form-group">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="password">Password</label>
											<div class="relative">
												<input 
													:type="showPassword ? 'text' : 'password'" 
													id="password" 
													class="form-control"
													:class="{'!border-green-500': passwordsMatch, '!border-red-500': !passwordsMatch && re_password}" 
													placeholder="Password" 
													v-model="password" 
													@click="resetError('password')"
												>
												<p v-if="pass_message" class="text-red-500 text-sm mt-1">{{ pass_message }}</p>
												<span class="toggle-password" @click="togglePassword">
													<i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
												</span>
											</div>
										</div>
									</div>

									<div class="row form-group mb-4">
										<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
											<label class="font-weight-bold mb-0" for="re_password">Confirm Password</label>
											<div class="relative">
												<input 
													:type="showConfirmPassword ? 'text' : 'password'" 
													id="re_password" 
													class="form-control" 
													:class="{'!border-green-500': passwordsMatch, '!border-red-500': !passwordsMatch && re_password}" 
													placeholder="Re-enter your password" 
													v-model="re_password" 
													@input="ConfirmPassword($event)"
												>
												<span class="toggle-password" @click="toggleConfirmPassword">
													<i :class="showConfirmPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
												</span>
												<p v-if="repass_message" :class="`${repass_color} text-sm mt-1 flex items-center absolute`">
													{{ repass_message }}
												</p>
											</div>
										</div>
									</div>

									<div class="row form-group">
										<div id="recaptcha" class="col-lg-12 g-recaptcha"></div>
									</div>
									
									<div class="row form-group" v-if="otpSent != true">
										<div class="col-md-12">
											<!-- <input type="submit" value="Create New Account" class="btn btn-primary  py-2 px-5"> -->
											<!-- <button type="submit" id="otpbtn" class="btn btn-primary mr-2 w-44" :disabled = "captchaVerified == false">Send OTP</button> -->
											<button type="submit" id="otpbtn" class="btn btn-primary mr-2 w-44 flex items-center justify-center" :disabled="captchaVerified === false || loading" @click="sendOTP">
												<span v-if="loading" class="flex justify-center">
														<svg class="w-5 h-5 animate-spin text-white" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
														<circle cx="50" cy="50" r="40" stroke="currentColor" stroke-width="8" fill="none" stroke-dasharray="200" stroke-linecap="round">
															<animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"/>
														</circle>
													</svg>
												</span>
												<span v-else>Send OTP </span>
											</button>
										</div>
									</div>
								</form>
								<p  class="bg-yellow-100 px-2 py-1 rounded !border !border-yellow-400 text-yellow-600" v-if="otp_success_message">{{ otp_success_message }}</p>
								<p  class="bg-red-100 px-2 py-1 rounded !border !border-red-400 text-red-600" v-if="otp_error_message">{{ otp_error_message }}</p>
								<div>
									<form @submit.prevent="verifyOTP" v-if="otpSent">
										<div class="row form-group">
											<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
												<input type="text" v-model="otp" class="form-control" placeholder="Enter OTP" required />
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<!-- <button type="submit" class="btn btn-primary mr-2 w-44" @click="SaveNewJobseeker()">Create Account</button>
												<button type="button" @click="sendOTP()" id="save" class="btn btn-primary mr-2 w-44">Resend OTP</button> -->
												<button type="submit" class="btn btn-primary mr-2 w-44" >Create Account</button>
												<button @click="sendOTP" :disabled="isResendDisabled" class="btn btn-primary mr-2 w-44">{{ isResendDisabled ? `Resend OTP in ${formattedTime}` : 'Send OTP' }}</button>
											</div>
										</div>
									</form>
								</div>
								<hr>
							</div>
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