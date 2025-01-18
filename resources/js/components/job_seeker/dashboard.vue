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
						<div class="p-3 bg-white ">
							<h4 class="text-center">Welcome, Job Seeker</h4>
							<p class="text-center text-muted">Explore Opportunities</p>
							<hr>
							<h6>Saved Jobs</h6>
							<h2 class="text-primary">8</h2>
							<a href="/job_seeker/search_job" class="btn btn-primary btn-block">Browse Jobs</a>
						</div>
					</div>

					<div class="col-lg-9">
						<div class="row">
							<div class="col-md-6 mb-4">
								<div class="p-4 bg-white ">
									<h6 class="text-muted">Applications Submitted</h6>
									<h3>5 applications</h3>
									<a href="#" class="text-primary">View Applications</a>
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="p-4 bg-white ">
									<h6 class="text-muted">Interviews Scheduled</h6>
									<h3>2 upcoming interviews</h3>
									<a href="#" class="text-primary">View Schedule</a>
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="p-4 bg-white ">
									<h6 class="text-muted">Recommended Jobs</h6>
									<h3>10 new jobs</h3>
									<a href="#" class="text-primary">View Recommendations</a>
								</div>
							</div>
							<div class="col-md-6 mb-4">
								<div class="p-4 bg-white ">
									<h6 class="text-muted">Profile Views</h6>
									<h3>15 this week</h3>
									<a href="#" class="text-primary">View Analytics</a>
								</div>
							</div>
						</div>

						<div class="mt-4">
							<h5>Recent Activities</h5>
							<div class="p-3 bg-white ">
								<p>Your application for Frontend Developer has been viewed</p>
								<a href="#" class="btn btn-primary btn-sm">View</a>
							</div>
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
							<h2>Subscribe to our Newsletter</h2>
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
	</navigation>
</template>

<script setup>
	import navigation from '@/layouts/navigation_jobseeker.vue';
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