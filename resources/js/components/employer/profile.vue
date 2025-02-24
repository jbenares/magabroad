<script setup>
import navigation from '@/layouts/navigation_employer.vue';
import { PhotoIcon, } from '@heroicons/vue/24/outline'
import { onMounted,ref,watch } from 'vue';
import { useRouter } from "vue-router";

const isEditing = ref(false);
let industrylist=ref([]);
let countrycodelist=ref([]);
let form = ref([]);
let logoFile=ref("");

onMounted(async () => {
	getEmployerData()
	getindustry()
	getcountrycode()
})

const getindustry = async () => {
	let response = await axios.get("/api/industry_list");
	industrylist.value=response.data
}

const getcountrycode = async () => {
	let response = await axios.get("/api/country_code_list");
	countrycodelist.value=response.data
}

const getEmployerData = async () => {
	let response = await axios.get(`/api/employer_data`);
	form.value=response.data.employer
}
const toggleEdit = () => {
	isEditing.value = !isEditing.value;
};

const upload_logo = (event) => {
	let file = event.target.files[0];
	if(event.target.files.length===0){
		logoFile.value='';
		return;
	}else if(file['size'] < 2111775){
		logoFile.value = event.target.files[0];
		error_image.value=''
	}else{
		error_image.value='File size cannot be bigger than 2 MB'
	}

	alert(logoFile.value)
}

const saveChanges = (id) => {
	const formData=new FormData()
	formData.append('business_name',form.value.business_name)
	formData.append('website',form.value.website)
	formData.append('contact_no',form.value.contact_no)
	formData.append('country_code_id',form.value.country_code_id)
	formData.append('industry_id',form.value.industry_id)
	formData.append('company_size',form.value.company_size)
	formData.append('about',form.value.about)
	formData.append('logo',logoFile.value)
	axios.post(`/api/update_employeer/`+id,formData).then(function (response) {
		isEditing.value = false;
	});
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
								<!-- <input v-if="isEditing" v-model="form.firstname" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.firstname }}</p> -->
								<p class="py-2">{{ form.firstname }}</p>
							</div>
							<div class="col-lg-6 col-md-6 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Middle Name:</p>
								<!-- <input v-if="isEditing" v-model="form.middlename" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.middlename }}</p> -->
								<p class="py-2">{{ form.middlename }}</p>
							</div>
							<div class="col-lg-6 col-md-6 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Last Name:</p>
								<!-- <input v-if="isEditing" v-model="form.lastname" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.lastName }}</p> -->
								<p class="py-2">{{ form.lastname }}</p>
							</div>
							</div>
							<div class="row">
							<div class="col-lg-12 col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Email Address:</p>
								<!-- <input v-if="isEditing" v-model="form.email" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.email }}</p> -->
								<p class="py-2">{{ form.email }}</p>
							</div>
							</div>
							<hr>
							<h3>Business Details</h3>
							<div class="row">
							<template v-if="!isEditing">
								<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="text-center mb-4">
									<!-- <img src="../../../images/company-1.jpg" alt="Company Logo" class="img-fluid !h-38 rounded-xl" v-if="!isEditing" /> -->
									<img :src="'/images/'+form.logo" id="logo" v-if="form.logo!=null"/>
									<img :src="'/images/default/default-img.jpg'" id="logo" v-else/>
									</div>
								</div>
							</template>
							<template v-if="isEditing">
								<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="text-center mb-4">
									<!-- <input v-if="isEditing" type="file" @change="handleFileUpload" class="form-control mt-3" /> -->
									<input type="file" accept="image/*" id="logo" @change="upload_logo" class="form-control border my-1">
									</div>
								</div>
							</template>
							<div class="col-lg-8 col-md-8 col-sm-12">
								<div class="row">
								<div class="col-md-12 mb-1 leading-none">
									<p class="font-weight-bold mb-1">Business Name:</p>
									<input v-if="isEditing" v-model="form.business_name" class="form-control mb-2" />
									<p class="py-2" v-else>{{ form.business_name }}</p>
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
								<input v-if="isEditing" v-model="form.contact_no" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.contact_no }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Country:</p>
								<!-- <input v-if="isEditing" v-model="form.country" class="form-control mb-2" /> -->
								<select v-if="isEditing" id="country-code" v-model="form.country_code_id" class="form-control mb-2">
									<option :value="cc.id" v-for="cc in countrycodelist" :key="cc.id">{{ cc.country_name }} ({{ cc.country_code }})</option>
								</select>
								<p class="py-2" v-else>{{ form.country }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Industry:</p>
								<!-- <input v-if="isEditing" v-model="form.industry" class="form-control mb-2" /> -->
								<select class="form-control mb-2" v-if="isEditing" id="industry" v-model="form.industry_id">
									<option :value="i.id" v-for="i in industrylist" :key="i.id">{{ i.industry_name }}</option>
								</select>
								<p class="py-2" v-else>{{ form.industry }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Company Size:</p>
								<input v-if="isEditing" v-model="form.company_size" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.company_size }}</p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1 leading-none">
								<p class="font-weight-bold mb-1">Primary Location:</p>
								<input v-if="isEditing" v-model="form.location" class="form-control mb-2" />
								<p class="py-2" v-else>{{ form.location }}</p>
								</div>
							</div>
							<hr>
							<h3>About</h3>
							<textarea v-if="isEditing" v-model="form.about" class="form-control"></textarea>
							<p class="py-2" v-else>{{ form.about }}</p>
							<button v-if="isEditing" @click="saveChanges(form.employeerid)" class="btn btn-success mt-3 w-44">Save</button>
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