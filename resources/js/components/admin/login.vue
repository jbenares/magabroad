<template>
	<div class="bg-blue-600 fixed w-full h-[50%] top-0"></div>
    <div class="flex items-center justify-center min-h-screen relative">
		<div class="container">
			<div class="flex justify-center space-x-2 mb-4">
				<span class="shadow rounded-[100%]  border-2 border-white"><img src="../../../images/magabroad_logo.png" alt="" class="size-14 "></span>
				<h2 class="pt-1 font-bold text-white mb-0">MagAbroad</h2>
			</div>
			<div class="flex justify-center">
				<div class="w-full max-w-md p-6 px-8 pb-8 bg-white rounded-lg shadow">
					<h2 class="mb-0 text-2xl font-bold text-center text-gray-800 leading-tight">Admin Login</h2>
					<p class="mb-6 text-center leading-tight">Welcome back Admin!</p>
					<form >
						<div class="mb-4">
							<label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
							<input  type="email" id="email" class="w-full px-4 py-2 text-base text-gray-600 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your email" required />
						</div>
						<div class="mb-6">
							<label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
							<input type="password" id="password" class="w-full px-4 py-2 text-base text-gray-600 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter your password" required />
						</div>
						<div class="flex items-center justify-between mb-4">
							<div class="flex items-center">
								<input id="remember" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
								<label for="remember" class="ml-2 text-sm text-gray-600 pt-2">Remember me</label>
							</div>
							<a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
						</div>
						<button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1" >
							Login
						</button>
					</form>
				</div>
			</div>
		</div>
    </div>
</template>
<script></script>