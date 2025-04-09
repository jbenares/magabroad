<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
	import { PlusCircleIcon, XCircleIcon, ListBulletIcon, NumberedListIcon, ItalicIcon, BoldIcon, DocumentDuplicateIcon, TrashIcon} from '@heroicons/vue/24/solid'
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
				range: {
					min: 1,
					max: 5,
				},
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

		const duplicateQuestion = (index) => {
			const questionToDuplicate = { ...questions.value[index] }; // Create a copy of the question
			questions.value.splice(index + 1, 0, questionToDuplicate); // Insert the copy after the original
		};

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
					<div class="col-lg-10 offset-lg-1  mb-5">
						<div class="bg-white p-4">
							<h2 class="mb-1 leading-none">Questionnaire</h2>
							<p class="leading-tight px-1">Create some questions to learn more about the job seeker, gather specific insights, and assess qualifications more effectively. These questions will be added after you create a job ad. </p>
							<div class="space-y-6">
								<div v-for="(question, index) in questions" :key="index" class="rounded-lg bg-white border space-y-4" >
									<div class="p-4 border-b">
										<div class="flex justify-between space-x-2">
										<!-- Question Text -->
											<div class="w-full">
												<label class="block text-sm font-medium text-gray-700 mb-1">Question #{{ index + 1 }}</label>
												<input v-model="question.text" type="text" placeholder="e.g. What's your monthly basic salary?" class="form-control" />
											</div>
											<!-- Question Type -->
											<div class="w-60">
												<label class="block text-sm font-medium text-gray-700 mb-1">Question Type</label>
												<select v-model="question.type" class="form-control" >
													<option>Checkboxes</option>
													<option>Multiple choice</option>
													<option>Drop-down</option>
													<option>Short answer</option>
													<option>Paragraph</option>
													<option>Range</option>
													<option>Number</option>
													<option>Time</option>
													<option>Date</option>
												</select>
											</div>
										</div>
										<!-- Options -->
										<div v-if="question.type === 'Checkboxes' || question.type === 'Multiple choice'" class="space-y-2 mt-3">
											<div v-for="(option, optIndex) in question.options" :key="optIndex" class="flex items-center space-x-2" >
												<input :type="question.type === 'Checkboxes' ? 'checkbox' : 'radio'" disabled class="form-checkbox text-indigo-600" />
												<input v-model="question.options[optIndex]" placeholder="Option" class="border border-gray-300 p-1 rounded w-full" />
												<button @click="removeOption(index, optIndex)" class="text-red-500 hover:text-red-700">✕</button>
											</div>
											<button @click="addOption(index)" class="text-blue-600 text-base mt-2">+ Add option</button>
										</div>

										<div v-if="question.type === 'Drop-down'" class="space-y-2 mt-3">
											<div v-for="(option, optIndex) in question.options" :key="optIndex" class="flex items-center space-x-2">
												<span class="w-3 h-3 rounded-full bg-gray-400 mt-1">{{ optIndex + 1 }}</span>
												<input v-model="question.options[optIndex]" placeholder="Dropdown option" class="border border-gray-300 p-1 rounded w-full" />
												<button @click="removeOption(index, optIndex)" class="text-red-500 hover:text-red-700">✕</button>
											</div>
											<button @click="addOption(index)" class="text-blue-600 text-base mt-2">+ Add option</button>
										</div>

										<!-- Input for Short Answer -->
										<div v-if="question.type === 'Short answer'" class="mt-3">
											<input type="text" placeholder="Short answer text" class="form-control text-gray-500" />
										</div>

										<!-- Textarea for Paragraph -->
										<div v-if="question.type === 'Paragraph'" class="mt-3">
											<textarea placeholder="Long answer text" class="form-control text-gray-500 h-24 resize-none"></textarea>
										</div>
										<!-- Textarea for Paragraph -->
										 
										<div v-if="question.type === 'Range'" class="mt-3 space-y-3">
											<div class="flex items-center space-x-3">
												<div class="form-group">
													<label class="text-sm text-gray-700">Min</label>
													<input  type="number" min="0" class="w-20 form-control" />
												</div>
												<div class="form-group">
													<label class="text-sm text-gray-700">Max</label>
													<input  type="number" min="1" class="w-20 form-control" />
												</div>
											</div>
										</div>

										<div v-if="question.type === 'Number'" class="mt-3">
											<input type="number" placeholder="0" class="form-control text-gray-500" />
										</div>

										<div v-if="question.type === 'Time'" class="mt-3">
											<input type="time" placeholder="0" class="form-control text-gray-500" />
										</div>

										<div v-if="question.type === 'Date'" class="mt-3">
											<input type="date" placeholder="0" class="form-control text-gray-500" />
										</div>
									</div>
										
									<div class="px-4 py-3 m-0 ">
										<!-- Remove Question -->
										<div class="flex justify-end space-x-2">
											<button @click="duplicateQuestion(index)" class="text-gray-400 hover:text-gray-500 text-sm" title="Duplicate Question">
												<DocumentDuplicateIcon class="size-5"></DocumentDuplicateIcon>
											</button>
											<button @click="removeQuestion(index)" class="text-gray-400 hover:text-gray-500 text-sm" title="Delete Question">
												<TrashIcon class="size-5"></TrashIcon>
											</button>
											<div class="border-r"></div>
											<div class="flex space-x-1 border-l"> 
												<span class="text-sm">Required</span>
												<input type="checkbox">
											</div>
										</div>
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