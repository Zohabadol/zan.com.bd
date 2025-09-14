@extends('layouts.app') {{-- Replace with your main layout --}}

@section('content')
    <style>
        .innovation {
            opacity: 0;
            transform: translateX(100px);
            animation: slideIn 0.7s ease forwards;
            animation-delay: calc(var(--i) * 0.2s);
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        } 
        .innovation-img {
            opacity: 0;
            transform: translateX(-100px);
            animation: slideIn-img 1.4s ease forwards;
        }

        @keyframes slideIn-img {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
    @if ($banners->isNotEmpty())
          <section id="home"
    class="relative flex aspect-video flex-col items-center justify-center text-center text-white w-full object-fit overflow-hidden">

    <!-- Banner Image -->
    <img
        src="{{ asset($banners[0]->image) }}"
        alt="{{ $banners[0]->name }}"
        class="absolute inset-0 w-full h-full object-cover"
    />

    <!-- Blue overlay -->
    <div class="absolute inset-0 bg-blue-950 bg-opacity-60"></div>

    <!-- Content above the overlay -->
    <div class="relative px-2 z-10">
        <h1 class="text-3xl md:text-5xl font-semibold md:font-bold mb-4 home-header">
            {{ $banners[0]->name }}
        </h1>
        <p class="text-xl mb-8 home-second">
            {{ $banners[0]->short_content }}
        </p>
    </div>
</section>

    @endif


<style>
  .marquee-wrapper {
    overflow: hidden;
    position: relative;
    background-color: #fff;
    padding: 1rem 0;
    border-radius: 0.5rem 0 0 0.5rem;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 100%;
  }

  .marquee-track {
    display: flex;
    gap: 8rem;
    align-items: center;
    white-space: nowrap;
    animation: scroll-left 30s linear infinite;
  }

  .marquee-wrapper:hover .marquee-track {
    animation-play-state: paused;
  }

  @keyframes scroll-left {
    from {
      transform: translateX(0);
    }
    to {
      transform: translateX(-100%);
    }
  }

  .marquee-inner {
    display: flex;
    flex-shrink: 0;
    min-width: 100%;
    gap: 16rem;
  }
</style>

<div class="marquee-wrapper absolute bottom-0 right-0 w-full">
  <div class="marquee-track">
    <div class="marquee-inner">
      @foreach ($clients as $client)
        <img src="{{ asset($client->image) }}" alt="{{ $client->name }}"
             class="h-16 w-auto grayscale hover:grayscale-0 transition duration-300" />
      @endforeach
    </div>
    <div class="marquee-inner">
      @foreach ($clients as $client)
        <img src="{{ asset($client->image) }}" alt="{{ $client->name }}"
             class="h-16 w-auto grayscale hover:grayscale-0 transition duration-300" />
      @endforeach
    </div>
  </div>
</div>









    <section id="about" class=" mx-5 md:mx-20 lg:mx-24  pt-20">
        <!-- Main Content -->
        <div {{-- id="animatedElement" --}} class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="innovation-img">
                <img src="https://bootstrapmade.com/content/demo/Baker/assets/img/about.jpg" alt="Team working"
                    class="rounded-md w-full py-2 md:p-4" />
            </div>

            <div class="innovation">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4 kk innovation" style="--i:1">
                   Our Expertise

                </h2>
                <p class="text-gray-500 mb-6 innovation" style="--i:2">
                    ZAN, we bring together smart technology, trusted products, and easy online shopping to make life easier for our customers. From building software to selling quality goods and sourcing products worldwide, we’re here to help businesses and people succeed.

                </p>

                <div class="mb-4 flex items-start gap-4 innovation" style="--i:3">
                   <div class="bg-orange-400 text-white p-2 rounded">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16 18l6-6-6-6M8 6l-6 6 6 6" />
  </svg>
</div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            IT Solutions & Software Development
                        </h3>
                        <p class="text-gray-500 text-sm">
                            At ZAN Vision Labs, we build smart software and websites that help businesses work better and grow faster. Our team makes sure the technology is easy to use and fits each client’s needs.

                        </p>
                    </div>
                </div>

                <div class="mb-4 flex items-start gap-4 innovation" style="--i:4">
                   <div class="bg-orange-400 text-white p-2 rounded">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6h13m-11 0a1 1 0 100 2 1 1 0 000-2zm10 0a1 1 0 100 2 1 1 0 000-2z" />
  </svg>
</div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            E-commerce

                        </h3>
                        <p class="text-gray-500 text-sm">
                           ZAN Mart sources quality products in bulk from local & global suppliers and offers them at competitive prices through our online store. We make it easy for customers across Bangladesh to find what they need, right at their fingertips.

                        </p>
                    </div>
                </div>

                <div class="mb-6 flex items-start gap-4 innovation" style="--i:5">
                    <div class="bg-orange-400 text-white p-2 rounded">
  <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round"
          d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0c2.21 0 4 4.48 4 10s-1.79 10-4 10-4-4.48-4-10 1.79-10 4-10zm-8 10h16" />
  </svg>
</div>

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                           Import & International Trade

                        </h3>
                        <p class="text-gray-500 text-sm">
                           ZAN Mart sources quality products in bulk from local & global suppliers and offers them at competitive prices through our online store. We make it easy for customers across Bangladesh to find what they need, right at their fingertips.

                        </p>
                    </div>
                </div>

                <p class="text-gray-500 text-sm py-2 innovation" style="--i:6">
                   At ZAN, we blend technology, transparency, and trust to create long-lasting partnerships. Whether you're looking for a reliable tech partner, sourcing solutions, or a trusted retail platform, ZAN is your dependable choice for excellence and reliability.
	

                </p>
            </div>

        </div>
    </section>

    <section id="service" class="pt-20 bg-white text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Services</h2>

        <div class="w-20 h-1 bg-orange-500 mx-auto mb-4"></div>

        <p class="text-sm text-gray-500 max-w-xl mx-auto mb-12 px-2 mt-3">
          From stationery to custom software Devolopment and e-commerce solutions — ZAN Limited delivers quality, reliability, and value through its diverse business wings.
        </p>


        <!-- Category Filter Buttons -->
        {{-- 
<div class="justify-center hidden md:flex space-x-4 mb-10">
    <a href="#"
        class="category-button border rounded-lg px-2 text-lg font-semibold {{ empty($categoryId) ? 'text-orange-500 bg-gray-200' : 'text-gray-800' }} hover:text-orange-600 hover:bg-gray-200"
        data-category-id="null">
        ALL
    </a>
    @foreach ($categories as $category)
        <a href="#"
            class="category-button border rounded-lg px-2 text-lg font-semibold {{ $categoryId == $category->id ? 'text-orange-500 bg-gray-200 ' : 'text-gray-800  ' }} hover:text-orange-600 hover:bg-gray-200"
            data-category-id="{{ $category->id }}">
            {{ strtoupper($category->name) }}
        </a>
    @endforeach
</div>
--}}


        <!-- Services Grid -->
        <div id="services-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 md:px-16">
            @foreach ($services as $index => $service)
                @php
                    $animations = ['fade-up', 'zoom-in', 'flip-left', 'fade-down', 'zoom-out', 'flip-right'];
                    $animation = $animations[$index % count($animations)];
                @endphp
                <div class="service-card bg-white shadow-md p-8 rounded-lg hover:shadow-lg transition {{ $service->category_id }}"
                    data-aos="{{ $animation }}">
                    <div class="mb-4">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name }}"
                            class="mx-auto object-cover w-24" />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $service->name }}</h3>
                    <p class="text-base text-gray-800">{{ $service->description }}</p>
                </div>
            @endforeach
        </div>

    </section>

    <section id="counter-section" class="mt-5">
        <div class="grid grid-cols-2 md:flex md:justify-evenly md:items-center flex-wrap gap-6 py-10 bg-[#e9ecef]">
            <div class="text-center">
                <span class="counter text-4xl font-bold text-gray-600" data-target="232">0</span>
                <p class="text-gray-600 mt-2">Clients</p>
            </div>
            <div class="text-center">
                <span class="counter text-4xl font-bold text-gray-600" data-target="521">0</span>
                <p class="text-gray-600 mt-2">Projects</p>
            </div>
            <div class="text-center">
                <span class="counter text-4xl font-bold text-gray-600" data-target="1477">0</span>
                <p class="text-gray-600 mt-2">Hours of Support</p>
            </div>
            <div class="text-center">
                <span class="counter text-4xl font-bold text-gray-600" data-target="32">0</span>
                <p class="text-gray-600 mt-2">Workers</p>
            </div>
        </div>
    </section>



    <!-- Testimonials Section -->
    <section id="" class="pt-20 pb-5 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Testimonials</h2>
            <span class="block h-1 w-16 bg-orange-500 mx-auto mb-4"></span>
            <p class="text-gray-600 mb-12">What our clients are saying</p>

            <!-- Swiper -->
            <div class="swiper testimonials-swiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="bg-gray-100 p-10   rounded-lg relative mx-4">
                                <p class="text-gray-600 italic mb-6 relative group">
                                    <span class="text-2xl text-orange-500 leading-none">“</span>
                                    <span class="line-clamp-3">
                                        {{ $testimonial->comment  }}
                                    </span>
                                    <span class="text-2xl text-orange-500 leading-none">”</span>

                                    <!-- Tooltip showing full comment on hover -->
                                    <span
                                        class="absolute hidden group-hover:block bg-white text-gray-800 text-sm p-3 border border-gray-300 shadow-lg z-10 w-64 top-full mt-2 left-0">
                                        {{ $testimonial->comment }}
                                    </span>
                                </p>


                                <div class="flex flex-col items-center">
                                    <img src="{{ asset($testimonial->profile) }}" alt="{{ $testimonial->name }}"
                                        class="w-16 h-16 rounded-full mb-3" />
                                    <h4 class="font-bold text-gray-800">{{ $testimonial->name }}</h4>
                                    <p class="text-gray-500 text-sm">{{ $testimonial->designation }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>
    </section>




    <!-- JS for smooth open/close animation -->
    <div class="bg-gray-100 p-6 text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Frequently Asked Questions (FAQs)</h2>
        <div class="w-20 h-1 bg-orange-500 mx-auto mb-4"></div>
        <p class="text-gray-500 mb-12">
            Find answers to common questions about ZAN Limited’s services, operations, and support.
        </p>

        <div class="max-w-4xl mx-auto space-y-2">
            <!-- FAQ Item 1 -->
            <details class="faq-item group border rounded-lg bg-white p-4 open:bg-orange-50">
                <summary
                    class="flex justify-between items-center cursor-pointer font-medium text-gray-700 group-open:text-orange-600 list-none appearance-none [&::-webkit-details-marker]:hidden">
                    <span>What services does ZAN Limited offer?</span>
                    <span class="transform group-open:rotate-90 transition-transform">➔</span>
                </summary>
                <div class="faq-content overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <p class="mt-3 text-gray-600 text-start m-0">
                       ZAN Limited imports and sells stationery products under the “Favorite” brand. Its sister companies provide IT solutions (ZAN Vision Labs) and online retail of gadgets and lifestyle products (ZAN Mart).

                    </p>
                </div>
            </details>

            <!-- FAQ Item 2 -->
            <details class="faq-item group border rounded-lg bg-white p-4 open:bg-orange-50">
                <summary
                    class="flex justify-between items-center cursor-pointer font-medium text-gray-700 group-open:text-orange-600 list-none appearance-none [&::-webkit-details-marker]:hidden">
                    <span>What is ZAN Vision Labs?
</span>
                    <span class="transform group-open:rotate-90 transition-transform">➔</span>
                </summary>
                <div class="faq-content overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <p class="mt-3 text-gray-600 text-start m-0">
  ZAN Vision Labs is a professional software company specializing in IT solutions, custom software development, web development, and e-commerce platform services. Whether you need a tailored software solution or want to learn more about Zan Vision Labs, please visit 
  <a class="text-blue-500" href="https://zanvisionlabs.com" target="_blank" rel="noopener noreferrer">zanvisionlabs.com</a>.
</p>

                </div>
            </details>

            <!-- FAQ Item 3 -->
            <details class="faq-item group border rounded-lg bg-white p-4 open:bg-orange-50">
                <summary
                    class="flex justify-between items-center cursor-pointer font-medium text-gray-700 group-open:text-orange-600 list-none appearance-none [&::-webkit-details-marker]:hidden">
                    <span>What kind of products do you sell on e-commerce platforms ( ZAN Mart )?
</span>
                    <span class="transform group-open:rotate-90 transition-transform">➔</span>
                </summary>
                <div class="faq-content overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                  <p class="mt-3 text-gray-600 text-start m-0">
  Our e-commerce platform, <strong>ZAN Mart</strong>, offers a wide range of items including electronics, gadgets, home appliances, and lifestyle products—all sourced directly from trusted local and international suppliers. If you want to learn more about Zan Vision Labs, please visit 
  <a class="text-blue-500" href="https://zanvisionlabs.com" target="_blank" rel="noopener noreferrer">zanvisionlabs.com</a>.
</p>

                </div>
            </details>

            <!-- FAQ Item 4 -->
            <details class="faq-item group border rounded-lg bg-white p-4 open:bg-orange-50">
                <summary
                    class="flex justify-between items-center cursor-pointer font-medium text-gray-700 group-open:text-orange-600 list-none appearance-none [&::-webkit-details-marker]:hidden">
                    <span>Does ZAN Limited manufacture stationery products?
</span>
                    <span class="transform group-open:rotate-90 transition-transform">➔</span>
                </summary>
                <div class="faq-content overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                    <p class="mt-3 text-gray-600 text-start m-0">
                       No, ZAN Limited imports stationery products but sells them under their own brand "Favorite."

                    </p>
                </div>
            </details>
            <details class="faq-item group border rounded-lg bg-white p-4 open:bg-orange-50">
                <summary
                    class="flex justify-between items-center cursor-pointer font-medium text-gray-700 group-open:text-orange-600 list-none appearance-none [&::-webkit-details-marker]:hidden">
                    <span>How can I contact ZAN Limited or its sister companies?

</span>
                    <span class="transform group-open:rotate-90 transition-transform">➔</span>
                </summary>
                <div class="faq-content overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                  <p class="mt-3 text-gray-600 text-start m-0">
  You can easily get in touch through their official websites: 
  <a class="text-blue-500 " href="https://zan.com.bd" target="_blank">zan.com.bd</a>, 
  <a class="text-blue-500 " href="https://zanvisionlabs.com" target="_blank">zanvisionlabs.com</a>, and
  <a class="text-blue-500 " href="https://zanmart.com.bd" target="_blank">zanmart.com.bd</a>.
</p>

                </div>
            </details>
        </div>
    </div>


    <section id="contact" class="pt-20  px-6">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-900">Contact</h2>
            <div class="w-20 h-1 bg-orange-500 mx-auto my-2"></div>
            <p class="text-gray-500 max-w-2xl mx-auto">
                Have questions or need assistance? Get in touch with Zan Limited — we’re here to support your business
                through IT solutions, e-commerce services, and global importing.
            </p>

        </div>

        <div class="max-w-6xl mx-auto items-center grid md:grid-cols-3 gap-10">
            <div class="space-y-8">
                <div class="flex items-start space-x-4">
                    <div class="bg-orange-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                            <circle cx="12" cy="9" r="2.5" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Address</h4>
                        <p class="text-sm text-gray-600">
                            13-B/3B, Block-B, Babar Road, Mohammadpur, Dhaka 1207
                        </p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-orange-100 p-3 rounded-full">
                        <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path
                                d="M22 16.92V19a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 3 4.18 2 2 0 0 1 5 2h2.09a2 2 0 0 1 2 1.72c.1.81.27 1.6.52 2.36a2 2 0 0 1-.45 2.11L8 9a16 16 0 0 0 7 7l.81-.81a2 2 0 0 1 2.11-.45c.76.25 1.55.42 2.36.52a2 2 0 0 1 1.72 2.01z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Call Us</h4>
                        <p class="text-sm text-gray-600">+880 1615645843</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="bg-orange-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 text-orange-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-gray-900">Email Us</h4>
                        <p class="text-sm text-gray-600"> support@zanvisionlabs.com</p>
                    </div>
                </div>
            </div>

            <!-- Right Contact Form -->
            <div class="md:col-span-2">
                <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                    @csrf

                    <div class="flex flex-col md:flex-row gap-4">
                        <input type="text" name="name" placeholder="Your Name" required
                            class="w-full border rounded border-gray-300 p-3 focus:outline-none focus:ring-1 focus:ring-orange-400" />
                        <input type="email" name="email" placeholder="Your Email" required
                            class="w-full border rounded border-gray-300 p-3 focus:outline-none focus:ring-1 focus:ring-orange-400" />
                    </div>

                    <input type="text" name="subject" placeholder="Subject" required
                        class="w-full border rounded border-gray-300 p-3 focus:outline-none focus:ring-1 focus:ring-orange-400" />

                    <textarea name="message" placeholder="Message" rows="6" required
                        class="w-full border rounded border-gray-300 p-3 focus:outline-none focus:ring-1 focus:ring-orange-400"></textarea>

                    <div class="text-center">
                        <button type="submit"
                            class="bg-orange-400 hover:bg-orange-500 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                            Send Message
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
 
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
@endsection
