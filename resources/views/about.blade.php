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
    <div class="max-w-5xl mx-auto mb-10">
        <p class="mb-6">
            <strong>DBL Group</strong> is a family owned business which started in 1991. 
            The first company was named <strong>Dulal Brothers Limited</strong>. Over the years, 
            the organization evolved into a diversified conglomerate in Bangladesh. 
            The businesses include Apparel, Textiles, Textile Printing, Washing, 
            Garments Accessories, Packaging, Ceramic Tiles, Pharmaceuticals, 
            Dredging, Retail, and Digital Transformation Services.
        </p>
        <p>
            UN Development Program Business Call to Action has recognized our activities 
            to be aligned with UN Sustainable Development Goals. In addition to working 
            with international development organizations such as CARE, DEG, IFC, GIZ, ILO, 
            and UNICEF, DBL has a diverse set of sustainability programs.
        </p>
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
</section>

@endsection
