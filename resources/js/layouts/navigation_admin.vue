<template>
	<div class="flex h-screen">
	<!-- Mobile Sidebar Toggle Button -->
		<!-- <div class="absolute top-4 left-4 z-50 lg:left-60 md:left-60">
			<button
				@click="toggleMobileSidebar"
				class="p-2 rounded-md bg-gray-800 text-white "
			>
				<svg
				xmlns="http://www.w3.org/2000/svg"
				class="h-6 w-6"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
				>
				<path
					stroke-linecap="round"
					stroke-linejoin="round"
					stroke-width="2"
					d="M4 6h16M4 12h16m-7 6h7"
				/>
				</svg>
			</button>
		</div> -->

		<!-- Sidebar -->
		<div class="w-64 bg-white bottom-0 top-0 absolute border flex flex-col transition-transform duration-300 z-40 " :class="mobileSidebarOpen ? 'translate-x-0' : '-translate-x-full'" >
			<div class="absolute top-4 left-4 lg:left-64 md:left-64  sm:left-64  xs:left-64  xxs:left-64" >
				<button
					@click="toggleMobileSidebar"
					class="p-2 ml-3 rounded-md text-gray-800 border bg-white border-gray-500 ring-0 ring-transparent"
				>
					<svg
					xmlns="http://www.w3.org/2000/svg"
					class="h-6 w-6"
					fill="none"
					viewBox="0 0 24 24"
					stroke="currentColor"
					>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						stroke-width="2"
						d="M4 6h16M4 12h16m-7 6h7"
					/>
					</svg>
				</button>
			</div>
			<div class="px-2 py-3 sticky top-0 h-20">
					<a class="navbar-brand !flex justify-center !space-x-2 mr-1" href="/">
					<img
						src="../../images/company-1.jpg"
						alt="MagAbroad Logo"
						class="img-fluid"
						style="max-height: 50px;"
					/>
					<h4 class="pt-2 font-bold text-blue-900 mb-0">sample</h4>
				</a>
			</div>
			<nav class="pt-2 flex-grow bottom-1 overflow-y-hidden hover:overflow-y-auto lg:touch-auto md:touch-auto sm:touch-auto">
				<ul>
				<!-- Top-level menu items -->
					<li class="">
						<a href="" class="px-4 py-2 flex items-center text-gray-600 hover:text-blue-500 hover:bg-blue-100 ">
						<HomeIcon class="size-4" />
						<span class="ml-3">Dashboard</span>
						</a>
					</li>

					<!-- Multilevel menu with Vue toggle -->
					<li class="" >
						<div class="px-4 py-2 flex items-center justify-between cursor-pointer text-gray-600 hover:text-blue-500 hover:bg-blue-100" @click="toggleSubmenu('masterfile')" >
							<div class="flex items-center">
								<KeyIcon class="size-4" />
								<span class="ml-3">Masterfile</span>
							</div>
							<svg class="w-4 h-4 ml-2 transition-transform duration-300" :class="{'rotate-180': submenuOpen.masterfile}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
								<path d="M6 9l6 6 6-6"></path>
							</svg>
						</div>
						<ul class="space-y-1 overflow-hidden transition-all duration-300" :style="submenuOpen.masterfile ? 'max-height: 500px;' : 'max-height: 0;'" >
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Employment Category</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Countries</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Job Types</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Skills</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Industry</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Job Classification</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Applicant Status</span></a>
							</li>
						</ul>
					</li>

					<!-- More top-level items -->
					<li class="">
						<a href="" class="px-4 py-2 flex items-center text-gray-600 hover:text-blue-500 hover:bg-blue-100">
						<UsersIcon class="size-4" />
						<span class="ml-3">Job Seekers</span>
						</a>
					</li>
					<li class="">
						<div class="px-4 py-2 flex items-center justify-between cursor-pointer text-gray-600 hover:text-blue-500 hover:bg-blue-100" @click="toggleSubmenu('employer')" >
							<div class="flex items-center">
								<UserIcon class="size-4" />
								<span class="ml-3">Employer</span>
							</div>
							<svg class="w-4 h-4 ml-2 transition-transform duration-300" :class="{'rotate-180': submenuOpen.employer}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
								<path d="M6 9l6 6 6-6"></path>
							</svg>
						</div>
						<ul class=" space-y-1 overflow-hidden transition-all duration-300" :style="submenuOpen.employer ? 'max-height: 500px;' : 'max-height: 0;'" >
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Employment Category</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Countries</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Job Types</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Skills</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Industry</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Job Classification</span></a>
							</li>
							<li class="text-[15px]">
								<a href="" class="pl-14 text-gray-600 hover:text-blue-500 hover:bg-blue-100 flex items-center py-1"><span>Applicant Status</span></a>
							</li>
						</ul>
					</li>
					<li class="">
						<a href="" class="px-4 py-2 flex items-center text-gray-600 hover:text-blue-500 hover:bg-blue-100">
						<DocumentChartBarIcon class="size-4" />
						<span class="ml-3">Reports</span>
						</a>
					</li>
					<li class="">
						<a href="" class="px-4 py-2 flex items-center text-gray-600 hover:text-blue-500 hover:bg-blue-100">
							<WrenchIcon class="size-4" />
							<span class="ml-3">Settings</span>
						</a>
					</li>
				</ul>
			</nav>
			<!-- <div class="mt-auto border-t">
				<button class="w-full text-white bg-gray-800 rounded-lg">Logout</button>
			</div> -->
		</div>

		<!-- Main Content -->
		<div class="transition-transform duration-300 lg:bottom-0 lg:top-0 lg:left-64 lg:right-0 md:bottom-0 md:top-0 md:left-64 md:right-0 absolute overflow-y-auto lg:touch-auto md:touch-auto sm:touch-auto" :class="mobileSidebarOpen ? 'xs:fixed xs:left-0 xs:right-0 xxs:fixed xxs:left-0 xxs:right-0' : '!fixed !left-0 !right-0'">
			<slot />
		</div>
	</div>
</template>
<script setup>
	import { HomeIcon, KeyIcon, UserIcon, UsersIcon, DocumentChartBarIcon, WrenchIcon, ArrowRightStartOnRectangleIcon} from '@heroicons/vue/24/solid'
	// import { HomeIcon } from '@heroicons/vue/24/outline'
	import { reactive, ref } from "vue";

	const submenuOpen = reactive({
	masterfile: false,
	employer: false,
	});
	const toggleSubmenu = (menu) => {
		submenuOpen[menu] = !submenuOpen[menu];
	};


	const mobileSidebarOpen = ref(true);
	const toggleMobileSidebar = () => {
		mobileSidebarOpen.value = !mobileSidebarOpen.value;
	};

	
</script>