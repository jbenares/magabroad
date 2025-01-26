<script setup>
	import navigation from '@/layouts/navigation.vue';
	import axios from 'axios';
	import {onMounted, ref} from "vue";
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
	let business_name=ref('');
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
	let repass_message=ref('');
	let business_message=ref('');

	const showPassword = ref(false)

	onMounted(async () => {
		loadRecaptcha()
		loadRecaptchaScript()
		getcountrycode()
	})

	const getcountrycode = async () => {
		let response = await axios.get("/api/country_code_list");
		countrycodelist.value=response.data
	}

	const togglePassword = () => {
		showPassword.value = !showPassword.value
	}

	const ConfirmPasword = () => {
		if (password.value === re_password.value) {
			repass_message.value = 'Passwords match!';
			repass_message.className = 'success';
			document.getElementById('recaptcha').style.display = 'block';

			setTimeout(function() {
				repass_message.value = ''; // Clear the message
			}, 3000); // 3000 milliseconds = 3 seconds
		} else {
			repass_message.value = 'Passwords do not match.';
			repass_message.className = 'error';
			grecaptcha.reset();
			document.getElementById('recaptcha').style.display = 'none';
		}
	}

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

	const SaveNewEmployer = () => {
		const formData= new FormData()
		formData.append('firstname',firstname.value)
		formData.append('middlename',middlename.value)
		formData.append('lastname',lastname.value)
		formData.append('contact_no',contact_no.value)
		formData.append('country_code_id',country_code.value)
		formData.append('email',email.value)
		formData.append('password',password.value)
		formData.append('business_name',business_name.value)
		// if(firstname.value != '' && lastname.value != '' && contact.value != '' && email.value != '' && password.value != ''){
			axios.post("/api/add_employer",formData).then(function () {
				router.push('/login')
			});
		// }else{
		// 		if(firstname.value==''){
		// 			document.getElementById('fname').style.backgroundColor = '#FAA0A0';
		// 		}
		// 		if(lastname.value==''){
		// 			document.getElementById('lname').style.backgroundColor = '#FAA0A0';
		// 		}
		// 		if(contact.value==''){
		// 			document.getElementById('contact').style.backgroundColor = '#FAA0A0';
		// 		}
		// 		if(email.value==''){
		// 			document.getElementById('email').style.backgroundColor = '#FAA0A0';
		// 		}
		// 		if(password.value==''){
		// 			document.getElementById('password').style.backgroundColor = '#FAA0A0';
		// 		}
		// 		// const btn_save = document.getElementById("save");
		// 		// btn_save.disabled = true;
		// 	}
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
			if(business_name.value==''){
				// document.getElementById('password').style.backgroundColor = '#FAA0A0';
				business_message.value = 'Business Name is required!'
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
			SaveNewEmployer()
		}, function (error) {
			message.value = error.response.data.message;
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
		if(button==='business'){
			// document.getElementById('contact').style.backgroundColor = '#FEFCE8';
			business_message.value = '';
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
<style>
.password-wrapper {
  position: relative;
}

.toggle-password {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  cursor: pointer;
}
</style>
<template>
	
	<navigation>
		<div class="hero-wrap hero-wrap-2" >
		  <div class="overlay"></div>
			  <div class="container">
				  <div class="row no-gutters slider-text align-items-end justify-content-start">
					  <div class="col-md-12 text-center mb-5" >
					  <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register</span></p>
					  <h1 class="mb-3 bread">Create Employer Account</h1>
					 
				  </div>
			  </div>
		  </div>
		</div>
  
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8 mb-5">
						<!-- <form action="#" class="p-5 bg-white"> -->
							<h4 class="mb-0">Your Employer Account</h4>
							<p class="m-0">We wont share your details with anyone.</p>
							<hr>
							<form @submit.prevent="sendOTP">
								<div class="row form-group">
									<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
										<label class="font-weight-bold" for="fullname">First Name</label>
										<input type="text" id="fname" class="form-control" placeholder="First Name" v-model="firstname" @click="resetError('fname')">
										<p v-if="fname_message" style="color: red;">{{ fname_message }}</p>
									</div>
									<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
										<label class="font-weight-bold" for="fullname">Middle Name</label>
										<input type="text" id="" class="form-control" placeholder="Middle Name" v-model="middlename">
									</div>
									<div class="col-lg-6 col-md-6 mb-3 mb-md-0">
										<label class="font-weight-bold" for="fullname">Last Name</label>
										<input type="text" id="lname" class="form-control" placeholder="Last Name" v-model="lastname" @click="resetError('lname')">
										<p v-if="lname_message" style="color: red;">{{ lname_message }}</p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="businessname">Business name</label>
										<input type="text" id="businessname" class="form-control" placeholder="Business Name" v-model="business_name" @click="resetError('business')">
									</div>
								</div>
								<!-- <div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="phone">Phone Number</label>
										<input type="text" id="contact" class="form-control" placeholder="Phone Number" v-model="contact_no" @keypress="isNumber($event)" @click="resetError('contact')">
										<p v-if="contact_message" style="color: red;">{{ contact_message }}</p>

									</div>
								</div> -->
								<div class="row form-group">
									<div class="col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="phone">Phone Number</label>
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
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="email">Email Address</label>
										<input type="email" id="email" class="form-control" placeholder="Email Address" v-model="email" @click="resetError('email')">
										<p v-if="email_message" style="color: red;">{{ email_message }}</p>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="email">Password</label>
										<input :type="showPassword ? 'text' : 'password'" id="password" class="form-control" placeholder="Password" v-model="password" @click="resetError('password')">
										<p v-if="pass_message" style="color: red;">{{ pass_message }}</p>
									</div>
								</div>
								<span class="toggle-password" @click="togglePassword"  style="position: absolute; top: 72%; right: 20px; transform: translateY(-50%); cursor: pointer;">
									<i :class="showPassword ? 'fa fa-eye-slash' : 'fa fa-eye'"></i>
								</span>

								<div class="row form-group">
									<div class="col-lg-12 col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold" for="email">Confirm Password</label>
										<input type="password" id="re_password" class="form-control" placeholder="Re-enter your password" v-model="re_password" @input="ConfirmPasword($event)">
										<p v-if="repass_message">{{ repass_message }}</p>
									</div>
								</div>

								<div class="row form-group">
									<div id="recaptcha" class="col-lg-12 g-recaptcha"></div>
								</div>
								
								<div class="row form-group" v-if="otpSent != true">
									<div class="col-md-12">
										<!-- <input type="submit" value="Create New Account" class="btn btn-primary  py-2 px-5"> -->
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
								
							
							<!-- <div class="row">
								<div class="col-lg-12 col-md-12"><h3>Business Details</h3></div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="businessname">Business name</label>
									<input type="text" id="businessname" class="form-control" placeholder="">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="country">Country</label>
									<select id="country" class="form-control">
										<option value="">
											Select Country
										</option>
									</select>
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="phone">Phone Number</label>
									<div class="phone-input-group">
										<select id="country-code">
											<option value="+63">Philippines (+63)</option>
											<option value="+1">USA (+1)</option>
											<option value="+44">UK (+44)</option>
											<option value="+91">India (+91)</option>
										</select>
										<input type="text" id="phone" placeholder="9051234567" />
									</div>
								</div>
							</div> -->
							<hr>
							<!-- <div class="row form-group">
								<div class="col-md-12">
									<input type="submit" value="Create New Account" class="btn btn-primary  py-2 px-5">
									<button type="button" @click="SaveNewEmployer()" id="save" class="btn btn-primary mr-2 w-44">Submit</button>
								</div>
							</div> -->
						<!-- </form> -->
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