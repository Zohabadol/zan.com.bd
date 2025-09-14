<template>
    <section class="py-16 bg-white">
      <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Testimonials</h2>
        <span class="block h-1 w-16 bg-orange-500 mx-auto mb-4"></span>
        <p class="text-gray-600 mb-12 relative inline-block">
          What our clients are saying
        </p>
  
        <!-- Swiper -->
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide" v-for="testimonial in testimonials" :key="testimonial.id">
              <div class="bg-gray-100 p-6 rounded-lg relative">
                <p class="text-gray-600 italic mb-6">
                  <span class="text-2xl text-orange-500 leading-none">“</span>
                  {{ testimonial.message }}
                  <span class="text-2xl text-orange-500 leading-none">”</span>
                </p>
                <div class="flex flex-col items-center">
                  <img :src="testimonial.image" alt="testimonial.name" class="w-16 h-16 rounded-full mb-3" />
                  <h4 class="font-bold text-gray-800">{{ testimonial.name }}</h4>
                  <p class="text-gray-500 text-sm">{{ testimonial.role }}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  </template>
  
  <script>
  import Swiper from 'swiper';
  import 'swiper/css';
  
  export default {
    data() {
      return {
        testimonials: [
          {
            id: 1,
            message: 'Great service! Highly recommended.',
            name: 'Matt Brandon',
            role: 'Freelancer',
            image: 'https://randomuser.me/api/portraits/men/32.jpg',
          },
          {
            id: 2,
            message: 'Absolutely fantastic experience.',
            name: 'John Larson',
            role: 'Entrepreneur',
            image: 'https://randomuser.me/api/portraits/men/44.jpg',
          },
          {
            id: 3,
            message: 'Highly professional and reliable.',
            name: 'Saul Goodman',
            role: 'CEO & Founder',
            image: 'https://randomuser.me/api/portraits/men/65.jpg',
          },
        ],
      };
    },
    mounted() {
      const swiper = new Swiper('.swiper-container', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
          },
          768: {
            slidesPerView: 3,
          },
        },
      });
    },
  };
  </script>
  
  <style scoped>
  .swiper-container {
    width: 100%;
    height: auto;
  }
  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .swiper-pagination-bullet {
    background-color: orange;
  }
  </style>
  