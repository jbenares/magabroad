AOS.init({
    duration: 800,
    easing: 'slide'
});
import "aos/dist/aos.css";
import './bootstrap';
import { createApp } from 'vue'
import app from './components/app.vue'
import router from './router/index.js'

// import { TailwindPagination } from 'laravel-vue-pagination';
createApp(app).use(router).mount("#app")
