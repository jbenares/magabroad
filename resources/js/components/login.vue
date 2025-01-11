<template>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 via-purple-500 to-indigo-600 text-white">
      <div class="w-full max-w-md bg-white text-gray-800 rounded-lg shadow-lg p-8">
        <!-- Logo -->
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-4">MagAbroad</h1>
  
        <!-- Title -->
        <h2 class="text-xl font-semibold text-center mb-6">Login to Your Account</h2>
  
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
  
        <!-- Login Form -->
        <form @submit.prevent="handleLogin">
          <div class="mb-4">
            <label class="block text-sm font-medium mb-2">Email</label>
            <input
              type="email"
              v-model="form.email"
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="Enter your email"
              required
            />
          </div>
          <div class="mb-6">
            <label class="block text-sm font-medium mb-2">Password</label>
            <input
              type="password"
              v-model="form.password"
              class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-400"
              placeholder="Enter your password"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-3 rounded-lg hover:bg-blue-600 transition"
          >
            Login
          </button>
        </form>
  
        <!-- Footer Links -->
        <p class="text-sm text-center text-gray-500 mt-6">
          Don't have an account? <a href="#" class="text-blue-500 hover:underline">Sign Up</a>
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
          email: "",
          password: "",
        },
      };
    },
    methods: {
      handleLogin() {
        alert(`Logging in as ${this.userType === "employer" ? "Employer" : "Job Seeker"}!`);
      },
    },
  };
  </script>
  
  <style>
  body {
    font-family: 'Inter', sans-serif;
  }
  </style>
  