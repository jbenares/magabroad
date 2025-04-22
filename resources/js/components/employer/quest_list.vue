<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
	import { PlusCircleIcon, XCircleIcon, ListBulletIcon, NumberedListIcon, ItalicIcon, BoldIcon, DocumentDuplicateIcon, TrashIcon} from '@heroicons/vue/24/solid'
	import axios from 'axios';
    import { onMounted, ref , onBeforeUnmount } from "vue"
	import { useRouter } from "vue-router";
	const router = useRouter();
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
					<div class="col-md-12 col-lg-8 mb-5">
						<div class="p-4 bg-white">
							<div class="flex justify-between items-center mb-2">
                                <h2 class="text-xl font-bold">List of Questions</h2>
                                <a href="/employer/create_questions" class="bg-indigo-600 text-white px-2 py-1 text-sm rounded hover:bg-indigo-700">
                                + Add Question
                                </a>
                            </div>
							<p class="leading-tight px-1">Select questions that will be included in the final job ad. These questions will create filters for your applications. You can also add more questions.</p>
							<div class="space-y-6">
								<div class="rounded-lg border py-4 px-4">
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500" />
										<span class="font-semibold text-gray-600">What is your favorite color?Why?</span>
									</div>
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500" disabled />
										<span class="text-gray-500">Blue - Anu labot mo</span>
									</div>
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500" disabled />
										<span class="text-gray-500">Green - Anu labot mo</span>
									</div>
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500" disabled />
										<span class="text-gray-500">Blue - Anu labot mo</span>
									</div>
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500" disabled />
										<span class="text-gray-500">Blue - Anu labot mo</span>
									</div>
									<div class="flex items-center space-x-2 mt-2">
										<label class="inline-flex items-center cursor-pointer mt-2">
											<input type="checkbox" class="sr-only peer">
											<div class="w-10 h-5 bg-blue-500 rounded-full peer peer-checked:bg-gray-200 transition duration-300"></div>
											<div class="absolute w-4 h-4 bg-white rounded-full shadow transform translate-x-5 peer-checked:translate-x-1 transition duration-300"></div>
										</label>
										<span class="text-sm text-gray-700">
											Required
										</span>
										
									</div>
								</div>
								<div class="rounded-lg border py-4 px-4">
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500">
										<span class="font-semibold text-gray-600">What is your favorite color?Why?</span>
									</div>
									<div class="flex items-center space-x-2" >
										<input type="radio" class="w-4 " />
										<span class="text-gray-500">asdasd</span>
									</div>
									<div class="flex items-center space-x-2" >
										<input type="radio" class="w-4 " />
										<span class="text-gray-500">asdasd</span>
									</div>
									<div class="flex items-center space-x-2" >
										<input type="radio" class="w-4 " />
										<span class="text-gray-500">asdasd</span>
									</div>
									<div class="flex items-center space-x-2" >
										<input type="radio" class="w-4 " />
										<span class="text-gray-500">asdasd</span>
									</div>
									<div class="flex items-center space-x-2 mt-2">
										<label class="inline-flex items-center cursor-pointer mt-2">
											<input type="checkbox" class="sr-only peer">
											<div class="w-10 h-5 bg-blue-500 rounded-full peer peer-checked:bg-gray-200 transition duration-300"></div>
											<div class="absolute w-4 h-4 bg-white rounded-full shadow transform translate-x-5 peer-checked:translate-x-1 transition duration-300"></div>
										</label>
										<span class="text-sm text-gray-700">
											Required
										</span>
									</div>
								</div>
								<div class="rounded-lg border py-4 px-4">
									<div class="flex justify-start space-x-2">
										<input type="checkbox" class="w-4 accent-blue-500">
										<span class="font-semibold text-gray-600">What is your favorite color?Why?</span>
									</div>
									<div>
										<input type="text" class="form-control">
									</div>
									<div class="flex items-center space-x-2 mt-2">
										<label class="inline-flex items-center cursor-pointer mt-2">
											<input type="checkbox" class="sr-only peer">
											<div class="w-10 h-5 bg-blue-500 rounded-full peer peer-checked:bg-gray-200 transition duration-300"></div>
											<div class="absolute w-4 h-4 bg-white rounded-full shadow transform translate-x-5 peer-checked:translate-x-1 transition duration-300"></div>
										</label>
										<span class="text-sm text-gray-700">
											Required
										</span>
									</div>
								</div>

								<!-- Add Question -->
								<div class="text-center">
									<button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
										Make Default
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