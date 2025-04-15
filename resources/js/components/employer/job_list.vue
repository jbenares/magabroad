<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
	import $ from 'jquery';
	import 'datatables.net-dt/css/dataTables.dataTables.min.css';
	import 'datatables.net';
	import { onMounted, nextTick, ref, watch } from 'vue';
	import { useRouter } from "vue-router"
	const router = useRouter()
	const get_alljob = ref([])
	onMounted(() => {
		getallJob()
		watch(
			() => get_alljob.value,
			async (val) => {
				if (val.length) {
				await nextTick() // wait for DOM to update
				if ($.fn.DataTable.isDataTable('#jobTable')) {
					$('#jobTable').DataTable().destroy()
				}
				$('#jobTable').DataTable()
				}
			},
			{ immediate: true }
			)
	})

	const getallJob = async () => {
		let response = await axios.get("/api/get_all_job");
		get_alljob.value = response.data.alljobs;
	}

	const OpenJobDetails = (id) => {
		router.push('/employer/job_view/'+id)
	}

	const OpenJobDraft = (id) => {
		router.push('/employer/postjob/'+id)
	}

	const OpenJobPending = (id) => {
		router.push('/employer/postjob_qa/'+id)
	}

	const OpenJobUpdate = (id) => {
		router.push('/employer/update_job/'+id)
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
                <h2 class="mb-2 text-left">Job Listings</h2>
                <div class="table-responsive border rounded-xl">
                    <table id="jobTable" class="table text-base">
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
                            <tr v-for="aj in get_alljob" :key="aj.job_id">
								<td>
								<span class="badge badge-success" v-if="aj.status == 'Active'">{{ aj.status }}</span>
								<span class="badge badge-warning" v-if="aj.status == 'Draft' || aj.status == 'Pending'">{{ aj.status }}</span>
								<span class="badge badge-danger" v-if="aj.status == 'Deactivated'">{{ aj.status }}</span>
								</td>
								<td>{{ aj.job_title }}</td>
								<td>{{ aj.workplace }}</td>
								<td class="text-center"></td>
								<td class="flex justify-center space-x-1">
								<a  @click="OpenJobDraft(aj.job_id)" class="btn btn-sm btn-primary" v-if="aj.status == 'Draft'">View</a>
								<a  @click="OpenJobPending(aj.job_id)" class="btn btn-sm btn-primary" v-if="aj.status == 'Pending'">View</a>
								<a  @click="OpenJobDetails(aj.job_id)" class="btn btn-sm btn-primary" v-if="aj.status == 'Saved'">View</a>
								<a  @click="OpenJobUpdate(aj.job_id)" class="btn btn-sm btn-secondary">Edit</a>
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