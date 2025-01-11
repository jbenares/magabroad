<template>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container-fluid px-md-4">
                <!-- Logo section -->
                <a class="navbar-brand  !flex !space-x-2" href="index.html">
                <img src="../../images/magabroad_logo.png" alt="MagAbroad Logo" class="img-fluid" style="max-height: 50px;"> 
                <span class="pt-2">MagAbroad</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="browsejobs.html" class="nav-link">Explore Companies</a></li>
                    <li class="nav-item"><a href="candidates.html" class="nav-link">Candidates</a></li>
                    <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                    <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
                    <li class="nav-item cta mr-md-1 cta-link"><a href="/login" class="nav-link">Sign In</a></li>
                    <li class="nav-item cta mr-md-1"><a href="/employer/postjob" class="nav-link">Post a Job</a></li>
                    <li class="nav-item cta cta-colored"><a href="/job_seeker/findjob" class="nav-link">Want a Job</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <slot/>
    </body>
</template>