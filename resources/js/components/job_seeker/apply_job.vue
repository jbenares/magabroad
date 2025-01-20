<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3" >
		    <div class="overlay"></div>
			<div class="container"></div>
		</div>
  
		<section class="ftco-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                        <form action="#" class="p-5 bg-white rounded-lg">
                            <div class="job-application-card w-full">
                                <div class="job-header">
                                    <img src="../../../images/company-1.jpg" alt="Company Logo" class="job-logo">
                                    <div class="job-info">
                                        <p class="job-title mb-1 text-sm ">Applying for</p>
                                        <h3 class="job-position font-semibold mb-0 leading-tight">Web and Graphic Designer</h3>
                                        <p class="job-company leading-none">Security Bank Corporation</p>
                                        <a href="/job_seeker/view_job" class="job-link">View job description</a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="border-dashed border-gray-200">

                            <div class="relative bg-gradient-to-r from-blue-400 to-blue-600 w-full rounded-2xl p-3 px-5 mb-4 ">
                                <div class="absolute top-6 right-7 ">
                                    <div class="flex justify-between space-x-3" >
                                        <button class="text-gray-300">
                                            <PencilSquareIcon class="size-5"/> 
                                        </button>
                                    </div>
                                </div>
                                <h2 class="text-white font-semibold mb-0 leading">Jonah Faye Benares </h2>
                                <p class="mb-0 flex space-x-3">
                                    <span class="pt-1"><MapPinIcon class="size-5 text-white" /></span>
                                    <span class="text-white">Bacolod City Negros Occidental</span>
                                </p>
                                <p class="mb-0 flex space-x-3">
                                    <span class="pt-1"><PhoneIcon class="size-5 text-white" /></span>
                                    <span class="text-white">+63 9695373908</span>
                                </p>
                                <p class="mb-0 flex space-x-3">
                                    <span class="pt-1"><EnvelopeIcon class="size-5 text-white" /></span>
                                    <span class="text-white">sample.email@gmail.com</span>
                                </p>
                            </div>

                            <!-- Resume Upload -->
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="resume">Upload Resume</label>
                                    <input type="file" id="resume" class="form-control-file">
                                </div>
                            </div>

                            <hr>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="resume">Upload Cover Letter</label>
                                    <input type="file" id="resume" class="form-control-file">
                                </div>
                            </div>
                            
                            <hr>
                            <!-- <div class="flex justify-start space-x-1 text-blue-500">
                                <InformationCircleIcon class="size-5"/>
                                <p class="text-sm">  Your MagAbroad Profile is part of your application. Make sure it's up-to-date.</p>
                            </div>
                            
                            <div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold" for="jobdesc">Requirements</label>
									<div class="flex justify-start">
										<input type="text" class="form-control">
										<button class="btn !text-blue-500"> <PlusCircleIcon class="size-6"/></button>
									</div>
									<div class="flex justify-start mt-1">
										<input type="text" class="form-control">
										<button class="btn !text-red-500"> <XCircleIcon class="size-6"/></button>
									</div>
									<div class="flex justify-start mt-1">
										<input type="text" class="form-control">
										<button class="btn !text-red-500"> <XCircleIcon class="size-6"/></button>
									</div>
									<div class="flex justify-start mt-1">
										<input type="text" class="form-control">
										<button class="btn !text-red-500"> <XCircleIcon class="size-6"/></button>
									</div>
								</div>
							</div> -->
                            
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Submit Application" class="btn btn-primary py-2 px-5">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-4">
                        <!-- <div class="p-4 mb-3 bg-white rounded-lg">
                            <h3 class="h5 text-black mb-3">Contact Info</h3>
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="#"><span class="" data-cfemail="">[email&#160;protected]</span></a></p>
                        </div> -->

                        <div class="p-4 mb-3 bg-white rounded-lg">
                            <h3 class="h5 text-black mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                            <p><a href="#" class="btn btn-primary py-2 px-4">Learn More</a></p>
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
    import { MapPinIcon, EnvelopeIcon, PhoneIcon, PlusCircleIcon, XCircleIcon } from '@heroicons/vue/24/solid'
    import { PencilSquareIcon, InformationCircleIcon } from '@heroicons/vue/24/outline'
</script>