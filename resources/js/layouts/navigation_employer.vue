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
                        <li class="nav-item"><a href="/employer/dashboard" class="nav-link">Dashboard</a></li>
                        <!-- Notification Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Notification <span class="badge badge-danger !rounded-xl ">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-wrapper" aria-labelledby="notificationDropdown" style="min-width: 250px;">
                                <h6 class="dropdown-header">Notifications</h6>
                                <a class="dropdown-item" href="#">New candidate applied for the job</a>
                                <a class="dropdown-item" href="#">Job posting has been approved</a>
                                <a class="dropdown-item" href="#">Subscription payment received</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-center text-primary" href="#">View All Notifications</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="/employer/search_candidate" class="nav-link">Candidates</a></li>
                        <!-- Dropdown for Sign In -->
                        <li class="nav-item dropdown mr-md-1">
                            <a class="nav-link dropdown-toggle" href="#" id="signinDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Employer Name
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-wrapper" aria-labelledby="signinDropdown">
                                <a class="dropdown-item" href="">Profile</a>
                                <a class="dropdown-item" href="">Settings</a>
                                <a class="dropdown-item" href="">Logout</a>
                            </div>
                        </li>
                        <li class="nav-item cta mr-md-1"><a href="/employer/postjob" class="nav-link">Post a Job</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <slot/>
    </body>
</template>