<template>
    <div class="min-h-screen bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-600 text-white">
      <!-- Navbar -->
      <header class="bg-white text-gray-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
          <h1 class="text-2xl font-bold">MagAbroad</h1>
          <nav class="flex items-center space-x-6">
            <a href="#" class="text-gray-600 hover:text-blue-500">Dashboard</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Browse Jobs</a>
            <a href="#" class="text-gray-600 hover:text-blue-500">Notifications</a>
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
                alt="Profile Picture"
                class="w-24 h-24 rounded-full mb-4"
              />
              <h2 class="text-xl font-bold">John Doe</h2>
              <p class="text-gray-500">Web Developer</p>
            </div>
            <div class="mt-6">
              <h3 class="font-semibold mb-2">Profile Completion</h3>
              <div class="relative w-full bg-gray-200 rounded-full h-4">
                <div
                  class="absolute top-0 left-0 h-4 bg-blue-500 rounded-full"
                  style="width: 80%"
                ></div>
              </div>
              <p class="text-sm text-gray-500 mt-2">80% completed</p>
            </div>
            <button
              class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 rounded-lg mt-4"
            >
              Complete Profile
            </button>
          </div>
  
          <!-- Main Dashboard -->
          <div class="col-span-2 bg-white text-gray-800 rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Your Dashboard</h2>
            <div class="grid grid-cols-2 gap-6">
              <!-- Applied Jobs -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Applied Jobs</h3>
                <p class="text-gray-500 text-sm">5 jobs applied</p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  View All
                </a>
              </div>
  
              <!-- Saved Jobs -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Saved Jobs</h3>
                <p class="text-gray-500 text-sm">8 jobs saved</p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  View All
                </a>
              </div>
  
              <!-- Notifications -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Recent Notifications</h3>
                <ul class="list-disc ml-5 text-gray-500 text-sm">
                  <li>Job interview scheduled for Jan 15</li>
                  <li>Your application was reviewed</li>
                  <li>New job suggestion: Frontend Developer</li>
                </ul>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline mt-2 inline-block"
                >
                  View All
                </a>
              </div>
  
              <!-- Account Settings -->
              <div class="bg-gray-100 p-4 rounded-lg">
                <h3 class="font-semibold text-gray-700 mb-2">Account Settings</h3>
                <p class="text-gray-500 text-sm">
                  Update your profile or change your password.
                </p>
                <a
                  href="#"
                  class="text-blue-500 text-sm hover:underline"
                >
                  Go to Settings
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        // Data for dynamic dashboard updates
        profileCompletion: 80,
        appliedJobsCount: 5,
        savedJobsCount: 8,
        notifications: [
          "Job interview scheduled for Jan 15",
          "Your application was reviewed",
          "New job suggestion: Frontend Developer",
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
  