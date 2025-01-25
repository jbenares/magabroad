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
  
		<section class="ftco-section bg-light">
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
  
<script setup>
	import navigation from '@/layouts/navigation.vue';
	// // Get the elements
	// const ExperienceToggle = {
	// 	data() {
	// 		return {
	// 		hasExperience: false, // Default state for the toggle
	// 		};
	// 	},
	// 	computed: {
	// 		label() {
	// 		return this.hasExperience ? "I have experience" : "I have no experience";
	// 		},
	// 	},
	// 	methods: {
	// 		toggleExperience() {
	// 		// Logic can be added here if needed, such as saving the state to a server
	// 		console.log(`Experience: ${this.hasExperience}`);
	// 		},
	// 	},
	// };

</script>