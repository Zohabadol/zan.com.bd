import { createApp } from 'vue';
import SwiperSlider from './components/SwiperSlider.vue';

const app = createApp({});

app.component('swiper-slider', SwiperSlider);

app.mount('#app');
