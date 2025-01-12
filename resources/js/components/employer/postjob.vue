<template>
  <navigation>
      <div class="hero-wrap hero-wrap-2" >
        <div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-end justify-content-start">
					<div class="col-md-12 text-center mb-5" >
					<p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Job Post</span></p>
					<h1 class="mb-3 bread">Post A Job</h1>
				</div>
			</div>
        </div>
      </div>

      <section class="ftco-section bg-light">
        <div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 mb-5">
					<form action="#" class="p-5 bg-white">
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="jobtitle">Job Title</label>
								<input type="text" id="jobtitle" class="form-control" placeholder="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="location">Location</label>
								<input type="text" id="location" class="form-control" placeholder="">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="workplace">Workplace Option</label>
								<select id="workplace" class="form-control" >
									<option value="">On-site</option>
									<option value="">Remote</option>
									<option value="">Hybrid</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="workplace">Work Type</label>
								<label for="fulltime" class="block !mb-0">
									<input type="radio" id="fulltime" class="mr-2" name="worktype">Full-time
								</label>
								<label for="parttime" class="block !mb-0">
									<input type="radio" id="parttime" class="mr-2" name="worktype">Part-time
								</label>
								<label for="contract" class="block !mb-0">
									<input type="radio" id="contract" class="mr-2" name="worktype">Contract
								</label>
								<label for="casual" class="block !mb-0">
									<input type="radio" id="casual" class="mr-2" name="worktype">Casual
								</label>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="workplace">Pay Type</label>
								<label for="hourly" class="block !mb-0">
									<input type="radio" id="hourly" class="mr-2" name="paytype">Hourly Rate
								</label>
								<label for="monthly" class="block !mb-0">
									<input type="radio" id="monthly" class="mr-2" name="paytype">Monthly Salary
								</label>
								<label for="annual" class="block !mb-0">
									<input type="radio" id="annual" class="mr-2" name="paytype">Annual Salary
								</label>
							</div>
						</div>
						<label class="font-weight-bold" for="workplace">Pay Range</label>
						<div class="row form-group">
							<div class="col-md-3 mb-3 mb-md-0 !pr-0">
								<label class="mb-0" for="workplace">Currency</label>
								<select id="workplace" class="form-control" >
									<option value="">Php</option>
								</select>
							</div>
							<div class="col-md-4 mb-4 mb-md-0 !pr-0">
								<label class="mb-0" for="workplace">From</label>
								<input type="text" class="form-control" placeholder="Enter minimum pay">
							</div>
							<div class="col-md-4 mb-4 mb-md-0 !pr-0">
								<label class="mb-0" for="workplace">To</label>
								<input type="text" class="form-control" placeholder="Enter maximum pay">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="jobdesc">Job Description</label>
								<textarea id="jobdesc" class="form-control" placeholder=""></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12 mb-3 mb-md-0">
								<label class="font-weight-bold" for="jobdesc">Job Summary</label>
								<textarea id="jobdesc" class="form-control" placeholder=""></textarea>
							</div>
						</div>
						<br>
						<hr>
						<div class="row form-group">
							<div class="col-md-12">
								<div class="flex justify-between">
									<button class="btn btn-outline-primary py-2 px-5">Preview</button>
									<div class="flex justify-end space-x-1">
										<button class="btn btn-primary  py-2 px-5">Save Draft</button>
										<input type="submit" value="Post Job" class="btn btn-primary  py-2 px-5">
									</div>
								</div>
								
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
					<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
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
</script>