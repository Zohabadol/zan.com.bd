@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section
    class="relative h-[400px] flex items-center justify-center bg-cover bg-center"
    style="background-image: url('{{ asset('images/about-hero.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <h1 class="relative text-white text-5xl font-extrabold z-10">ABOUT US</h1>
</section>

<!-- About Content -->
<section class="container mx-auto py-16 px-4  text-gray-700">
    <div class="max-w-7xl mx-auto mb-10">
        <p class="mb-6"> <strong>Zan Limited</strong> is a technology-driven software company founded with a vision to redefine digital solutions across industries. From custom enterprise applications and AI-powered tools to cloud services and mobile apps, we deliver innovative and scalable software that empowers businesses to reach their full potential. </p>
        <p> Our team of expert developers, UX/UI designers, and consultants work closely with clients—from startups to established enterprises—to solve complex challenges with cutting-edge technologies such as machine learning, automation, and data analytics. At Zan.com.bd, we uphold the highest standards of quality, security, and sustainability in every project, ensuring long-term value and transformative growth. </p>
    </div>

    <!-- Stats Section -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 border-t border-gray-300 pt-10">
        <!-- Item 1 -->
        <div class="flex flex-col items-center">
            <h2 class="text-4xl font-extrabold text-gray-900">33</h2>
            <p class="text-gray-600 font-medium">Years</p>
            <p class="text-sm text-gray-500 mt-1">Experience</p>
        </div>

        <!-- Item 2 -->
        <div class="flex flex-col items-center border-l md:border-l border-gray-300">
            <h2 class="text-4xl font-extrabold text-gray-900">24</h2>
            <p class="text-gray-600 font-medium">Business</p>
            <p class="text-sm text-gray-500 mt-1">Concerns</p>
        </div>

        <!-- Item 3 -->
        <div class="flex flex-col items-center border-t md:border-l md:border-t-0 border-gray-300 pt-6 md:pt-0">
            <h2 class="text-4xl font-extrabold text-gray-900">50K</h2>
            <p class="text-gray-600 font-medium">Dedicated</p>
            <p class="text-sm text-gray-500 mt-1">Personnel</p>
        </div>

        <!-- Item 4 -->
        <div class="flex flex-col items-center border-t md:border-l md:border-t-0 border-gray-300 pt-6 md:pt-0">
            <h2 class="text-4xl font-extrabold text-gray-900">1B</h2>
            <p class="text-gray-600 font-medium">USD Annual</p>
            <p class="text-sm text-gray-500 mt-1">Turnover</p>
        </div>
    </div>

    <div id="mission-vision" class="max-w-7xl mx-auto px-6 py-16 ">
        {{-- Mission & Vision Section --}}
        <div class="grid md:grid-cols-2 gap-16 items-center">
            {{-- Left Column --}}
            <div class="">
                <div class="relative">
                    <h2 class="text-7xl font-bold text-gray-300 mb-4">MISSION</h2>
                    <h2 class="text-xl font-medium text-gray-900  absolute top-6">MISSION</h2>
                </div>

                <p class="text-gray-600 leading-relaxed mb-12">
                    To exceed stakeholders’ expectations with key focus on environmental, social, and
                    corporate governance.
                </p>

                <!-- <h2 class="text-7xl font-bold text-gray-300 mb-4">VISION</h2> -->
                <div class="relative">
                    <h2 class="text-7xl font-bold text-gray-300 mb-4">VISION</h2>
                    <h2 class="text-xl font-medium text-gray-900  absolute top-6">VISION</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    We envision to sustain and grow as a diversified global conglomerate.
                </p>
            </div>

            {{-- Right Column (Images) --}}
            <div class="flex flex-col gap-6  items-end relative">
                <div class="">
                    <img src="{{ asset('images/mission.jpg') }}" alt="Mission" class="rounded shadow-lg w-[442px] h-[588px] object-cover">
                </div>
                <div class="absolute left-0 -bottom-10">
                    <img src="{{ asset('images/vision.png') }}" alt="Vision" class="rounded shadow-lg w-[251px] h-[311px]  object-cover">
                </div>
            </div>
        </div>
    </div>
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-10">
            <div class="relative">
                <h2 class="text-7xl font-bold text-gray-300 mb-4">VALUES</h2>
                <h2 class="text-xl font-medium text-gray-900  absolute top-5">VALUES</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                {{-- Left Image --}}
                <div>
                    <img
                        src="{{ asset('images/value.png') }}"
                        alt="Values Image"
                        class="rounded-lg shadow-lg w-full object-cover" />
                </div>

                {{-- Right Content --}}
                <div class="space-y-6">
                    {{-- Item 1 --}}
                    <div class="flex justify-between items-center border-b pb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Integrity</h3>
                        <img src="{{ asset('images/one.png') }}" alt="Integrity" class="w-10 h-10">
                    </div>

                    {{-- Item 2 --}}
                    <div class="flex justify-between items-center border-b pb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Passion</h3>
                        <img src="{{ asset('images/two.png') }}" alt="Passion" class="w-10 h-10">
                    </div>

                    {{-- Item 3 --}}
                    <div class="flex justify-between items-center border-b pb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Adaptability</h3>
                        <img src="{{ asset('images/three.png') }}" alt="Adaptability" class="w-10 h-10">
                    </div>

                    {{-- Item 4 --}}
                    <div class="flex justify-between items-center border-b pb-4">
                        <h3 class="text-2xl font-bold text-gray-900">Care</h3>
                        <img src="{{ asset('images/four.png') }}" alt="Care" class="w-10 h-10">
                    </div>

                    {{-- Item 5 --}}
                    <div class="flex justify-between items-center">
                        <h3 class="text-2xl font-bold text-gray-900">Excellence</h3>
                        <img src="{{ asset('images/five.png') }}" alt="Excellence" class="w-10 h-10">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div id="directors" class="max-w-7xl mx-auto px-6 md:px-10">
            {{-- Section Title --}}
            <h2 class="text-lg font-semibold text-gray-900 uppercase mb-10">
                Board of Directors
            </h2>

            {{-- Directors Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Director 1 --}}
                <div class="text-center">
                    <img src="{{ asset('images/diroctors/03.jpg') }}" alt="A K M Badruzzoha"
                        class="w-full h-[420px] object-cover rounded-md shadow-md">

                    <h3 class="mt-4 text-xl font-bold text-gray-900 uppercase">A K M Badruzzoha</h3>
                    <p class="text-gray-600 text-sm mt-1">Chairman</p>

                    <button
                        class="read-bio-btn text-green-600 font-semibold text-sm mt-2 inline-flex items-center gap-1 hover:text-green-700 transition"
                        data-target="bio1">
                        Read Bio <span class="arrow text-green-600">▼</span>
                    </button>

                    <div id="bio1" class="bio hidden mt-3 text-gray-600 text-sm leading-relaxed px-3">
                        A K M Badruzzoha is the founding Chairman who has led the organization with integrity, vision, and a commitment to excellence.
                    </div>
                </div>

                {{-- Director 2 --}}
                <div class="text-center">
                    <img src="{{ asset('images/diroctors/01.JPG') }}" alt="Aziza Akter"
                        class="w-full h-[420px] object-cover rounded-md shadow-md">

                    <h3 class="mt-4 text-xl font-bold text-gray-900 uppercase">Aziza Akter</h3>
                    <p class="text-gray-600 text-sm mt-1">Managing Director</p>

                    <button
                        class="read-bio-btn text-green-600 font-semibold text-sm mt-2 inline-flex items-center gap-1 hover:text-green-700 transition"
                        data-target="bio2">
                        Read Bio <span class="arrow text-green-600">▼</span>
                    </button>

                    <div id="bio2" class="bio hidden mt-3 text-gray-600 text-sm leading-relaxed px-3">
                        Aziza Akter has played a pivotal role in expanding the company globally,
                        ensuring innovation and sustainability at every level.
                    </div>
                </div>

                {{-- Director 3 --}}
                <div class="text-center">
                    <img src="{{ asset('images/diroctors/02.JPG') }}" alt="Nahian Tahamin"
                        class="w-full h-[420px] object-cover rounded-md shadow-md">

                    <h3 class="mt-4 text-xl font-bold text-gray-900 uppercase">Nahian Tahamin</h3>
                    <p class="text-gray-600 text-sm mt-1">Chief Executive Officer</p>

                    <button
                        class="read-bio-btn text-green-600 font-semibold text-sm mt-2 inline-flex items-center gap-1 hover:text-green-700 transition"
                        data-target="bio3">
                        Read Bio <span class="arrow text-green-600">▼</span>
                    </button>

                    <div id="bio3" class="bio hidden mt-3 text-gray-600 text-sm leading-relaxed px-3">
                        Nahian Tahamin has contributed to strategic development, leadership,
                        and strengthening corporate governance within the company.
                    </div>
                </div>


            </div>
        </div>

        {{-- Simple JavaScript --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.read-bio-btn');

                buttons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const targetId = btn.getAttribute('data-target');
                        const bio = document.getElementById(targetId);
                        const arrow = btn.querySelector('.arrow');

                        // Toggle visibility
                        if (bio.classList.contains('hidden')) {
                            bio.classList.remove('hidden');
                            btn.innerHTML = 'Hide Bio <span class="arrow text-green-600">▲</span>';
                        } else {
                            bio.classList.add('hidden');
                            btn.innerHTML = 'Read Bio <span class="arrow text-green-600">▼</span>';
                        }
                    });
                });
            });
        </script>
    </section>
    <!-- <section class="py-16 max-w-7xl mx-auto px-6 md:px-10">
        <h2 class="text-lg font-semibold text-gray-800 mb-8 uppercase tracking-wide">
            Awards & Achievements
        </h2>

        <div class="grid md:grid-cols-3 gap-10">
            
            <div class="group">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ asset('images/award1.jpg') }}" alt="Award 1"
                        class="w-full h-[350px] object-cover transform group-hover:scale-105 transition duration-300">
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-900 leading-snug">
                        FLAMINGO FASHIONS LIMITED WINS GOLD AWARD AT THE NATIONAL EXPORT TROPHY 2020–21
                    </h3>
                    <p class="text-green-500 font-semibold text-sm mt-2">2023–11–09</p>
                </div>
            </div>

          
            <div class="group">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ asset('images/award2.jpg') }}" alt="Award 2"
                        class="w-full h-[350px] object-cover transform group-hover:scale-105 transition duration-300">
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-900 leading-snug">
                        MATIN SPINNING MILLS PLC, A CONCERN OF DBL GROUP, WON THE SILVER AWARD AT THE 13TH ICMAB BEST CORPORATE AWARD 2022
                    </h3>
                    <p class="text-green-500 font-semibold text-sm mt-2">2023–11–08</p>
                </div>
            </div>

        
            <div class="group">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ asset('images/award3.jpg') }}" alt="Award 3"
                        class="w-full h-[350px] object-cover transform group-hover:scale-105 transition duration-300">
                </div>
                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-gray-900 leading-snug">
                        MATIN SPINNING MILLS PLC ACHIEVED GOLD AWARD AT THE 10TH ICSB NATIONAL AWARD 2022
                    </h3>
                    <p class="text-green-500 font-semibold text-sm mt-2">2023–10–15</p>
                </div>
            </div>
        </div>

     
        <div class="flex justify-start mt-12">
            <a href="{{ url('/awards') }}"
                class="inline-flex items-center border border-gray-300 px-6 py-3 rounded-md text-gray-800 font-medium hover:bg-gray-100 transition">
                View All Awards
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </section> -->


</section>

@endsection