<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
			<div class="overlay"></div>
			<div class="container"></div>
		</div>

		<section class="ftco-section bg-light">
			<div class="container">
				<!-- Dashboard Section for Job Seeker -->
				<div class="row">
					<div class="col-lg-3 mb-4">
						<div class="p-3 bg-white text-center rounded-lg">
							<p class="text-left text-muted text-sm mb-0">Profile Completion: 75%</p>
							<div class="progress mb-0 h-10" >
								<div class="progress-bar bg-primary w-[75%]" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<hr>
							<img src="../../../images/person_2.jpg" alt="Profile Picture" class="img-fluid rounded-circle mb-2" >
							<h4 class="mb-2">John Doe</h4>
							<hr>
							<div class="">
								<a href="" class=" text-gray-500 hover:text-gray-500">
									<div class="flex justify-between hover:bg-gray-100 px-2">
										<div class="flex justify-start space-x-2">
											<BookmarkIcon class="size-5 mt-1"/>
											<span>Saved Jobs</span>
										</div>
										<span>9</span>
									</div>
								</a>
								<a href="" class=" text-gray-500 hover:text-gray-500">
									<div class="flex justify-between hover:bg-gray-100 px-2">
										<div class="flex justify-start space-x-2">
											<PaperAirplaneIcon class="size-5 mt-1"/>
											<span>Companies Applied</span>
										</div>
										<span>9</span>
									</div>
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-9">
						<div class="row">
							<div class="col-md-12">
								<div class="bg-gradient-to-r from-blue-400 to-blue-600 w-full rounded-2xl p-4 px-5 mb-4 ">
									<h2 class="text-white font-semibold mb-0 leading">Find your dream job here! </h2>
									<p class="text-white">Looking for jobs? Browse our latest job openings to view & apply to the best jobs today!</p>
									<br>
									<form action="#" class="search-job">
										<div class="row no-gutters">
											<div class="col-md mr-md-2">
												<div class="form-group">
													<div class="form-field">
														<div class="icon"><span class="icon-briefcase"></span></div>
														<input type="text" class="form-control" placeholder="eg. Garphic. Web Developer">
													</div>
												</div>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													<div class="form-field">
														<a href="/job_seeker/search_job" type="submit" class="btn !bg-orange-400 text-white w-full">Search</a>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-12">
								<p class="mb-1">Suggested Jobs</p>
							</div>
							<div class="col-md-12"  data-aos="fade-up">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center rounded-lg">
									<div class="relative mb-4 mb-md-0">
										<div class="absolute top-0 right-0 ">
											<div class="flex justify-between space-x-3" >
												<button class="text-gray-300 hover:text-yellow-400">
													<BookmarkIcon class="size-5"/>
												</button>
												<a href="/job_seeker/apply_job" class="btn btn-primary btn-sm !rounded-3xl">Apply</a>
											</div>
										</div>
										<a href="/job_seeker/view_job" class="">
											<div class="job-post-item-header align-items-center">
												<h3 class="mb-0 leading-tight text-gray-700">Frontend Developer</h3>
												<p class="mb-2 leading-tight !text-gray-500">Company Name here</p>
												<div class="mb-2 flex justify-start space-x-1">
													<span class="text-gray-400 text-sm">Part Time</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">On Site</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">Bacolod City Negros Occidental</span>
												</div>
												<p class="text-gray-500 leading-normal mb-2">
													The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products.
												</p>
												<p class="mb-0 flex space-x-2 text-blue-400">
													<span class="pt-0.5"><ClockIcon class="size-4" /></span>
													<span class="text-sm">Posted Just Now</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</div><!-- end -->

							<div class="col-md-12"  data-aos="fade-up">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center rounded-lg">
									<div class="relative mb-4 mb-md-0">
										<div class="absolute top-0 right-0 ">
											<div class="flex justify-between space-x-3" >
												<button class="text-gray-300 hover:text-yellow-400">
													<BookmarkIcon class="size-5"/>
												</button>
												<a href="/job_seeker/apply_job" class="btn btn-primary btn-sm !rounded-3xl">Apply</a>
											</div>
										</div>
										<a href="/job_seeker/view_job" class="">
											<div class="job-post-item-header align-items-center">
												<h3 class="mb-0 leading-tight text-gray-700">Graphic Designer</h3>
												<p class="mb-2 leading-tight !text-gray-500">Company Name here</p>
												<div class="mb-2 flex justify-start space-x-1">
													<span class="text-gray-400 text-sm">Part Time</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">On Site</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">Bacolod City Negros Occidental</span>
												</div>
												<p class="text-gray-500 leading-normal mb-2">
													The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products.
												</p>
												<p class="mb-0 flex space-x-2 text-blue-400">
													<span class="pt-0.5"><ClockIcon class="size-4" /></span>
													<span class="text-sm">Posted Just Now</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</div><!-- end -->

							<div class="col-md-12"  data-aos="fade-up">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center rounded-lg">
									<div class="relative mb-4 mb-md-0">
										<div class="absolute top-0 right-0 ">
											<div class="flex justify-between space-x-3" >
												<button class="text-gray-300 hover:text-yellow-400">
													<BookmarkIcon class="size-5"/>
												</button>
												<a href="/job_seeker/apply_job" class="btn btn-primary btn-sm !rounded-3xl">Apply</a>
											</div>
										</div>
										<a href="/job_seeker/view_job" class="">
											<div class="job-post-item-header align-items-center">
												<h3 class="mb-0 leading-tight text-gray-700">Sr Graphic Designer</h3>
												<p class="mb-2 leading-tight !text-gray-500">Company Name here</p>
												<div class="mb-2 flex justify-start space-x-1">
													<span class="text-gray-400 text-sm">Part Time</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">On Site</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">Bacolod City Negros Occidental</span>
												</div>
												<p class="text-gray-500 leading-normal mb-2">
													The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products.
												</p>
												<p class="mb-0 flex space-x-2 text-blue-400">
													<span class="pt-0.5"><ClockIcon class="size-4" /></span>
													<span class="text-sm">Posted Just Now</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</div><!-- end -->

							<div class="col-md-12"  data-aos="fade-up">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center rounded-lg">
									<div class="relative mb-4 mb-md-0">
										<div class="absolute top-0 right-0 ">
											<div class="flex justify-between space-x-3" >
												<button class="text-gray-300 hover:text-yellow-400">
													<BookmarkIcon class="size-5"/>
												</button>
												<a href="/job_seeker/apply_job" class="btn btn-primary btn-sm !rounded-3xl">Apply</a>
											</div>
										</div>
										<a href="/job_seeker/view_job" class="">
											<div class="job-post-item-header align-items-center">
												<h3 class="mb-0 leading-tight text-gray-700">Web Designer</h3>
												<p class="mb-2 leading-tight !text-gray-500">Company Name here</p>
												<div class="mb-2 flex justify-start space-x-1">
													<span class="text-gray-400 text-sm">Part Time</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">On Site</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">Bacolod City Negros Occidental</span>
												</div>
												<p class="text-gray-500 leading-normal mb-2">
													The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products.
												</p>
												<p class="mb-0 flex space-x-2 text-blue-400">
													<span class="pt-0.5"><ClockIcon class="size-4" /></span>
													<span class="text-sm">Posted Just Now</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</div><!-- end -->

							<div class="col-md-12"  data-aos="fade-up">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center rounded-lg">
									<div class="relative mb-4 mb-md-0">
										<div class="absolute top-0 right-0 ">
											<div class="flex justify-between space-x-3" >
												<button class="text-gray-300 hover:text-yellow-400">
													<BookmarkIcon class="size-5"/>
												</button>
												<a href="/job_seeker/apply_job" class="btn btn-primary btn-sm !rounded-3xl">Apply</a>
											</div>
										</div>
										<a href="/job_seeker/view_job" class="">
											<div class="job-post-item-header align-items-center">
												<h3 class="mb-0 leading-tight text-gray-700">Back End Developer</h3>
												<p class="mb-2 leading-tight !text-gray-500">Company Name here</p>
												<div class="mb-2 flex justify-start space-x-1">
													<span class="text-gray-400 text-sm">Part Time</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">On Site</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">Bacolod City Negros Occidental</span>
												</div>
												<p class="text-gray-500 leading-normal mb-2">
													The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products.
												</p>
												<p class="mb-0 flex space-x-2 text-blue-400">
													<span class="pt-0.5"><ClockIcon class="size-4" /></span>
													<span class="text-sm">Posted Just Now</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</div><!-- end -->

							<div class="col-md-12"  data-aos="fade-up">
								<div class="job-post-item p-4 d-block d-lg-flex align-items-center rounded-lg">
									<div class="relative mb-4 mb-md-0">
										<div class="absolute top-0 right-0 ">
											<div class="flex justify-between space-x-3" >
												<button class="text-gray-300 hover:text-yellow-400">
													<BookmarkIcon class="size-5"/>
												</button>
												<a href="/job_seeker/apply_job" class="btn btn-primary btn-sm !rounded-3xl">Apply</a>
											</div>
										</div>
										<a href="/job_seeker/view_job" class="">
											<div class="job-post-item-header align-items-center">
												<h3 class="mb-0 leading-tight text-gray-700">Junior Developer</h3>
												<p class="mb-2 leading-tight !text-gray-500">Company Name here</p>
												<div class="mb-2 flex justify-start space-x-1">
													<span class="text-gray-400 text-sm">Part Time</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">On Site</span>
													<span class="text-sm">-</span>
													<span class="text-gray-400 text-sm">Bacolod City Negros Occidental</span>
												</div>
												<p class="text-gray-500 leading-normal mb-2">
													The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products.
												</p>
												<p class="mb-0 flex space-x-2 text-blue-400">
													<span class="pt-0.5"><ClockIcon class="size-4" /></span>
													<span class="text-sm">Posted Just Now</span>
												</p>
											</div>
										</a>
									</div>
								</div>
							</div><!-- end -->
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
	import navigation from '@/layouts/navigation_jobseeker.vue';
	import { BookmarkIcon, PaperAirplaneIcon, ClockIcon } from '@heroicons/vue/24/solid'
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