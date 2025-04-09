<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
	import { PlusCircleIcon, XCircleIcon, ListBulletIcon, NumberedListIcon, ItalicIcon, BoldIcon, QuestionMarkCircleIcon} from '@heroicons/vue/24/solid'
	import axios from 'axios';
    import { onMounted, ref , onBeforeUnmount } from "vue"
	import { useRouter } from "vue-router";
	const router = useRouter();
    const questionType = ref('Checkboxes')
	const questions = ref([
		{
			text: '',
			type: 'Checkboxes',
			options: ['Option 1', 'Option 2'],
		},
		])

		const addQuestion = () => {
		questions.value.push({
			text: '',
			type: 'Checkboxes',
			options: ['Option 1', 'Option 2'],
		})
		}

		const removeQuestion = (index) => {
		questions.value.splice(index, 1)
		}

		const addOption = (qIndex) => {
		questions.value[qIndex].options.push(`Option ${questions.value[qIndex].options.length + 1}`)
		}

		const removeOption = (qIndex, optIndex) => {
		questions.value[qIndex].options.splice(optIndex, 1)
		}
</script>
<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3" >
			<div class="overlay"></div>
			<div class="container"></div>
		</div>

		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12  mb-5">
						<div class="p-4 bg-white">
                            <div class="space-y-6">
								<div
								v-for="(question, index) in questions"
								:key="index"
								class="border p-4 rounded-lg bg-white shadow-sm space-y-4"
								>
								<!-- Question Text -->
								<div>
									<input
									v-model="question.text"
									type="text"
									placeholder="Untitled Question"
									class="w-full border border-gray-300 p-2 rounded-md"
									/>
								</div>

								<!-- Options -->
								<div v-if="question.type === 'Checkboxes' || question.type === 'Multiple choice'" class="space-y-2">
									<div
									v-for="(option, optIndex) in question.options"
									:key="optIndex"
									class="flex items-center space-x-2"
									>
									<input
										:type="question.type === 'Checkboxes' ? 'checkbox' : 'radio'"
										disabled
										class="form-checkbox text-indigo-600"
									/>
									<input
										v-model="question.options[optIndex]"
										placeholder="Option"
										class="border border-gray-300 p-1 rounded w-full"
									/>
									<button @click="removeOption(index, optIndex)" class="text-red-500 hover:text-red-700">✕</button>
									</div>
									<button @click="addOption(index)" class="text-blue-600 text-sm mt-2">+ Add option</button>
								</div>

								<!-- Question Type -->
								<div>
									<label class="block text-sm font-medium text-gray-700 mb-1">Question Type</label>
									<select
									v-model="question.type"
									class="block w-full mt-1 p-2 border border-gray-300 rounded-md"
									>
									<option>Checkboxes</option>
									<option>Multiple choice</option>
									<option>Drop-down</option>
									<option>Short answer</option>
									<option>Paragraph</option>
									</select>
								</div>

								<!-- Remove Question -->
								<div class="text-right">
									<button @click="removeQuestion(index)" class="text-red-500 hover:text-red-700 text-sm">
									Remove question
									</button>
								</div>
								</div>

								<!-- Add Question -->
								<div class="text-center">
								<button @click="addQuestion" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
									+ Add Question
								</button>
								</div>
							</div>
						</div>
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