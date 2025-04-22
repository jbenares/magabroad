<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
	import { PlusCircleIcon, XCircleIcon, ListBulletIcon, NumberedListIcon, ItalicIcon, BoldIcon, QuestionMarkCircleIcon, IdentificationIcon} from '@heroicons/vue/24/solid'
	import axios from 'axios';
	import { onMounted, ref , onBeforeUnmount, watch } from "vue"
	import { useRouter } from "vue-router";
	const router = useRouter();

	let job_dets=ref([]);
	let jobid=ref(0);
	let categorylist=ref([]);
	let industrylist=ref([]);
	let countrylist=ref([]);
	let allregions=ref([]);
	let regionlist=ref([]);
	let allcities=ref([]);
	let citylist=ref([]);
	let jobtypelist=ref([]);
	let currencylist=ref([]);
	let responsibility_list=ref([]);
	let skill_list=ref([]);
	let responsibility=ref('');
	let newSkill=ref('');
	const filteredSuggestions = ref([]);
	const skillSuggestions = ref([]);

	let jobtitle_message=ref('');
	let industry_message=ref('');
	let work_cat_message=ref('');
	let country_message=ref('');
	let region_message=ref('');
	let city_message=ref('');
	let workplace_message=ref('');
	let jobtype_message=ref('');
	let paytype_message=ref('');
	let currency_message=ref('');
	let salary_from_message=ref('');
	let salary_to_message=ref('');
	let job_desc_message=ref('');
	let job_sum_message=ref('');
	let start_date_message=ref('');
	let end_date_message=ref('');

	const props = defineProps({
		id:{
			type:String,
			default:''
		}
	})
	

	onMounted(async () => {
		JobDetails()
		if(props.id != 0 || jobid.value != 0){
			JobDraft()
		}
		getcategory()
		getindustry()
		getcity()
		getregion()
		getcountry()
		getjobtype()
		getcurrency()
		getskill()
	})

	const JobDetails = async () => {
			let response = await axios.get("/api/create_job");
			job_dets.value = response.data;
	}

	const JobDraft = async (jobid) => {
		if(props.id!=0){
			let response = await axios.get("/api/job_details_draft/"+props.id);
			job_dets.value = response.data.job_dets;
			responsibility_list.value = response.data.job_responsibilities;
			skill_list.value = response.data.job_skills;
		}else if(jobid !=0){
			let response = await axios.get("/api/job_details_draft/"+jobid);
			job_dets.value = response.data.job_dets;
			responsibility_list.value = response.data.job_responsibilities;
			skill_list.value = response.data.job_skills;
		}
	}

	const getcategory = async () => {
		let response = await axios.get("/api/category_list");
		categorylist.value=response.data
	}

	const getindustry = async () => {
		let response = await axios.get("/api/industry_list");
		industrylist.value=response.data
	}

	const getcountry = async () => {
		let response = await axios.get("/api/country_list");
		countrylist.value=response.data
	}

	const getregion = async () => {
		let response = await axios.get("/api/region_list");
		allregions.value=response.data
	}

	const loadRegions = (message) => {
		const selectedOption = event.target.options[event.target.selectedIndex];
		const countryid = selectedOption.getAttribute('data-id');
		document.getElementById("regions").disabled = false;
		regionlist.value = allregions.value.filter(
			(r) => String(r.country_id) === countryid
		);

		if (message) {
			resetmessage(message);
		}
	}

	const getcity = async () => {
		let response = await axios.get("/api/city_list");
		allcities.value=response.data
	}

	const loadCities = (message) => {
		const selectedOption = event.target.options[event.target.selectedIndex];
		const regionid = selectedOption.getAttribute('data-id');
		document.getElementById("cities").disabled = false;
		citylist.value = allcities.value.filter(
			(c) => String(c.region_id) === regionid
		);

		if (message) {
			resetmessage(message);
		}
	}

	const getjobtype = async () => {
		let response = await axios.get("/api/job_type_list");
		jobtypelist.value=response.data
	}

	const getcurrency = async () => {
		let response = await axios.get("/api/currency_list");
		currencylist.value=response.data
	}

	const getskill = async () => {
		let response = await axios.get("/api/skill_list");
		filteredSuggestions.value=response.data.skill_list
		skillSuggestions.value=response.data.skillSuggestions
	}

	const addResponsibility= () => {
		if(responsibility.value!=''){
			const respo = {
				responsibility:responsibility.value,
			}
			responsibility_list.value.push(respo)
			responsibility.value='';
			document.getElementById('check_responsibility').placeholder=""
			document.getElementById('check_responsibility').style.backgroundColor = '#FEFCE8';
		}else{
			document.getElementById('check_responsibility').placeholder="Please fill in Responsibility."
			document.getElementById('check_responsibility').style.backgroundColor = '#FAA0A0';
		}
	}

	const removeResponsibility = (index,id) => {
		if(!id){
			responsibility_list.value.splice(index,1)
		}else{
			axios.get(`/api/delete_responsibility/`+id).then(function () {
				JobDraft()
			});
		}
	}

	// Add skill function
	const addSkill = (skill) => {
		if (!skill) skill = newSkill.value;
		if (typeof skill === 'object') skill = skill.skill; // <-- get .skill
		if (skill && !skill_list.value.some(s => s.skill === skill)) {
			skill_list.value.push({ skill });
			newSkill.value = "";
			filteredSuggestions.value = [];
		}
	};

	const filterSuggestions = () => {
		if (!newSkill.value) {
			filteredSuggestions.value = [];
			return;
		}
		filteredSuggestions.value = skillSuggestions.value.filter(suggestion =>
			suggestion.skill.toLowerCase().includes(newSkill.value.toLowerCase())
		);
	};

	const removeSkill = (index,id) => {
		if(!id){
			skill_list.value.splice(index, 1);
		}else{
			axios.get(`/api/delete_skill/`+id).then(function () {
				JobDraft()
			});
		}
	}

	const isNumber = (evt)=> {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode == 46) {
			//Check if the text already contains the . character
			if (evt.target.value.indexOf('.') === -1) {
				return true;
			} else {
				evt.preventDefault();
			}
		} else {
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				evt.preventDefault();
		}
		return true;
	}

	const ProceedJob = (status) => {
		const formData= new FormData()
		if(props.id != 0){
			var job_id = props.id
		}else{
			var job_id = jobid.value
		}
		formData.append('jobid', job_id)
		formData.append('job_title', job_dets.value.job_title)
		formData.append('industry', job_dets.value.industry)
		formData.append('employment_category', job_dets.value.employment_category)
		formData.append('city', job_dets.value.city)
		formData.append('region', job_dets.value.region)
		formData.append('country', job_dets.value.country)
		formData.append('workplace', job_dets.value.workplace)
		formData.append('job_type', job_dets.value.job_type)
		formData.append('pay_type', job_dets.value.pay_type)
		formData.append('currency', job_dets.value.currency)
		formData.append('job_description', jobDescEditor.getHTML())
		formData.append('job_summary', jobSummaryEditor.getHTML())
		formData.append('salary_from', job_dets.value.salary_from)
		formData.append('salary_to', job_dets.value.salary_to)
		formData.append('confidential', job_dets.value.confidential ? '1' : '0') // Add confidential checkbox state
		formData.append('start_date', job_dets.value.start_date)
		formData.append('end_date', job_dets.value.end_date)
		formData.append('responsibilities', JSON.stringify(responsibility_list.value))
		formData.append('skills', JSON.stringify(skill_list.value))
		formData.append('status', status)
			if(job_dets.value.job_title==''){
				jobtitle_message.value = 'Job Title is required!'
			}else if(job_dets.value.industry==''){
				industry_message.value = 'Industry is required!'
			}else if(job_dets.value.employment_category==''){
				work_cat_message.value = 'Work Category is required!'
			}else if(job_dets.value.country==''){
				country_message.value = 'Country is required!'
			}else if(job_dets.value.region==''){
				region_message.value = 'Region is required!'
			}else if(job_dets.value.city==''){
				city_message.value = 'City is required!'
			}else if(job_dets.value.workplace==''){
				workplace_message.value = 'Wokr Place is required!'
			}else if(job_dets.value.job_type==''){
				jobtype_message.value = 'Job Type is required!'
			}else if(job_dets.value.pay_type==''){
				paytype_message.value = 'Pay Type is required!'
			}else if(job_dets.value.confidential==true){
				if(job_dets.value.currency==''){
					currency_message.value = 'Currency is required!'
				}else if(job_dets.value.salary_from==''){
					salary_from_message.value = 'Salary From is required!'
				}else if(job_dets.value.salary_to==''){
					salary_to_message.value = 'Salary To is required!'
				}
			}else if(jobDescEditor.getHTML()==''){
				job_desc_message.value = 'Job Description is required!'	
			}else if( jobDescEditor.getHTML()==''){
				job_sum_message.value = 'Job Summary is required!'	
			}else if(job_dets.value.start_date==''){
				start_date_message.value = 'Start Date is required!'	
			}else if(job_dets.value.start_to==''){
				end_date_message.value = 'End Date is required!'	
			}else{
			axios.post("/api/add_new_job", formData).then(function (response) {
				if(status==='Draft'){
					jobid.value = response.data;
					JobDraft(response.data)
				}else{
					router.push('/employer/postjob_qa/'+response.data)
				}
			});
		}
	}

	const resetmessage = (button) => {
		if(button==='jobtitle'){
			jobtitle_message.value = '';
		}
		if(button==='industry'){
			industry_message.value = '';
		}
		if(button==='work_cat'){
			work_cat_message.value = '';
		}
		if(button==='country'){
			country_message.value = '';
		}
		if(button==='region'){
			region_message.value = '';
		}
		if(button==='city'){
			city_message.value = '';
		}
		if(button==='workplace'){
			workplace_message.value = '';
		}
		if(button==='jobtype'){
			jobtype_message.value = '';
		}
		if(button==='paytype'){
			paytype_message.value = '';
		}
		if(button==='currency'){
			currency_message.value = '';
		}
		if(button==='salary_from'){
			salary_from_message.value = '';
		}
		if(button==='salary_to'){
			salary_to_message.value = '';
		}
		if(button==='job_desc'){
			job_desc_message.value = '';
		}
		if(button==='job_sum'){
			job_sum_message.value = '';
		}
		if(button==='start_date'){
			start_date_message.value = '';
		}
		if(button==='end_date'){
			end_date_message.value = '';
		}
	}


	import { Editor, EditorContent } from "@tiptap/vue-3";
	import StarterKit from '@tiptap/starter-kit'
	import Blockquote from '@tiptap/extension-blockquote'
	import BulletList from '@tiptap/extension-bullet-list'
	import OrderedList from '@tiptap/extension-ordered-list'
	import ListItem from '@tiptap/extension-list-item'
	import { VariableIcon } from '@heroicons/vue/16/solid';
	
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
						<form action="#" class="p-4 bg-white">
							<h3 class="mb-0 leading-tight">Create a Job Post</h3>
							<p class="mb-3 leading-tight !text-gray-500">Classify the role</p>
							<!-- <br> -->
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="jobtitle">Job Title</label>
									<input type="text" id="jobtitle" class="form-control " placeholder="" v-model="job_dets.job_title" @click="resetmessage('jobtitle')">
									<span v-if="jobtitle_message" class="text-red-500 text-sm m-0">{{ jobtitle_message }}</span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="workplace">Industry</label>
									<select class="form-control" v-model="job_dets.industry" @click="resetmessage('industry')">
										<option :value="i.industry_name" v-for="i in industrylist" :key="i.industry_name">{{ i.industry_name }}</option>
									</select>
									<span v-if="industry_message" class="text-red-500 text-sm m-0">{{ industry_message }}</span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="workplace">Work Category</label>
									<select class="form-control" v-model="job_dets.employment_category" @click="resetmessage('work_cat')">
										<option :value="c.category_name" v-for="c in categorylist" :key="c.category_name">{{ c.category_name }}</option>
									</select>
									<span v-if="work_cat_message" class="text-red-500 text-sm m-0">{{ work_cat_message }}</span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="workplace">Country</label>
									<select class="form-control" v-model="job_dets.country" @change="loadRegions('country')">
										<option :value="cyl.country_name" v-for="cyl in countrylist" :key="cyl.id" :data-id="cyl.id">{{ cyl.country_name }}</option>
									</select>
									<span v-if="country_message" class="text-red-500 text-sm m-0">{{ country_message }}</span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-6 col-sm-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="workplace">Region</label>
									<select class="form-control" id="regions" v-model="job_dets.region" @change="loadCities('region')" disabled>
										<option :value="rl.region_name" v-for="rl in regionlist" :key="rl.id" :data-id="rl.id">{{ rl.region_name }}</option>
									</select>
									<span v-if="region_message" class="text-red-500 text-sm m-0">{{ region_message }}</span>
								</div>
								<div class="col-md-6 col-sm-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="workplace">City</label>
									<select class="form-control" id="cities" v-model="job_dets.city" disabled @click="resetmessage('city')">
										<option :value="cl.city_name" v-for="cl in citylist" :key="cl.city_name">{{ cl.city_name }}</option>
									</select>
									<span v-if="city_message" class="text-red-500 text-sm m-0">{{ city_message }}</span>
								</div>
							</div>
							
							
							<div class="row form-group">
								<div class="col-md-6 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="workplace">Workplace Option</label>
									<select id="workplace" class="form-control" v-model="job_dets.workplace" @click="resetmessage('workplace')">
										<option value="On-site">On-site</option>
										<option value="Remote">Remote</option>
										<option value="Hybrid">Hybrid</option>
									</select>
									<span v-if="workplace_message" class="text-red-500 text-sm m-0">{{ workplace_message }}</span>
								</div>
								<div class="col-md-6 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500">Job Type</label>
									<select class="form-control" v-model="job_dets.job_type" @click="resetmessage('jobtype')">
										<option :value="jtl.name" v-for="jtl in jobtypelist" :key="jtl.name">{{ jtl.name }}</option>
									</select>
									<span v-if="jobtype_message" class="text-red-500 text-sm m-0">{{ jobtype_message }}</span>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold text-gray-500" for="paytype" >Pay Type</label>
									<select id="paytype" class="form-control" v-model="job_dets.pay_type" @click="resetmessage('paytype')">
										<option value="Hourly Rate">Daily Rate</option>
										<option value="Hourly Rate">Hourly Rate</option>
										<option value="Monthly Salary">Monthly Salary</option>
										<option value="Annual Salary">Annual Salary</option>
									</select>
									<span v-if="paytype_message" class="text-red-500 text-sm m-0">{{ paytype_message }}</span>
								</div>
							</div>
							<div class="flex justify-start space-x-1 leading-none">
								<label class="font-weight-bold text-gray-500 mb-0" for="workplace">Pay Range</label>
								<div class="form-check pl-1">
									<label class="form-check-label" for="confidentialCheck">
										Confidential
									</label>
									<input class="form-check-input w-4 h-4 m-0 -right-5" type="checkbox" v-model="job_dets.confidential" id="confidentialCheck">
								</div>
							</div>
							
							<div class="row form-group" v-if="!job_dets.confidential">
								<div class="col-md-4 mb-3 mb-md-0">
									<label class="mb-0" for="workplace">Currency</label>
									<select class="form-control" v-model="job_dets.currency" @click="resetmessage('currency')">
										<option :value="c.code" v-for="c in currencylist" :key="c.code">{{ c.code }}</option>
									</select>
									<span v-if="currency_message" class="text-red-500 text-sm m-0">{{ currency_message }}</span>
								</div>
								<div class="col-md-4 mb-4 mb-md-0">
									<label class="mb-0" for="workplace">From</label>
									<input type="text" class="form-control" placeholder="Enter minimum pay" v-model="job_dets.salary_from" @keypress="isNumber($event)" @click="resetmessage('salary_from')">
									<span v-if="salary_from_message" class="text-red-500 text-sm m-0">{{ salary_from_message }}</span>
								</div>
								<div class="col-md-4 mb-4 mb-md-0">
									<label class="mb-0" for="workplace">To</label>
									<input type="text" class="form-control" placeholder="Enter maximum pay"  v-model="job_dets.salary_to" @keypress="isNumber($event)" @click="resetmessage('salary_to')">
									<span v-if="salary_to_message" class="text-red-500 text-sm m-0">{{ salary_to_message }}</span>
								</div>
							</div>
							
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold leading-none text-gray-500">Job Description</label>
									<div class="toolbar flex gap-0 mb-1 border rounded-md">
										<button type="button" class="py-1 px-2 border-r" @click="jobDescEditor.chain().focus().toggleBold().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('bold') }"><BoldIcon class="size-4"/></button>
										<button type="button" class="py-1 px-2 border-r" @click="jobDescEditor.chain().focus().toggleItalic().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('italic') }"><ItalicIcon class="size-4"/></button>
										<!-- <button type="button" class="py-1 px-2 border-r" @click="console.log('Bullet clicked');jobDescEditor.chain().focus().toggleBulletList().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('bulletList') }"><ListBulletIcon class="size-4"/></button>
										<button type="button" class="py-1 px-2 border-r" @click="jobDescEditor.chain().focus().toggleOrderedList().run()" :class="{ 'bg-gray-200': jobDescEditor.isActive('orderedList') }"><NumberedListIcon class="size-4"/></button> -->
									</div>
									<div class="border rounded-md pt-2 pb-10 px-4 bg-white">
										<editor-content :editor="jobDescEditor" class="prose max-w-none focus:outline-none focus:ring-0" v-model="job_dets.job_description" @click="resetmessage('job_desc')"/>
										<span v-if="job_desc_message" class="text-red-500 text-sm m-0">{{ job_desc_message }}</span>
									</div>
								</div>
							</div>
							<div class="row form-group">
								<div class="col-md-12 mb-3 mb-md-0 leading-none">
									<label class="font-weight-bold leading-none text-gray-500">Job Summary</label>
									<div class="toolbar flex gap-0 mb-1 border rounded-md">
										<button type="button" class="py-1 px-2 border-r" @click="jobSummaryEditor.chain().focus().toggleBold().run()" :class="{ 'bg-gray-200': jobSummaryEditor.isActive('bold') }"><BoldIcon class="size-4"/></button>
										<button type="button" class="py-1 px-2 border-r" @click="jobSummaryEditor.chain().focus().toggleItalic().run()" :class="{ 'bg-gray-200': jobSummaryEditor.isActive('italic') }"><ItalicIcon class="size-4"/></button>
									</div>
									<div class="border rounded-md pt-2 pb-10 px-4 bg-white">
										<editor-content :editor="jobSummaryEditor" class="prose max-w-none focus:outline-none focus:ring-0" v-model="job_dets.job_summary" @click="resetmessage('job_sum')"/>
										<span v-if="job_sum_message" class="text-red-500 text-sm m-0">{{ job_sum_message }}</span>
									</div>
								</div>
							</div>
							<div class="mb-4">
								<label class="font-bold text-gray-500 mb-2 block">Responsibilities</label>
								<div class="flex items-center border border-gray-400 rounded-md px-3 py-2">
									<input v-model="responsibility" type="text" class="flex-grow outline-none text-gray-500" placeholder="Enter a responsibility" id="check_responsibility">
									<button @click.prevent="addResponsibility()" class="text-blue-500">
										<PlusCircleIcon class="w-6 h-6" />
									</button>
								</div>
								<div v-if="responsibility_list.length" class="mt-2">
									<ul class="space-y-1">
										<li v-for="(res, index) in responsibility_list" :key="index" class="responsibility-item flex justify-between items-center px-3 py-1">
											<span class="w-5 font-bold text-gray-500">{{ index + 1 }}.</span>
											<div class="flex justify-between items-center border-b w-full">
												<span class="text-gray-500 font-medium ">{{ res.responsibility }}{{ res.id }}</span>
												<XCircleIcon @click="removeResponsibility(index, res.id)" class="w-5 h-5 text-red-500 cursor-pointer hover:text-red-700"/>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="mb-4">
								<label class="font-bold text-gray-500 mb-2 block">Skills</label>
								<div class="relative">
									<div class="flex items-center border border-gray-400 rounded-md px-3 py-2">
										<input  v-model="newSkill"  @input="filterSuggestions" @keyup.enter="addSkill" type="text" class="flex-grow outline-none text-gray-500" placeholder="Enter a skill" />
										<button @click.prevent="addSkill()" class="text-blue-500">
										<PlusCircleIcon class="w-6 h-6" />
										</button>
									</div>
									
									<div v-if="filteredSuggestions.length && newSkill.length" class="absolute top-full left-0 w-full mt-1 bg-white border border-gray-400 rounded-md shadow-lg z-10">
										<div  v-for="(sug, index) in filteredSuggestions"  :key="index"  @click="addSkill(sug.skill)" class="cursor-pointer p-2 hover:bg-gray-200" >
											{{ sug.skill }}
											</div>
										</div>
									</div>

									<div class="mt-3 flex flex-wrap gap-2">
									<span v-for="(s, index) in skill_list"  :key="index" class="selected-skill bg-blue-500 text-white px-3 py-1 rounded-lg flex items-center">
										{{ s.skill }}
										<XCircleIcon @click="removeSkill(index, s.id)" class="w-4 h-4 ml-2 cursor-pointer hover:text-red-300"/>
									</span>
									<div v-if="skillSuggestions.length" class="mt-3 p-2 bg-gray-100 rounded-md">
										<span class="block w-full font-bold px-2 text-sm">Suggested Skill</span>
										<span v-for="(sug, index) in skillSuggestions" :key="index" @click="addSkill(sug.skill)" class="suggestion-chip cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 px-2 py-1 rounded-md m-1 inline-block" > 
											+ {{ sug.skill }} 
										</span>
									</div>
								</div>
							</div>
							<!-- <div class="row">
								<div class="col-lg-12">
									<div class="bg-blue-50 !border border-blue-200 px-4 py-3 rounded-lg mb-2">
										<div class="flex justify-start space-x-1 text-blue-500 font-bold">
											<QuestionMarkCircleIcon class="size-6" />
											<span class="">Information</span>
										</div>
										<div class="text-base leading-tight text-blue-500">is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
									</div>
								</div>
							</div> -->
							<div class="row form-group">
								<div class="col-md-6 mb-3 mb-md-0">
									<label class="font-weight-bold text-gray-500" for="start_date">Start Date</label>
									<input  type="text" class="form-control" placeholder="Start Date" v-model="job_dets.start_date" @focus="($event.target.type='date')" @click="resetmessage('start_date')">
									<span v-if="start_date_message" class="text-red-500 text-sm m-0">{{ start_date_message }}</span>
								</div>
								<div class="col-md-6 mb-3 mb-md-0">
									<div class="flex justify-between items-center relative">
										<label for="end_date" class="font-semibold text-gray-500">End Date</label>
										<div class="relative group cursor-pointer text-gray-500">
											<QuestionMarkCircleIcon class="w-5 h-5" />
											<div class="absolute w-60 right-full mr-2 top-1/2 -translate-y-1/2 hidden group-hover:block bg-white text-gray-700 text-sm px-3 py-1 rounded shadow-md z-10">
												<div class="flex justify-start space-x-1 text-blue-500 font-bold p-2">
													<QuestionMarkCircleIcon class="size-6" />
													<span class="">Information</span>
												</div>
												<div class="text-xs leading-tight text-blue-500 pb-2">The end date indicates when the posted job will be deactivated.</div>
											</div>
										</div>
									</div>
									<input  type="text" class="form-control" placeholder="End Date" v-model="job_dets.end_date" @focus="($event.target.type='date')" @click="resetmessage('end_date')">
									<span v-if="end_date_message" class="text-red-500 text-sm m-0">{{ end_date_message }}</span>
								</div>
							</div>
							<br>
							<hr>
							<div class="row form-group">
								<div class="col-md-12">
									<div class="flex justify-between">
										<button class="btn btn-outline-primary py-2 px-5">Preview</button>
										<div class="flex justify-end space-x-1">
											<button type="button" class="btn !bg-orange-400 text-white py-2 px-5" @click="ProceedJob('Draft')">Save Draft</button>
											<!-- <input type="submit" value="Post Job" class="btn btn-primary  py-2 px-5"> -->
											<!-- <button @click="ProceedJob()" type="button" class="btn btn-primary  py-2 px-5" id="save">Post Job</button> -->
											<button @click="ProceedJob('Pending')" type="button" class="btn btn-primary  py-2 px-5" id="save">Proceed</button>
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