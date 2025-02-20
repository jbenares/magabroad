<script setup>
    import { WrenchIcon, ChevronDownIcon } from '@heroicons/vue/24/solid';
    import { reactive, ref, onMounted, onBeforeUnmount } from 'vue';
    import { useRouter } from "vue-router"
    const router = useRouter();

    let credentials=ref([])

    onMounted(async () => {
		getDashboard()
	})

    const getDashboard = async () => {
		const response = await fetch(`/api/dashboard`);
		credentials.value = await response.json();
		// if(!credentials.value.firstname){
		// 	alert('You have been logged out due to inactivity.')
        //     localStorage.removeItem('token')
		// 	router.push('/')
		// }
	}

    const logout = () => {
        localStorage.removeItem('token')
        router.push('/')
    }
</script>
<template>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid px-md-4">
                <!-- Logo section -->
                <a class="navbar-brand !flex !space-x-2" href="/">
                    <img src="../../images/magabroad_logo.png" alt="MagAbroad Logo" class="img-fluid" style="max-height: 50px;"> 
                    <span class="pt-2">MagAbroad</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>
                
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="/job_seeker/dashboard" class="nav-link">Dashboard</a></li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notification <span class="badge badge-danger rounded-xl">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-wrapper" aria-labelledby="notificationDropdown" style="min-width: 300px; max-height: 400px; overflow-y: auto;">
                                <div class="dropdown-header d-flex justify-content-between align-items-center">
                                    <span>Today</span>
                                    <a href="#" class="text-primary">Mark all as read</a>
                                </div>
                                <a class="dropdown-item d-flex align-items-start" href="#">
                                    <div class="image-container mr-3">
                                        <img src="../../images/company-2.jpg" alt="Transportation" />
                                    </div>
                                    <div>
                                        <div class="font-weight-bold leading-none mb-0">Transportation</div>
                                        <small>You expended 200 BDT on transport that exceeded your budget.</small>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-start" href="#">
                                    <div class="image-container mr-3">
                                        <img  src="../../images/company-3.jpg" alt="Party" />
                                    </div>
                                    <div>
                                        <div class="font-weight-bold leading-none mb-0">Party</div>
                                        <small>Too much exceeded on party last night.</small>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-start" href="#">
                                    <div class="image-container mr-3">
                                        <img  src="../../images/company-4.jpg" alt="Loan" />
                                    </div>
                                    <div>
                                        <div class="font-weight-bold leading-none mb-0">Loan</div>
                                        <small>You have an upcoming Loan to pay. Click to pay now.</small>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Last Week</div>
                                <a class="dropdown-item d-flex align-items-start" href="#">
                                    <div class="image-container mr-3">
                                        <img src="../../images/company-1.jpg" alt="Marriage" />
                                    </div>
                                    <div>
                                        <div class="font-weight-bold leading-none mb-0">Marriage</div>
                                        <small>You need to save 20,000 BDT for marriage.</small>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-start" href="#">
                                    <div class="image-container mr-3">
                                        <img src="../../images/company-3.jpg" alt="Gym" />
                                    </div>
                                    <div>
                                        <div class="font-weight-bold leading-none mb-0">Gym</div>
                                        <small>You have an upcoming payment for the Gym. Click to pay now.</small>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-start" href="#">
                                    <div class="image-container mr-3">
                                        <img src="../../images/company-2.jpg" alt="Investment" />
                                    </div>
                                    <div>
                                        <div class="font-weight-bold leading-none mb-0">Investment</div>
                                        <small>You set a goal for investment on House and Mortgage fee.</small>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center text-primary" href="/job_seeker/notifications">View All Notifications</a>
                            </div>
                        </li>


                        <!-- <li class="nav-item"><a href="#" class="nav-link">Explore Companies</a></li> -->
                        <!-- Dropdown for Sign In -->
                        <li class="nav-item dropdown  mr-md-1">
                            <a class="nav-link dropdown-toggle " href="#" id="signinDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Jobseeker Name
                            </a>
                            <div class="dropdown-menu" aria-labelledby="signinDropdown">
                                <a class="dropdown-item" href="/job_seeker/profile">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#" @click="logout">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item cta cta-colored"><a href="/job_seeker/search_job" class="nav-link">Want a Job</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <slot/>
    </body>
</template>