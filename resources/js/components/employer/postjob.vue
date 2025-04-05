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
						<form action="#" class="p-4 bg-white">
							<h3 class="mb-0 leading-tight">Create a Job Post</h3>
							<p class="mb-3 leading-tight !text-gray-500">Classify the role</p>
							<!-- <br> -->
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold leading-none text-gray-500" for="jobtitle">Job Title</label>
									<input type="text" id="jobtitle" class="form-control" placeholder="">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold leading-none text-gray-500" for="location">Location</label>
									<input type="text" id="location" class="form-control" placeholder="">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold leading-none text-gray-500" for="workplace">Workplace Option</label>
									<select id="workplace" class="form-control" >
										<option value="">On-site</option>
										<option value="">Remote</option>
										<option value="">Hybrid</option>
									</select>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold leading-none text-gray-500" for="workplace">Work Type</label>
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
									<label class="font-weight-bold leading-none text-gray-500" for="workplace">Pay Type</label>
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
							<label class="font-weight-bold leading-none text-gray-500" for="workplace">Pay Range</label>
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
									<label class="font-weight-bold leading-none text-gray-500">Job Description</label>
									<div class="toolbar flex gap-0 mb-1 border rounded-md">
										<button type="button" class="py-1 px-2 border-r" @click="jobDescEditor.chain().focus().toggleBold().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('bold') }"><BoldIcon class="size-4"/></button>
										<button type="button" class="py-1 px-2 border-r" @click="jobDescEditor.chain().focus().toggleItalic().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('italic') }"><ItalicIcon class="size-4"/></button>
										<!-- <button type="button" class="py-1 px-2 border-r" @click="console.log('Bullet clicked');jobDescEditor.chain().focus().toggleBulletList().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('bulletList') }"><ListBulletIcon class="size-4"/></button>
										<button type="button" class="py-1 px-2 border-r" @click="jobDescEditor.chain().focus().toggleOrderedList().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('orderedList') }"><NumberedListIcon class="size-4"/></button> -->
									</div>
									<div class="border rounded-md pt-2 pb-10 px-4 bg-white">
										<editor-content :editor="jobDescEditor" class="prose max-w-none focus:outline-none focus:ring-0" />
									</div>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0">
									<label class="font-weight-bold leading-none text-gray-500">Job Summary</label>
									<div class="toolbar flex gap-0 mb-1 border rounded-md">
										<button type="button" class="py-1 px-2 border-r" @click="jobSummaryEditor.chain().focus().toggleBold().run()" :class="{ 'bg-gray-200': jobSummaryEditor.isActive('bold') }"><BoldIcon class="size-4"/></button>
										<button type="button" class="py-1 px-2 border-r" @click="jobSummaryEditor.chain().focus().toggleItalic().run()" :class="{ 'bg-gray-200': jobSummaryEditor.isActive('italic') }"><ItalicIcon class="size-4"/></button>
									</div>
									<div class="border rounded-md pt-2 pb-10 px-4 bg-white">
										<editor-content :editor="jobSummaryEditor" class="prose max-w-none focus:outline-none focus:ring-0" />
									</div>
								</div>
							</div>
							<div class="mb-4">
								<label class="font-bold text-gray-500 mb-2 block">Responsibilities</label>
								<div class="flex items-center border border-gray-400 rounded-md px-3 py-2">
									<input v-model="newResponsibility" @keyup.enter="addResponsibility" type="text" class="flex-grow outline-none text-gray-500" placeholder="Enter a responsibility" />
									<button @click.prevent="addResponsibility()" class="text-blue-500">
										<PlusCircleIcon class="w-6 h-6" />
									</button>
								</div>
								<div v-if="responsibilities.length" class="mt-2">
									<ul class="space-y-1">
										<li v-for="(responsibility, index) in responsibilities" :key="index" class="responsibility-item flex justify-between items-center px-3 py-1">
											<span class="w-5 font-bold text-gray-500">{{ index + 1 }}.</span>
											<div class="flex justify-between items-center border-b w-full">
												<span class="text-gray-500 font-medium ">{{ responsibility }}</span>
												<XCircleIcon @click="removeResponsibility(index)" class="w-5 h-5 text-red-500 cursor-pointer hover:text-red-700"/>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="mb-4">
								<label class="font-bold text-gray-500 mb-2 block">Skills</label>
								<div class="relative">
								<div class="flex items-center border border-gray-400 rounded-md px-3 py-2">
									<input 
									v-model="newSkill" 
									@input="filterSuggestions" 
									@keyup.enter="addSkill" 
									type="text" 
									class="flex-grow outline-none text-gray-500" 
									placeholder="Enter a skill"
									/>
									<button @click.prevent="addSkill()" class="text-blue-500">
									<PlusCircleIcon class="w-6 h-6" />
									</button>
								</div>
								
								<!-- Dropdown suggestions -->
								<div v-if="filteredSuggestions.length" class="absolute top-full left-0 w-full mt-1 bg-white border border-gray-400 rounded-md shadow-lg z-10">
									<div 
									v-for="(suggestion, index) in filteredSuggestions" 
									:key="index" 
									@click="addSkill(suggestion)" 
									class="cursor-pointer p-2 hover:bg-gray-200"
									>
									{{ suggestion }}
									</div>
								</div>
								</div>

								<!-- Selected skills -->
								<div class="mt-3 flex flex-wrap gap-2">
								<span 
									v-for="(skill, index) in skills" 
									:key="index"  
									class="selected-skill bg-blue-500 text-white px-3 py-1 rounded-lg flex items-center"
								>
									{{ skill }}
									<XCircleIcon @click="removeSkill(index)" class="w-4 h-4 ml-2 cursor-pointer hover:text-red-300" />
								</span>
								<div v-if="skillSuggestions.length" class="mt-3 p-2 bg-gray-100 rounded-md">
									<span class="block w-full font-bold px-2 text-sm">Suggested Skill</span>
									<span v-for="(suggestion, index) in skillSuggestions" :key="index" @click="addSkill(suggestion)"class="suggestion-chip cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 px-2 py-1 rounded-md m-1 inline-block" > 
										+ {{ suggestion }} 
									</span>
								</div>
								</div>
							</div>
							<hr>
							<div class="row form-group">
								<div class="col-md-12">
									<div class="flex justify-between">
										<button class="btn btn-outline-primary py-2 px-5">Preview</button>
										<div class="flex justify-end space-x-1">
											<button class="btn !bg-orange-400 text-white py-2 px-5">Save Draft</button>
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
	import { PlusCircleIcon, XCircleIcon, ListBulletIcon, NumberedListIcon, ItalicIcon, BoldIcon} from "@heroicons/vue/24/solid";
	import { ref, onMounted, onBeforeUnmount } from "vue";
	import { Editor, EditorContent } from "@tiptap/vue-3";
	import StarterKit from '@tiptap/starter-kit'
	import Blockquote from '@tiptap/extension-blockquote'
	import BulletList from '@tiptap/extension-bullet-list'
	import OrderedList from '@tiptap/extension-ordered-list'
	import ListItem from '@tiptap/extension-list-item'


	const jobDescEditor = new Editor({
	extensions: [
		StarterKit,
		Blockquote,
		BulletList,
		OrderedList,
		ListItem,
	],
	content: '<p>Type job description here...</p>',
	});

	const jobSummaryEditor = new Editor({
	extensions: [
		StarterKit,
		Blockquote,
		BulletList,
		OrderedList,
		ListItem,
	],
	content: '<p>Type job description here...</p>',
	});
	// const jobDescEditor = ref(null);
	// const jobSummaryEditor = ref(null);

	// onMounted(() => {
	// 	jobDescEditor.value = new Editor({
	// 		extensions: [
	// 			StarterKit,
	// 			Blockquote,
	// 			BulletList,
	// 			OrderedList,
	// 			ListItem,
	// 		],
	// 		content: "<p>Type job description here...</p>",
	// 	});

	// 	jobSummaryEditor.value = new Editor({
	// 		extensions: [
	// 			StarterKit,
	// 			Blockquote,
	// 			BulletList,
	// 			OrderedList,
	// 			ListItem,
	// 		],
	// 		content: "<p>Type job summary here...</p>",
	// 	});
	// });

	// onBeforeUnmount(() => {
	// jobDescEditor.value.destroy();
	// jobSummaryEditor.value.destroy();
	// });

	// Reactive variables
	const newSkill = ref("");
	const skills = ref([]);
	const skillSuggestions = ref([
	"Educational Leadership",
	"User Interface",
	"User Experience",
	"Organizational Leadership",
	"Leadership Development",
	"Innovation Leadership",
	"Information Security",
	"Design Leadership",
	"Strategic Leadership",
	"Computer Security"
	]);
	const filteredSuggestions = ref([]);

	// Add skill function
	const addSkill = (skill) => {
	if (!skill) skill = newSkill.value; // Use input value if no argument is provided
	if (skill && !skills.value.includes(skill)) {
		skills.value.push(skill);
		newSkill.value = "";
		filteredSuggestions.value = [];
	}
	};

	// Remove skill function
	const removeSkill = (index) => {
	skills.value.splice(index, 1);
	};

	// Filter suggestions based on input
	const filterSuggestions = () => {
	if (!newSkill.value) {
		filteredSuggestions.value = [];
		return;
	}
	filteredSuggestions.value = skillSuggestions.value.filter(suggestion =>
		suggestion.toLowerCase().includes(newSkill.value.toLowerCase())
	);
	};

	onMounted(() => {
	// Code to run on mount if needed
	});

	onBeforeUnmount(() => {
	// Cleanup if necessary before the component is destroyed
	});

	// Reactive variables
	const newResponsibility = ref("");
	const responsibilities = ref([]);

	// Add responsibility function
	const addResponsibility = () => {
	if (newResponsibility.value.trim() && !responsibilities.value.includes(newResponsibility.value)) {
		responsibilities.value.push(newResponsibility.value.trim());
		newResponsibility.value = "";
	}
	};

	// Remove responsibility function
	const removeResponsibility = (index) => {
	responsibilities.value.splice(index, 1);
	};
</script>