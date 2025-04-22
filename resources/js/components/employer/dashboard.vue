<script setup>
import navigation from '@/layouts/navigation_employer.vue';
import { ExclamationTriangleIcon, CheckBadgeIcon } from '@heroicons/vue/24/solid'
import { onMounted,ref} from 'vue';
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

let form = ref([]);

onMounted(async () => {
	getEmployerData()
})

const getEmployerData = async () => {
	let response = await axios.get(`/api/employer_data`);
	form.value=response.data.employer
}



</script>
<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
			<div class="overlay"></div>
			<div class="container"></div>
		</div>
		<section class="bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="flex flex-col sm:flex-row items-center justify-between w-full bg-white px-14 py-4 rounded-b-2xl shadow-sm">
							<div class="flex items-center gap-4">
								<div class="flex-shrink-0">
									<img src="../../../images/company-1.jpg" alt="Company Logo" class="w-20 h-20 rounded-full object-cover border-2 border-blue-100 shadow-sm"/>
								</div>
								<div class="flex flex-col">
									<div class="flex items-center text-xl font-semibold text-gray-900">
										Sample Company
										<CheckBadgeIcon class="w-5 h-5 text-blue-500 ml-1" />
									</div>
									<div class="text-sm text-gray-500">Tech Industry</div>
								</div>
							</div>
							<div class="mt-2 sm:mt-0 flex gap-2">
								<a href="/employer/job_list" class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
									Manage Job Posts
								</a>
								<a href="/employer/question_list" class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
									Manage Questions
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-4">
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-1 leading-none flex items-center gap-2">
									Active Job Postings
								</div>
								<div class="text-lg font-semibold text-gray-900 mb-3">12 jobs currently posted</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Manage Postings</a>
							</div>
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-1 leading-none flex items-center gap-2">
									New Applications
								</div>
								<div class="text-lg font-semibold text-gray-900 mb-3">45 new applications</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">View Applications</a>
							</div>
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-1 leading-none flex items-center gap-2">
									Team Members
								</div>
								<div class="text-lg font-semibold text-gray-900 mb-3">5 team members added</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Manage Team</a>
							</div>
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-1 leading-none flex items-center gap-2">
									Performance Analytics
								</div>
								<div class="text-lg font-semibold text-gray-900 mb-3">120 job views this week</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">View Analytics</a>
							</div>
						</div>
						<div class="mt-8">
						<h2 class="text-lg text-gray-700 font-semibold mb-4">Recent Activities</h2>
						<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
							<div class="flex items-center gap-4">
							<img src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="John Doe" class="w-10 h-10 rounded-full" />
							<p class="text-gray-500 text-base">John Doe applied for Frontend Developer</p>
							</div>
							<button class="bg-blue-600 text-white text-sm font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition w-full sm:w-auto">
							View
							</button>
						</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<section class="ftco-section bg-light">
			<div class="container">
				<!-- Dashboard Section -->
				<div class="row"  v-if="form.approved == 0">
					<div class="col-lg-12">
						<div class="p-3 px-4 mb-4 rounded-lg bg-white border border-yellow-600">
							<div class="flex justify-start space-x-3">
								<div class="text-yellow-500">
									<ExclamationTriangleIcon class="size-14"/>
								</div>
								<div >
									<h4 class="text-yellow-500 font-bold mb-0 leading-tight">Warning!</h4>
									<p class="leading-snug m-0">Your application is currently under review. Please keep an eye on your email for updates on the status of your registration.</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<br>
				<div class="row" v-if="form.approved == 1">
					<div class="col-lg-12">
						<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
						
						<!-- Profile Card -->
						<div class="bg-white rounded-2xl p-6 shadow-md flex flex-col items-center text-center relative group">
  						<!-- Verified Badge -->
						<div class="absolute top-4 flex space-x-1 right-4 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">
							<CheckBadgeIcon class="size-4"></CheckBadgeIcon>
							<span>Verified</span>
						</div>

						<!-- Company Logo with ring -->
						<div class="mb-6">
							<img alt="Company Logo" class="rounded-lg " height="100" src="../../../images/company-1.jpg" width="200" />
						</div>

						<!-- Company Info -->
						<div class="text-lg font-semibold text-gray-900">Sample Company</div>
						<div class="text-sm text-gray-500 mb-4">Tech Industry</div>

						<!-- Progress Section -->
						<div class="w-full">
							<div class="flex items-center justify-between text-xs text-gray-400 font-semibold mb-1">
								<span>Profile Completion</span>
								<span>75%</span>
							</div>
							
							<div class="relative h-3 w-full bg-gray-200 rounded-full overflow-hidden">
							<div
								class="h-3 bg-gradient-to-r from-blue-500 to-blue-700 rounded-full animate-pulse"
								style="width: 75%;"
							></div>
							</div>

							<!-- Steps Text -->
							<div class="mt-2 text-xs text-gray-500">
							3 of 4 steps completed
							</div>
						</div>
						</div>

						<!-- Stats Section -->
						<div class="md:col-span-3 flex flex-col gap-6">
							
							<div class="flex justify-end gap-3">
							<button class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white text-sm font-medium px-4 py-2 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-300">
								➕ Add Questions
							</button>
							<button class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-sm font-medium px-4 py-2 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-300">
								⚙️ Settings
							</button>
							</div>
							<!-- Stat Cards -->
							<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
							<!-- Card 1 -->
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-2 font-semibold flex items-center gap-2">
									📄 Active Job Postings
								</div>
								<div class="text-2xl font-bold text-gray-900 mb-3">12 jobs currently posted</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Manage Postings</a>
							</div>

							<!-- Card 2 -->
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-2 font-semibold flex items-center gap-2">
									📨 New Applications
								</div>
								<div class="text-2xl font-bold text-gray-900 mb-3">45 new applications</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">View Applications</a>
							</div>

							<!-- Card 3 -->
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-2 font-semibold flex items-center gap-2">
									👥 Team Members
								</div>
								<div class="text-2xl font-bold text-gray-900 mb-3">5 team members added</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">Manage Team</a>
							</div>

							<!-- Card 4 -->
							<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition cursor-default flex flex-col justify-between">
								<div>
								<div class="text-xs text-gray-400 mb-2 font-semibold flex items-center gap-2">
									📊 Performance Analytics
								</div>
								<div class="text-2xl font-bold text-gray-900 mb-3">120 job views this week</div>
								</div>
								<a href="#" class="text-blue-600 text-sm font-semibold hover:underline">View Analytics</a>
							</div>
							</div>
						</div>
						</div>

						<!-- Recent Activities -->
						<div class="mt-8">
						<h2 class="text-lg text-gray-700 font-semibold mb-4">Recent Activities</h2>
						<div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
							<div class="flex items-center gap-4">
							<img src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="John Doe" class="w-10 h-10 rounded-full" />
							<p class="text-gray-500 text-base">John Doe applied for Frontend Developer</p>
							</div>
							<button class="bg-blue-600 text-white text-sm font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition w-full sm:w-auto">
							View
							</button>
						</div>
						</div>
					</div>
				</div>


				<!-- 
					<div class="row" v-if="form.approved == 1">
						
						<div class="col-lg-3 mb-4">
							<div class="tl-card h-full">
								<p class="text-left text-muted text-sm mb-0">Profile Completion: 75%</p>
								<div class="progress mb-0 h-10" >
									<div class="progress-bar bg-primary w-[75%]" role="progressbar"  aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<img src="../../../images/company-1.jpg" alt="Profile Picture" class="img-fluid rounded-circle mb-2" >
								<h4 class="mb-2">Sample Company</h4>
							</div>
						</div>

						<div class="col-lg-9">
							<div class="row">
								<div class="col-md-6 mb-4">
									<div class="tl-card">
										<h6 class="text-muted">Active Job Postings</h6>
										<h3>12 jobs currently posted</h3>
										<a href="/employer/job_list" class="text-primary">Manage Postings</a>
									</div>
								</div>
								<div class="col-md-6 mb-4">
									<div class="tl-card">
										<h6 class="text-muted">New Applications</h6>
										<h3>45 new applications</h3>
										<a href="#" class="text-primary">View Applications</a>
									</div>
								</div>
								<div class="col-md-6 mb-4">
									<div class="tl-card">
										<h6 class="text-muted">Team Members</h6>
										<h3>5 team members added</h3>
										<a href="#" class="text-primary">Manage Team</a>
									</div>
								</div>
								<div class="col-md-6 mb-4">
									<div class="tl-card">
										<h6 class="text-muted">Performance Analytics</h6>
										<h3>120 job views this week</h3>
										<a href="#" class="text-primary">View Analytics</a>
									</div>
								</div>
							</div>

							<div class="mt-4">
								<h5>Recent Activities</h5>
								<div class="p-3 bg-white rounded-lg">
									<p>John Doe applied for Frontend Developer</p>
									<a href="#" class="btn btn-primary btn-sm">View</a>
								</div>
							</div>
						</div>
					</div> 
				-->
			</div>
		</section>
		<template v-if="form.approved == 1">
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
		</template>
	</navigation>
</template>