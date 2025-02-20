<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
			<div class="overlay"></div>
			<div class="container"></div>
		</div>
	
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8 mb-5">
						<div class="relative p-5 bg-white">
							<div class="absolute top-10 right-10">
							<button @click="toggleEdit" class="btn btn-primary btn-sm !rounded-3xl">{{ isEditing ? 'Cancel' : 'Update' }}</button>
							</div>
							<h4 class="mb-0">Employer Profile</h4>
							<p class="m-0">We won't share your details with anyone.</p>
							<hr>
							<div class="row">
							<div class="col-lg-6 col-md-6 mb-1 leading-none">
								<p class="font-weight-bold mb-1">First Name:</p>
								<input v-if="isEditing" v-model="form.firstName" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.firstName }}</p>
							</div>
							<div class="col-lg-6 col-md-6 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Last Name:</p>
								<input v-if="isEditing" v-model="form.lastName" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.lastName }}</p>
							</div>
							</div>
							<div class="row">
							<div class="col-lg-12 col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Email Address:</p>
								<input v-if="isEditing" v-model="form.email" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.email }}</p>
							</div>
							</div>
							<hr>
							<h3>Business Details</h3>
							<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="text-center mb-4">
								<img src="../../../images/company-1.jpg" alt="Company Logo" class="img-fluid !h-38 rounded-xl" v-if="!isEditing" />
								<input v-if="isEditing" type="file" @change="handleFileUpload" class="form-control mt-3" />
								</div>
							</div>
							<div class="col-lg-8 col-md-8 col-sm-12">
								<div class="row">
								<div class="col-md-12 mb-1 leading-none">
									<p class="font-weight-bold mb-1">Business Name:</p>
									<input v-if="isEditing" v-model="form.businessName" class="form-control mb-2" />
									<p class="py-2" v-else>{{ form.businessName }}</p>
								</div>
								</div>
								<div class="row">
								<div class="col-md-12 mb-1 leading-none">
									<p class="font-weight-bold mb-1">Website Name:</p>
									<input v-if="isEditing" v-model="form.website" class="form-control mb-2" />
									<p class="py-2" v-else>{{ form.website }}</p>
								</div>
								</div>
							</div>
							</div>
							
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Phone Number:</p>
								<input v-if="isEditing" v-model="form.phoneNumber" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.phoneNumber }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Country:</p>
								<input v-if="isEditing" v-model="form.country" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.country }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Industry:</p>
								<input v-if="isEditing" v-model="form.industry" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.industry }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Company Size:</p>
								<input v-if="isEditing" v-model="form.companySize" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.companySize }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Primary Location:</p>
								<input v-if="isEditing" v-model="form.primaryLocation" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.primaryLocation }}</p>
								</div>
							</div>
							<hr>
							<h3>About</h3>
							<textarea v-if="isEditing" v-model="form.about" class="form-control"></textarea>
							<p class="py-2" v-else>{{ form.about }}</p>
							<button v-if="isEditing" @click="saveChanges" class="btn btn-success mt-3 w-44">Save</button>
						</div>
					</div>
					<div class="col-lg-4">
                        <!-- <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Contact Info</h3>
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4"><a href="tel:+12323235324">+1 232 3235 324</a></p>

                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="mailto:info@example.com">info@example.com</a></p>
                        </div> -->

                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur.</p>
                            <p><a href="#" class="btn btn-primary py-2 px-4">Learn More</a></p>
                        </div>
                    </div>
				</div>
			</div>
		</section>
		</navigation>
	</template>
	
	<script setup>
	import { ref } from 'vue';
	import navigation from '@/layouts/navigation_employer.vue';
	
	const isEditing = ref(false);
	const form = ref({
		firstName: 'John',
		lastName: 'Doe',
		email: 'john.doe@example.com',
		businessName: 'Doe Enterprises',
		website: 'www.doeenterprises.com',
		phoneNumber: '+1 905 123 4567',
		country: 'USA',
		industry: 'Technology',
		companySize: '51-200 employees',
		primaryLocation: 'USA, California, San Francisco, 123 Main Street',
		logo: '../../../images/company-1.jpg',
		about: 'Doe Enterprises is a leading tech company specializing in innovative solutions for businesses worldwide.'
	});
	
	const toggleEdit = () => {
		isEditing.value = !isEditing.value;
	};
	
	const handleFileUpload = (event) => {
		const file = event.target.files[0];
		if (file) {
		const reader = new FileReader();
		reader.onload = (e) => {
			form.value.logo = e.target.result;
		};
		reader.readAsDataURL(file);
		}
	};
	
	const saveChanges = () => {
		isEditing.value = false;
		// Here, you can add API call logic to save changes to the backend
	};
	</script>