import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js' , 'resources/css/open-iconic-bootstrap.min.css' , 'resources/css/animate.css', 'resources/css/owl.carousel.min.css', 'resources/css/owl.theme.default.min.css', 'resources/css/magnific-popup.css', 'resources/css/ionicons.min.css', 'resources/css/bootstrap-datepicker.css', 'resources/css/jquery.timepicker.css', 'resources/css/flaticon.css', 'resources/css/icomoon.css', 'resources/css/app.css' , 'public/js/jquery.min.js' , 'public/js/jquery-migrate-3.0.1.min.js' , 'public/js/popper.min.js' , 'public/js/bootstrap.min.js' , 'public/js/jquery.waypoints.min.js' , 'public/js/jquery.easing.1.3.js' , 'public/js/owl.carousel.min.js' , 'public/js/jquery.magnific-popup.min.js' , 'public/js/jquery.animateNumber.min.js' , 'public/js/google-map.js' , 'public/js/main.js'],
            refresh: true,
        }),
        vue()
    ],
});
