<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
			<div class="overlay"></div>
			<div class="container"></div>
		</div>

		<section class="ftco-section bg-light">
            <div class="container">
                <h2 class="mb-2 text-left">Job Listings</h2>
                <div class="table-responsive border rounded-xl">
                    <table class="table text-base">
                        <thead class="bg-gray-100">
                            <tr>
                                <th width="5">Status</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th class="text-center">Applicants </th>
                                <th width="12%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Job 1 -->
                            <tr>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>Frontend Developer</td>
                                <td>Remote</td>
                                <td class="text-center">2</td>
                                <td class="flex justify-center space-x-1">
                                    <a href="/employer/job_view" class="btn btn-sm btn-primary">View</a>
                                    <a href="" class="btn btn-sm btn-secondary">Edit</a>
                                </td>
                            </tr>
                            <!-- Job 2 -->
                            <tr>
                                <td>
                                    <span class="badge badge-success">Active</span>
                                </td>
                                <td>Backend Engineer</td>
                                <td>San Francisco, CA</td>
                                <td class="text-center">2</td>
                                <td class="flex justify-center space-x-1">
                                    <a href="/employer/job_view" class="btn btn-sm btn-primary">View</a>
                                    <a href="" class="btn btn-sm btn-secondary">Edit</a>
                                </td>
                            </tr>
                            <!-- Job 3 -->
                            <tr>
                                <td>
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                                <td>UI/UX Designer</td>
                                <td>Hybrid</td>
                                <td class="text-center">3</td>
                                <td class="flex justify-center space-x-1">
                                    <a href="/employer/job_view" class="btn btn-sm btn-primary">View</a>
                                    <a href="" class="btn btn-sm btn-secondary">Edit</a>
                                </td>
                            </tr>
                            <!-- Job 4 -->
                            <tr>
                                <td>
                                    <span class="badge badge-danger">Closed</span>
                                </td>
                                <td>Project Manager</td>
                                <td>Remote</td>
                                <td class="text-center">2</td>
                                <td class="flex justify-center space-x-1">
                                    <a href="/employer/job_view" class="btn btn-sm btn-primary">View</a>
                                    <a href="" class="btn btn-sm btn-secondary">Edit</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
	import navigation from '@/layouts/navigation_employer.vue';
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