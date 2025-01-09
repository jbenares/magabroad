<template>
    <div class="min-h-screen bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-600 text-white">
      <!-- Navbar -->
      <header class="bg-white text-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
          <h1 class="text-2xl font-bold">Skillhunt</h1>
          <nav class="flex items-center space-x-6">
            <a href="#" class="text-gray-600 hover:text-blue-500">Dashboard</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Post a Job</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Applications</a>
            <a href="#" class="text-blue-500 font-semibold">Logout</a>
          </nav>
        </div>
      </header>
  
      <!-- Dashboard Content -->
      <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Profile Card -->
          <div class="col-span-1 bg-white text-gray-800 rounded-lg shadow-lg p-6">
            <div class="flex flex-col items-center">
              <img
                src="https://via.placeholder.com/100"
                alt="Company Logo"
                class="w-24 h-24 rounded-lg mb-4"
              />
              <h2 class="text-xl font-bold">TechCorp Inc.</h2>
              <p class="text-gray-500">Innovating the Future</p>
            </div>
            <div class="mt-6">
              <h3 class="font-semibold mb-2">Active Jobs</h3>
              <p class="text-2xl font-bold text-blue-500">12</p>
            </div>
            <button
              class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 rounded-lg mt-4"
            >
              Post a New Job
            </button>
          </div>
  
          <!-- Main Dashboard -->
          <div class="col-span-2 bg-white text-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Dashboard Overview</h2>
            <div class="grid grid-cols-2 gap-6">
              <!-- Job Postings -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Active Job Postings</h3>
                <p class="text-gray-500 text-sm">12 jobs currently posted</p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  Manage Postings
                </a>
              </div>
  
              <!-- Applications -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">New Applications</h3>
                <p class="text-gray-500 text-sm">45 new applications</p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  View Applications
                </a>
              </div>
  
              <!-- Team Management -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Team Members</h3>
                <p class="text-gray-500 text-sm">5 team members added</p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  Manage Team
                </a>
              </div>
  
              <!-- Analytics -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Performance Analytics</h3>
                <p class="text-gray-500 text-sm">
                  120 job views this week
                </p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  View Analytics
                </a>
              </div>
            </div>
          </div>
        </div>
  
        <!-- Recent Activities Section -->
        <div class="mt-10 bg-white text-gray-800 rounded-lg shadow-lg p-6">
          <h2 class="text-xl font-bold mb-4">Recent Activities</h2>
          <ul class="divide-y divide-gray-200">
            <li class="py-4 flex justify-between items-center">
              <div>
                <h3 class="font-semibold text-gray-700">
                  John Doe applied for Frontend Developer
                </h3>
                <p class="text-sm text-gray-500">5 minutes ago</p>
              </div>
              <button
                class="bg-blue-500 text-white py-1 px-3 rounded-lg text-sm"
              >
                View
              </button>
            </li>
            <li class="py-4 flex justify-between items-center">
              <div>
                <h3 class="font-semibold text-gray-700">
                  Sarah Lee applied for Backend Developer
                </h3>
                <p class="text-sm text-gray-500">15 minutes ago</p>
              </div>
              <button
                class="bg-blue-500 text-white py-1 px-3 rounded-lg text-sm"
              >
                View
              </button>
            </li>
            <li class="py-4 flex justify-between items-center">
              <div>
                <h3 class="font-semibold text-gray-700">
                  New job posting: Data Scientist
                </h3>
                <p class="text-sm text-gray-500">1 hour ago</p>
              </div>
              <button
                class="bg-blue-500 text-white py-1 px-3 rounded-lg text-sm"
              >
                View
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        companyName: "TechCorp Inc.",
        activeJobs: 12,
        newApplications: 45,
        teamMembers: 5,
        weeklyViews: 120,
        recentActivities: [
          { name: "John Doe", job: "Frontend Developer", time: "5 minutes ago" },
          { name: "Sarah Lee", job: "Backend Developer", time: "15 minutes ago" },
          { name: "Data Scientist", time: "1 hour ago" },
        ],
      };
    },
  };
  </script>
  
  <style>
  body {
    font-family: "Inter", sans-serif;
  }
  </style>
  