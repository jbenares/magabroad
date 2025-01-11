<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-600 text-white py-3">
      <div  class="w-full max-w-lg bg-white text-gray-800 rounded-lg shadow-lg p-8 lg:bg-opacity-100 sm:bg-opacity-90" >
        <!-- Logo -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">MagAbroad</h1>
  
        <!-- Title -->
        <h2 class="text-xl font-semibold text-center mb-6">Create Your Account</h2>
  
        <!-- Toggle Buttons -->
        <div class="flex justify-center mb-6">
          <button
            :class="[
              'py-2 px-4 rounded-l-lg w-1/2 transition',
              userType === 'employer' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'
            ]"
            @click="userType = 'employer'"
          >
            Employer
          </button>
          <button
            :class="[
              'py-2 px-4 rounded-r-lg w-1/2 transition',
              userType === 'job_seeker' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800'
            ]"
            @click="userType = 'job_seeker'"
          >
            Job Seeker
          </button>
        </div>
  
        <!-- Registration Form -->
        <form @submit.prevent="handleRegistration">
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Full Name</label>
            <input
              type="text"
              v-model="form.fullName"
              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="Enter your full name"
              required
            />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Email</label>
            <input
              type="email"
              v-model="form.email"
              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="Enter your email"
              required
            />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Password</label>
            <input
              type="password"
              v-model="form.password"
              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="Create a password"
              required
            />
          </div>
  
          <!-- Conditional Field for Employer -->
          <div v-if="userType === 'employer'" class="mb-4">
            <label class="block text-sm font-medium mb-2">Employer ID (Optional)</label>
            <input
              type="text"
              v-model="form.employerId"
              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="Enter your Employer ID"
            />
          </div>
  
          <!-- Conditional Field for Job Seeker -->
          <div v-if="userType === 'job_seeker'" class="mb-4">
            <label class="block text-sm font-medium mb-2">Desired Job Title</label>
            <input
              type="text"
              v-model="form.jobTitle"
              class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="e.g., Graphic Designer"
              required
            />
          </div>
  
          <button
            type="submit"
            class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-lg hover:bg-blue-600 transition"
          >
            Register
          </button>
        </form>
  
        <!-- Footer Links -->
        <p class="text-sm text-center text-gray-500 mt-6">
          Already have an account? <a href="#" class="text-blue-500 hover:underline">Login</a>
        </p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        userType: "employer", // Default to employer
        form: {
          fullName: "",
          email: "",
          password: "",
          employerId: "",
          jobTitle: "",
        },
      };
    },
    methods: {
      handleRegistration() {
        alert(`Registering as ${this.userType === "employer" ? "Employer" : "Job Seeker"}!`);
        console.log("Form Submitted:", this.form);
      },
    },
  };
  </script>
  
  <style>
  body {
    font-family: 'Inter', sans-serif;
  }
  </style>
  