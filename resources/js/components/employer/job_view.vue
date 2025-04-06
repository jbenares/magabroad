<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
    import { MapPinIcon, GlobeAsiaAustraliaIcon, ClockIcon, BanknotesIcon } from '@heroicons/vue/24/outline'
    import { DocumentDuplicateIcon, TrashIcon, PencilSquareIcon, EllipsisVerticalIcon } from '@heroicons/vue/24/solid'
	import axios from 'axios';
	import { onMounted, ref } from "vue"

	const jobdets = ref([])
	const props = defineProps({
		id:{
			type:String,
			default:''
		}
	})

	onMounted(async () => {
		JobView()
	})

	const JobView = async () => {
		let response = await axios.get("/api/job_details/"+props.id);
		jobdets.value = response.data.jobdets;
		console.log(response.data.jobdets);
	}
</script>
<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
			<div class="overlay"></div>
			<div class="container"></div>
		</div>

        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="relative p-4 bg-white shadow-sm">
                            <!-- Ellipsis Dropdown -->
                            <!-- <div class="absolute top-6 right-6 lg:visible  sm:invisible ">
                                <div class="flex justify-between space-x-3" >
                                    <button class="text-gray-300 hover:text-blue-500"><PencilSquareIcon class="size-5 "/></button>
                                    <button class="text-gray-300 hover:text-green-500"><DocumentDuplicateIcon class="size-5 "/></button>
                                    <button class="text-gray-300 hover:text-red-500"><TrashIcon class="size-5 "/></button>
                                </div>
                            </div> -->
                            <div class="absolute top-6 right-6 ">
                                <div class="relative group ">
                                    <button class="text-gray-400 hover:text-gray-600">
                                        <EllipsisVerticalIcon class="size-6"/>
                                    </button>
                                    <!-- Dropdown Menu -->
                                    <div class="absolute right-0  w-40 bg-white border border-gray-200 rounded-md shadow-md hidden group-hover:block">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex"><PencilSquareIcon class="size-4 pt-1"/> Edit Job</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex"><DocumentDuplicateIcon class="size-4 pt-1"/> Duplicate Job</a>
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex"><TrashIcon class="size-4 pt-1"/> Delete Job</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Ellipsis Dropdown -->

                            <h3 class="mb-0 leading-tight">Frontend Developer</h3>
                            <p class="mb-3 leading-tight !text-gray-500">Company Name here</p>

                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><MapPinIcon class="size-5 text-gray-400" /></span>
                                <span>Bacolod City Negros Occidental</span>
                            </p>
                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><ClockIcon class="size-5 text-gray-400" /></span>
                                <span>Part Time</span>
                            </p>
                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><GlobeAsiaAustraliaIcon class="size-5 text-gray-400" /></span>
                                <span>On Site</span>
                            </p>
                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><BanknotesIcon class="size-5 text-gray-400" /></span>
                                <span><span>P</span>90,000 - <span>P</span>90,000 per hour</span>
                            </p>
                            <br>
                            <h5>Job Description</h5>
                            <p class="text-gray-500 leading-normal">{{ jobdets.job_description }}</p>
                            <h5>Job Summary</h5>
                            <p class="text-gray-500 leading-normal">The Interaction Designer’s role is to turn the division’s User Experience vision into tangible, navigable reality. The Designer uses customer-driven insights and iterative methodologies to design and create usable, relevant and elegant user flows, interfaces, structure and interactions. 

							The Interaction Design team also establishes an interface design system organizing the best practices across the division’s digital banking products. </p>
                            <h5>Responsibilities</h5>
                            <ul class="text-gray-500 leading-normal">
                                <li>Develop and maintain user-facing features.</li>
                                <li>Ensure technical feasibility of UI/UX designs.</li>
                                <li>Optimize application for maximum speed and scalability.</li>
                                <li>Collaborate with other team members and stakeholders.</li>
                            </ul>
                            <h5>Requirements</h5>
                            <ul class="text-gray-500 leading-normal">
                                <li>Proficiency in React.js, JavaScript, and modern front-end libraries.</li>
                                <li>Experience with responsive design and cross-browser compatibility.</li>
                                <li>Strong understanding of version control systems (e.g., Git).</li>
                                <li>Excellent problem-solving and communication skills.</li>
                            </ul>
                            <div class="mt-4">
                                <!-- <a href="/apply/frontend-developer" class="btn btn-primary">Apply Now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-4">
                        <div class="p-3 bg-white shadow-sm">
                            <hr>
                            <h6 class="mb-0">Posted By</h6>
                            <p class="text-muted">Jane Smith (HR Manager)</p>
                            <h6 class="mb-0">Posted On</h6>
                            <p class="text-muted">January 10, 2025</p>
                            <!-- <a href="/employer/postjob" class="btn btn-primary btn-block">Post a New Job</a> -->
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