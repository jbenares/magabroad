<template>
        <div class="flex h-screen">
        <!-- Sidebar -->
            <div class="w-64 bg-white border">
                <div class="px-4 py-3 border-b ">
                    <a class="navbar-brand !flex justify-center !space-x-2 mr-1" href="/">
                        <img src="../../../images/magabroad_logo.png" alt="MagAbroad Logo" class="img-fluid" style="max-height: 50px;"> 
                        <h4 class="pt-2 font-bold text-blue-900 mb-0">MagAbroad</h4>
                    </a>
                </div>
                <nav class="mt-4">
                    <ul>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <HomeIcon class="size-4"/>
                            <span class="ml-3">Dashboard</span>
                        </li>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <KeyIcon class="size-4"/>
                            <span class="ml-3">Masterfile</span>
                        </li>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <UsersIcon class="size-4"/>
                            <span class="ml-3">Job Seekers</span>
                        </li>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <UserIcon class="size-4"/>
                            <span class="ml-3">Employer</span>
                        </li>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <DocumentChartBarIcon class="size-4"/>
                            <span class="ml-3">Reports</span>
                        </li>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <WrenchIcon class="size-4"/>
                            <span class="ml-3">Settings</span>
                        </li>
                        <li class="px-4 py-2 text-gray-700 hover:bg-blue-100 flex items-center">
                            <ArrowRightStartOnRectangleIcon class="size-4"/>
                            <span class="ml-3">Logout</span>
                        </li>
                    </ul>
                </nav>
                <div class="mt-auto px-4 py-2 border-t">
                    <button class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg">Logout</button>
                </div>
            </div>

        <!-- Main Content -->
            <div class="flex-1 p-6">
                <header class="flex justify-between items-center pb-4">
                    <h2 class="text-2xl font-bold">Dashboard</h2>
                    <input type="text" placeholder="Search here..." class="px-4 py-2 border rounded-md">
                </header>

                <!-- Stats Cards -->
                <div class="grid grid-cols-3 gap-4 mt-6">
                    <div class="p-4 bg-blue-400 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-white">Total Job Seekers</h3>
                        <p class="text-4xl font-bold text-white">50,120</p>
                    </div>
                    <div class="p-4 bg-yellow-400 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-white">Total Employers</h3>
                        <p class="text-4xl font-bold text-white">25,120</p>
                    </div>
                    <div class="p-4 bg-purple-400 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-white">Total Active Jobs</h3>
                        <p class="text-4xl font-bold text-white">10,320</p>
                    </div>
                </div>

                <!-- Recent Activity Table -->
                <div class="mt-6 bg-white">
                    <div class="bg-white p-0">
                        <h3 class="text-lg font-semibold border-b pb-2 mb-4">Recent Activity</h3>
                        <ul class="space-y-2">
                            <li class="bg-gray-50 p-3 rounded border">
                            <strong class="text-gray-700">New Job Seeker:</strong> Jane Doe has joined the platform.
                            </li>
                            <li class="bg-gray-50 p-3 rounded border">
                            <strong class="text-gray-700">New Job Posted:</strong> "Frontend Developer" by XYZ Company.
                            </li>
                            <li class="bg-gray-50 p-3 rounded border">
                            <strong class="text-gray-700">Report Generated:</strong> Monthly employer report is ready for download.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</template>
<script setup>
	import { HomeIcon, KeyIcon, UserIcon, UsersIcon, DocumentChartBarIcon, WrenchIcon, ArrowRightStartOnRectangleIcon} from '@heroicons/vue/24/solid'
    // import { HomeIcon } from '@heroicons/vue/24/outline'
</script>