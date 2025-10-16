<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Zan Limited')</title>
    {{-- favicon here 
     --}}
    <link rel="icon" type="image/png" href="{{ asset('/images/zan-logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.6/umd/heroicons.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
    {{-- font use  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Serif+Bengali:wght@100..900&display=swap"
        rel="stylesheet">
    <style>
        .swiper,
        .swiper-wrapper,
        .swiper-slide {
            height: auto;
        }

        html {
            scroll-behavior: smooth;
        }

        .menu-icon {
            opacity: 0;
            animation: logo 1s ease-in-out .5s forwards;
        }

        @keyframes logo {
            0% {
                transform: translateX(0);
                opacity: 0;
            }

            100% {
                transform: translateX(100px);
                /* or use % if it's inside a container */
                opacity: 1;
            }
        }

        .menu-item {
            opacity: 0;
            transform: translateY(50px);
            animation: slideIn 0.5s ease forwards;
            animation-delay: calc(var(--i) * 0.2s);
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .home-header {
            opacity: 0;
            animation: homeHeader 1s ease-in-out .5s forwards;
        }

        @keyframes homeHeader {
            0% {
                transform: translateY(-100px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .home-second {
            opacity: 0;
            animation: homeHeader1 1s ease-in-out .5s forwards;
        }

        @keyframes homeHeader1 {
            0% {
                transform: translateX(100px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .delay-1 {
            position: relative;
        }



        .delay-1:hover::before {
            width: 100%;
        }

        .delay-12::before {
            content: "";
            position: absolute;
            top: 0;
            height: 2px;
            width: 100%;
            background: #fb923c;
        }

        .transition-transform {
            transition: transform 0.3s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
        }
    </style>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- .delay-1::before {
            content: "";
            position: absolute;

            left: 50%;
            transform: translateX(-50%);
            height: 2px;
            width: 0;
            background: #fb923c;
            transition: width 0.4s ease-in-out;

        } -->


</head>

<body class=" text-gray-800 font-[Montserrat]">
    {{-- Navbar --}}
    <div id="navbar "

        class="fixed top-0 w-full   left-0 right-0 text-white z-50  transition-all duration-500 ease-in-out bg-[#4b87aefc]  ">
        <nav id="navbar" class="md:px-20   w-full px-6">
            <!-- Top bar -->
            <div class="w-full flex items-center justify-between">
                <!-- Logo on the left -->
                <a href='#home' class="flex-shrink-0">
                    <img src="/images/zan-logo.png" alt="Logo" class="h-16 md:h-20 w-auto" />
                </a>

                <!-- Hamburger/Cross button on the right (mobile only) -->
                <div class="md:hidden flex-shrink-0">
                    <button id="menu-toggle" class="focus:outline-none">
                        <svg id="menu-open-icon" class="w-6 h-6 block" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop menu -->
                <!-- <ul id="navMenu" class="hidden md:flex md:space-x-6 text-sm menu-slide relative">
                    <li class="menu-item delay-1" style="--i: 1">
                        <a href="#home" class="text-orange-400 text-lg font-bold font-bengali">Home</a>
                    </li>


                    <li class="menu-item delay-700 relative" style="--i: 2" id="about-menu">
                        <a href="" class="text-white hover:text-orange-400 text-lg font-bold pb-20">About</a>

                       
                        <div class="absolute left-0 mt-2 w-52 bg-white !text-black rounded shadow-lg
        opacity-0 invisible transition-opacity duration-300 z-50"
                            id="about-popup">
                            <ul class="p-0 m-0">
                                <li class="block border-b border-gray-200">
                                    
                                     <a href="{{ url('/about') }}" class="block px-4 py-4 hover:bg-orange-100 !text-black">About Us</a>
                                </li>
                                <li class="block border-b border-gray-200">
                                    <a href="#history" class="block px-4 py-4 hover:bg-orange-100 !text-black">History</a>
                                </li>
                                <li class="block">
                                    <a href="#mission" class="block px-4 py-4 hover:bg-orange-100 !text-black">Mission</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="menu-item delay-1" style="--i: 3">
                        <a href="#service" class="text-white hover:text-orange-400 text-lg font-bold">Services</a>
                    </li>

                    <li class="menu-item delay-1" style="--i: 4">
                        <a href="#contact" class="text-white hover:text-orange-400 text-lg font-bold">Contact</a>
                    </li>
                </ul> -->
                <!-- <ul id="navMenu" class="hidden md:flex md:space-x-6 text-sm menu-slide relative">
                  
                    <li class="menu-item delay-1" style="--i: 1">
                        <a href="{{ url('/#home') }}" class="!text-orange-400 text-lg font-bold font-bengali">Home</a>
                    </li>

                   
                    <li class="menu-item delay-700 relative" style="--i: 2" id="about-menu">
                        <a href="{{ url('/about') }}" class="text-white hover:text-orange-400 text-lg font-bold pb-20">About</a>

                      
                        <div class="absolute left-0 mt-2 w-52 bg-white !text-black rounded shadow-lg
        opacity-0 invisible transition-opacity duration-300 z-50" id="about-popup">
                            <ul class="p-0 m-0">
                                <li class="block border-b border-gray-200">
                                    <a href="{{ url('/about#about-us') }}" class="block px-4 py-4 hover:bg-orange-100 !text-black">About Us</a>
                                </li>
                                <li class="block border-b border-gray-200">
                                    <a href="{{ url('/about#history') }}" class="block px-4 py-4 hover:bg-orange-100 !text-black">History</a>
                                </li>
                                <li class="block">
                                    <a href="{{ url('/about#mission') }}" class="block px-4 py-4 hover:bg-orange-100 !text-black">Mission</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                 
                    <li class="menu-item delay-1" style="--i: 3">
                        <a href="{{ url('/#service') }}" class="text-white hover:text-orange-400 text-lg font-bold">Services</a>
                    </li>

                    <li class="menu-item delay-1" style="--i: 4">
                        <a href="{{ url('/#contact') }}" class="text-white hover:text-orange-400 text-lg font-bold">Contact</a>
                    </li>
                </ul> -->
                <ul id="navMenu" class="hidden md:flex md:space-x-6 text-sm menu-slide relative">
                    <!-- HOME -->
                    <li class="menu-item delay-1" style="--i: 1">

                        <a href="{{ url('/') }}"
                            class="text-lg font-bold font-bengali {{ request()->is('/') ? '' : 'text-white ' }}">
                            Home
                        </a>
                    </li>

                    <!-- ABOUT with Popup -->
                    <li class="menu-item delay-700 relative" style="--i: 2" id="about-menu">
                        <a href="{{ url('/about') }}"

                            class="text-lg font-bold pb-12 {{ request()->is('') ? '' : 'text-white ' }} ">
                            About
                        </a>

                        <!-- Popup -->
                        <div class="absolute left-0 mt-2 w-52 bg-white !text-black rounded shadow-lg
        opacity-0 invisible transition-opacity duration-300 z-50" id="about-popup">
                            <ul class="p-0 m-0">
                                <li class="block border-b border-gray-200">

                                    <a href="{{ url('/about#about-us') }}"

                                        class="block px-4 py-4 hover:bg-orange-100 !text-black {{ request()->is('about') ? 'font-semibold text-orange-500' : '' }}">
                                        About Us
                                    </a>
                                </li>
                                <li class="block border-b border-gray-200">
                                    <a href="#mission-vision"
                                        class="block px-4 py-4 hover:bg-orange-100 !text-black {{ request()->is('about') ? 'font-semibold text-orange-500' : '' }}">
                                        Mission, Vision & Value
                                    </a>
                                </li>
                                <li class="block">
                                    <a href="#directors"
                                        class="block px-4 py-4 hover:bg-orange-100 !text-black {{ request()->is('about') ? 'font-semibold text-orange-500' : '' }}">
                                        Board Of Directors
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- SERVICES -->
                    <li class="menu-item delay-1" style="--i: 3">
                        <a href="{{ url('/#service') }}"
                            class="text-lg font-bold {{ request()->is('/#service') ? 'text-white ' : 'text-white ' }}">
                            Services
                        </a>
                    </li>

                    <!-- CONTACT -->
                    <li class="menu-item delay-1">
                        <a href="{{ url('/#contact') }}"
                            class="text-lg font-bold {{ request()->is('/') ? 'text-white ' : 'text-white ' }}">
                            Contact
                        </a>
                    </li>
                </ul>



            </div>
            <!-- Mobile Menu -->
            <ul id="menu" class="hidden bg-[#394257] rounded-lg flex-col mt-4 space-y-4 md:hidden text-sm p-6">
                <li><a href="{{ url('/') }}" class="text-orange-400 font-medium menu-link">Home</a></li>
                <li><a href="{{ url('/about#about-us') }}" class="text-white hover:text-orange-400 menu-link">About</a></li>
                <li><a href="#service" class="text-white hover:text-orange-400 menu-link">Services</a></li>
                <li><a href="#contact" class="text-white hover:text-orange-400 menu-link">Contact</a></li>
            </ul>

        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const aboutMenu = document.getElementById('about-menu');
            const aboutPopup = document.getElementById('about-popup');

            // Popup শুরুতে top-16
            aboutPopup.style.top = "4rem"; // top-16 = 4rem
            aboutPopup.style.transition = "top 1s ease";

            const showPopup = () => {
                aboutPopup.style.top = "3rem"; // top-12 = 3rem
            };

            const hidePopup = () => {
                aboutPopup.style.top = "4rem"; // top-16 = 4rem
            };

            aboutMenu.addEventListener('mouseenter', showPopup);
            aboutPopup.addEventListener('mouseenter', showPopup);

            aboutMenu.addEventListener('mouseleave', (e) => {
                const toElement = e.relatedTarget || e.toElement;
                if (!aboutPopup.contains(toElement)) hidePopup();
            });

            aboutPopup.addEventListener('mouseleave', (e) => {
                const toElement = e.relatedTarget || e.toElement;
                if (!aboutMenu.contains(toElement)) hidePopup();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.querySelector('nav'); // পুরো navbar ধরলাম
            const aboutMenu = document.getElementById('about-menu');
            const aboutPopup = document.getElementById('about-popup');

            const showPopup = () => {
                aboutPopup.classList.remove('opacity-0', 'invisible');
                aboutPopup.classList.add('opacity-100', 'visible');
            };

            const hidePopup = () => {
                aboutPopup.classList.remove('opacity-100', 'visible');
                aboutPopup.classList.add('opacity-0', 'invisible');
            };

            // Show popup when hovering about or popup
            aboutMenu.addEventListener('mouseenter', showPopup);
            aboutPopup.addEventListener('mouseenter', showPopup);

            // Hide popup only when leaving navbar entirely
            navbar.addEventListener('mouseleave', (e) => {
                hidePopup();
            });

            // Optional smooth hover
            aboutMenu.addEventListener('mouseleave', (e) => {
                const toElement = e.relatedTarget || e.toElement;
                if (!aboutPopup.contains(toElement)) {
                    hidePopup();
                }
            });
        });
    </script>

    {{-- navbar scrolling function code here  --}}
    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.getElementById("navbar");
            if (window.scrollY > 20) {
                navbar.classList.remove("bg-transparent");
                navbar.classList.add("bg-[#4b87aefc]");


            } else {
                navbar.classList.remove("bg-[#4b87aefc]");
                navbar.classList.add("bg-transparent");
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const navLinks = document.querySelectorAll('#navMenu a, #menu a');
            const sections = document.querySelectorAll('section[id]');
            const offset = 100;

            const menuToggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');
            const openIcon = document.getElementById('menu-open-icon');
            const closeIcon = document.getElementById('menu-close-icon');

            function setActiveLink(currentId) {
                navLinks.forEach(link => {
                    const href = link.getAttribute('href').replace('#', '');

                    if (href === currentId) {
                        history.replaceState(null, null, `#${href}`);
                        link.classList.add('text-orange-400');
                        link.classList.add('delay-12');
                        link.classList.remove('text-white');
                    } else {
                        link.classList.remove('delay-12');
                        link.classList.remove('text-orange-400');
                        link.classList.add('text-white');
                    }
                });
            }

            function onScroll() {
                const scrollPos = window.scrollY + offset;
                let current = '';

                sections.forEach(section => {
                    const top = section.offsetTop;
                    const height = section.offsetHeight;
                    if (scrollPos >= top && scrollPos < top + height) {
                        current = section.id;
                    }
                });

                if (current) {
                    setActiveLink(current);
                }
            }

            // Toggle mobile menu open/close
            menuToggle.addEventListener('click', () => {
                const isOpen = !menu.classList.contains('hidden');

                if (isOpen) {
                    menu.classList.add('hidden');
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    menu.classList.remove('hidden');
                    openIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            });

            // Close menu on mobile link click
            document.querySelectorAll('.menu-link').forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                });
            });

            // Scroll event
            window.addEventListener('scroll', onScroll);
            onScroll(); // Initial call

            // Highlight on page load if hash exists
            if (window.location.hash) {
                const idFromHash = window.location.hash.replace('#', '');
                setTimeout(() => setActiveLink(idFromHash), 100);
            }
        });
    </script>

    <!-- -------- -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const aboutToggle = document.getElementById("about-toggle");
            const aboutDropdown = document.getElementById("about-dropdown");
            const aboutArrow = document.getElementById("about-arrow");

            aboutToggle.addEventListener("click", (e) => {
                e.preventDefault();
                aboutDropdown.classList.toggle("hidden");
                aboutArrow.classList.toggle("rotate-180");
            });

            // যখন dropdown এর কোনো লিংকে ক্লিক হবে → dropdown বন্ধ হবে
            aboutDropdown.querySelectorAll("a").forEach(link => {
                link.addEventListener("click", () => {
                    aboutDropdown.classList.add("hidden");
                    aboutArrow.classList.remove("rotate-180");
                });
            });
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                new Swiper('.testimonials-swiper', {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 20,
                    autoplay: {
                        delay: 2000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 3,
                        },
                    },
                });
            }, 100);
        });
    </script>

    <script>
        // Wait for the page to fully load before running the script
        document.addEventListener('DOMContentLoaded', () => {
            // Select all the details elements with class 'faq-item'
            document.querySelectorAll('details.faq-item').forEach((el) => {
                const content = el.querySelector('.faq-content');
                el.addEventListener('toggle', () => {
                    if (el.open) {
                        // When the details are open, set max-height to the scrollHeight of the content
                        content.style.maxHeight = content.scrollHeight + 'px';
                    } else {
                        // When the details are closed, reset max-height to 0
                        content.style.maxHeight = '0px';
                    }
                });

                // Ensure the correct height when page is loaded with any opened details
                if (el.open) {
                    content.style.maxHeight = content.scrollHeight + 'px';
                }
            });
        });
    </script>




    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ========== Service Filter with AOS Animation ========== //
            function filterServices(categoryId) {
                console.log('Category ID:', categoryId);

                fetch(`/services/filter?category=${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Filtered services:', data.services);

                        const servicesGrid = document.getElementById('services-grid');
                        servicesGrid.innerHTML = '';

                        if (data.services.length > 0) {
                            const animations = ['fade-up', 'zoom-in', 'flip-left', 'fade-down', 'zoom-out',
                                'flip-right'
                            ];

                            data.services.forEach((service, index) => {
                                const serviceItem = document.createElement('div');
                                serviceItem.className =
                                    'service-item bg-white shadow-md p-8 rounded-lg hover:shadow-lg transition';
                                serviceItem.setAttribute('data-category', service.category_id);
                                serviceItem.setAttribute('data-aos', animations[index % animations
                                    .length]);

                                serviceItem.innerHTML = `
                                <div class="mb-4">
                                    <img src="${service.image}" alt="${service.name}" class="mx-auto object-cover w-24" />
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">${service.name}</h3>
                                <p class="text-base text-gray-800">${service.description}</p>
                            `;

                                servicesGrid.appendChild(serviceItem);
                            });

                            // Refresh AOS to apply animations
                            AOS.refresh();
                        } else {
                            servicesGrid.innerHTML =
                                '<p class="text-gray-500 col-span-full">No services found in this category.</p>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching services:', error);
                    });
            }

            document.querySelectorAll('.category-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    const categoryId = event.target.getAttribute('data-category-id');
                    filterServices(categoryId);
                });
            });

            // ========== Counter Section Animation ========== //
            const counters = document.querySelectorAll('.counter');
            let started = false;

            function startCounters() {
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        const increment = Math.ceil(target / 100);

                        if (count < target) {
                            counter.innerText = count + increment;
                            setTimeout(updateCount, 20);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            }

            const section = document.querySelector('#counter-section');
            if (section) {
                const observer = new IntersectionObserver(entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !started) {
                            startCounters();
                            started = true;
                        }
                    });
                }, {
                    threshold: 0.5
                });

                observer.observe(section);
            }

            // Initialize AOS once DOM is loaded
            AOS.init({
                duration: 800,
                once: true
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-button');
            const servicesGrid = document.getElementById('services-grid');
            const allServiceData = Array.from(servicesGrid.querySelectorAll('.service-card'));

            const animations = ['fade-up', 'zoom-in', 'flip-left', 'fade-down', 'zoom-out', 'flip-right'];

            categoryButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const selectedCategoryId = this.getAttribute('data-category-id');

                    // Highlight the selected category
                    categoryButtons.forEach(btn => btn.classList.remove('text-orange-500', 'bg-gray-200'));
                    this.classList.add('text-orange-500', 'bg-gray-200');

                    // Filter services
                    const filteredCards = selectedCategoryId === 'null' ?
                        allServiceData :
                        allServiceData.filter(card => card.classList.contains(selectedCategoryId));

                    // Clear the grid and re-add filtered items with animation
                    servicesGrid.innerHTML = '';
                    filteredCards.forEach((card, index) => {
                        const clonedCard = card.cloneNode(true);
                        clonedCard.setAttribute('data-aos', animations[index % animations
                            .length]);
                        servicesGrid.appendChild(clonedCard);
                    });

                    // Re-init AOS to animate new cards
                    AOS.refreshHard();
                });
            });
        });
    </script>



    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
            once: true, // Only animate once on scroll
        });
    </script>

    <footer class=" mt-5">
        <div class="max-w-7xl mx-auto px-6 md:grid md:grid-cols-3 gap-10">
            <div class="">
                <div class="text-2xl font-bold"><img src="/images/zan-logo.png" alt="Logo"
                        class="h-12 md:h-16 w-auto"></div>
                <p class="text-sm mb-6">
                    Empowering Everyday Needs – From Stationery to Software.
                </p>

                <div class="flex space-x-4">
                    <!-- Facebook Icon -->
                    <div> <a href="https://www.facebook.com/zanvisionlabs" target="blank"
                            class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-full hover:bg-orange-400 hover:text-white transition">
                            <svg class="p-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M512 256C512 114.6 397.4 0 256 0S0 114.6 0 256C0 376 82.7 476.8 194.2 504.5V334.2H141.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H287V510.1C413.8 494.8 512 386.9 512 256h0z" />
                            </svg>
                        </a></div>

                    <!-- LinkedIn Icon -->
                    <div> <a href="https://www.linkedin.com/company/zan-vision-labs/posts/?feedView=all" target="blank"
                            class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded-full hover:bg-orange-400 hover:text-white transition">
                            <svg class="p-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                            </svg>
                        </a></div>

                    <!-- Twitter Icon -->
                    <div> <a href="https://x.com/zan_vision_labs" target="blank"
                            class="w-10 h-10  flex items-center justify-center border border-gray-300 rounded-full hover:bg-orange-400 hover:text-white transition">
                            <svg class="p-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <path
                                    d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                            </svg>
                        </a></div>
                </div>

            </div>

            <!-- Useful Links -->
            <div class="">
                <h4 class="text-lg font-semibold text-gray-900 mb-4 col-span-2 mt-2 md:mt-0">
                    Useful Links
                </h4>
                <ul class="space-y-1 text-sm">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#about" class="hover:underline">About us</a></li>
                    <li><a href="#service" class="hover:underline">Services</a></li>
                    <li><a href="#contact" class="hover:underline">Contact</a></li>
                </ul>
            </div>

            <!-- Our Services -->


            <!-- Contact Us -->
            <div class="">
                <h4 class="text-lg font-semibold text-gray-900 mb-4 mt-2 md:mt-0">
                    Contact Us
                </h4>
                <ul class="text-sm space-y-1">
                    <li>13-B/3B, Block-B,</li>
                    <li> Babar Road, Mohammadpur, </li>
                    <li>Dhaka 1207, Bangladesh</li>
                    <li class="mt-2">
                        <span class="font-semibold">Phone:</span>+880 01615645843
                    </li>
                    <li><span class="font-semibold">Email:</span>info@zan.com.bd</li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-10 bg-gray-200 py-4">
            <div class="text-center text-sm text-gray-600">
                © Copyright <span class="font-bold text-gray-900">ZAN</span> All
                Rights Reserved <br />
                Designed by
                <a href="https://zanvisionlabs.com/" class="text-orange-500 hover:underline">ZAN Vision Labs</a>
            </div>
        </div>
    </footer>


</body>

</html>