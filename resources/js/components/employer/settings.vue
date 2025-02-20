<template>
	<navigation>
		<div class="hero-wrap hero-wrap-3">
            <div class="overlay"></div>
             <div class="container"></div>
		</div>
  
		<section class="ftco-section bg-light"> 
            <div class="container">
                <div class="row">
                    <!-- Settings Page -->
                    <div class="col-md-12 col-lg-8 mb-5">
                        <div class="p-5 bg-white">
                            <h4 class="mb-0">Settings</h4>
                            <p class="m-0">Manage your account settings.</p>
                            <hr>

                            <!-- Change Password -->
                            <h3>Change Password</h3>
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label class="font-weight-bold">Current Password:</label>
                                    <input type="password" class="form-control" placeholder="Enter current password">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="font-weight-bold">New Password:</label>
                                    <input type="password" class="form-control" placeholder="Enter new password">
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label class="font-weight-bold">Confirm New Password:</label>
                                    <input type="password" class="form-control" placeholder="Confirm new password">
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-primary">Update Password</button>
                                </div>
                            </div>

                            <hr>
                            <!-- Notification Settings -->
                            <h3>Notification Preferences</h3>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="emailNotifications">
                                        <label class="form-check-label" for="emailNotifications">Receive Email Notifications</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="smsNotifications">
                                        <label class="form-check-label" for="smsNotifications">Receive SMS Notifications</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <button class="btn btn-primary">Save Preferences</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur.</p>
                            <p><a href="#" class="btn btn-primary py-2 px-4">Learn More</a></p>
                        </div>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
        </section>
		
		<footer class="ftco-footer ftco-bg-blue">
		  <div class="container">
			  <div class="row mb-5">
				  <div class="col-md">
					  <div class="ftco-footer-widget mb-4">
						  <h2 class="ftco-heading-2">Skillhunt Jobboard</h2>
						  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						  <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
						  <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						  <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						  <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					  </ul>
					  </div>
				  </div>
			  </div>
		  </div>
		</footer>
	</navigation>
</template>
  
<script setup>
	import navigation from '@/layouts/navigation_employer.vue';
</script>
