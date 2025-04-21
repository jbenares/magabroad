<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
    import { MapPinIcon, GlobeAsiaAustraliaIcon, ClockIcon, BanknotesIcon ,BuildingOfficeIcon, BuildingOffice2Icon} from '@heroicons/vue/24/outline'
    import { DocumentDuplicateIcon, TrashIcon, PencilSquareIcon, EllipsisVerticalIcon,  } from '@heroicons/vue/24/solid'
	import axios from 'axios';
	import { onMounted, ref } from "vue"

	const jobdets = ref([])
	const jobres = ref([])
	const jobskills = ref([])
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
		jobdets.value = response.data.job_dets;
		jobres.value = response.data.job_responsibilities;
		jobskills.value = response.data.job_skills;

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

                            <h3 class="mb-0 leading-tight">{{ jobdets.job_title }}</h3>
                            <p class="mb-2 leading-tight !text-gray-500">{{ jobdets.company_name }}</p>
							<div class="flex justify-start space-x-1 mb-2">
								<!-- <span class="bg-purple-400 rounded-lg px-2 text-sm text-white">asd</span> -->
								<span class="bg-emerald-400 rounded-lg px-2 text-sm text-white">{{ jobdets.job_type }}</span>
								<span class="bg-orange-400 rounded-lg px-2 text-sm text-white">{{ jobdets.workplace }}</span>
							</div>
                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><MapPinIcon class="size-5 text-gray-400" /></span>
                                <span>{{ jobdets.city }}, {{ jobdets.region }}, {{ jobdets.country }}</span>
                            </p>
							<p class="mb-0 flex space-x-3">
                                <span class="pt-1"><BuildingOfficeIcon class="size-5 text-gray-400" /></span>
                                <span>{{ jobdets.industry }}</span>
                            </p>
							<p class="mb-0 flex space-x-3">
                                <span class="pt-1"><BuildingOffice2Icon class="size-5 text-gray-400" /></span>
                                <span>{{ jobdets.employment_category }}</span>
                            </p>
							<!-- <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><ClockIcon class="size-5 text-gray-400" /></span>
                                <span>{{ jobdets.job_type }}</span>
                            </p>
                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><GlobeAsiaAustraliaIcon class="size-5 text-gray-400" /></span>
                                <span>{{ jobdets.workplace }}</span>
                            </p> -->
                            <p class="mb-0 flex space-x-3">
                                <span class="pt-1"><BanknotesIcon class="size-5 text-gray-400" /></span>
                                <span class="flex justify-start space-x-1">
									<div class="flex justify-start space-x-1">
										<span class="font-semibold">{{ jobdets.currency }}</span>
										<span>{{ jobdets.salary_from }}</span>
									</div> 
									<span>-</span>
									<div class="flex justify-start space-x-1">
										<span class="font-semibold">{{ jobdets.currency }}</span>
										<span>{{ jobdets.salary_to }}</span>
									</div>
									<span>{{ jobdets.pay_type }}</span>
								</span>
                            </p>
                            <br>
                            <h5 class="text-lg mb-0 leading-none">Job Description</h5>
                            <p class="text-gray-500 leading-normal"><span v-html="jobdets.job_description"></span></p>
                            <h5 class="text-lg mb-0 leading-none">Job Summary</h5>
                            <p class="text-gray-500 leading-normal"><span v-html="jobdets.job_summary"></span></p>
                            <h5 class="text-lg mb-0 leading-none">Responsibilities</h5>
                            <ul class="text-gray-500 leading-normal">
								<template v-for="jr in jobres">
									<li>{{ jr.responsibility }}</li>
								</template>
                            </ul>
                            <h5 class="text-lg mb-0 leading-none">Requirements</h5>
                            <ul class="text-gray-500 leading-normal">
                                <template v-for="js in jobskills">
									<li>{{ js.skill }}</li>
								</template>
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
                            <p class="text-muted">{{ jobdets.firstname}} {{jobdets.lastname}}</p>
                            <h6 class="mb-0">Posted On</h6>
                            <p class="text-muted">{{ jobdets.start_date}}</p>
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