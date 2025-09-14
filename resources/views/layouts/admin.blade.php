<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-gray-100 font-sans">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-6 rounded-lg">
        <!-- Logo Section -->
        <div class="flex items-center mb-8">
            <a href="/"   > <img src="{{ asset('images/zan-logo.png') }}" alt="Zan Logo" class="w-12 h-12 mr-3"></a>

            
            <h3 class="text-2xl font-semibold text-gray-800">Admin Panel</h3>
        </div>

        <!-- Navigation Menu -->
        <nav class="space-y-2">

            <a href="{{ route('admin.banner.index') }}" class="block text-gray-700 bg-gray-200 hover:text-white hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-200 {{ request()->routeIs('admin.banner.index') ? 'bg-green-500 text-white' : '' }}"> Banners</a>

            <a href="{{ route('admin.category.index') }}" class="block text-gray-700 bg-gray-200 hover:text-white hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-200 {{ request()->routeIs('admin.category.index') ? 'bg-green-500 text-white' : '' }}"> Categories</a>

            <a href="{{ route('admin.services.index') }}" class="block text-gray-700 bg-gray-200 hover:text-white hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-200 {{ request()->routeIs('admin.services.index') ? 'bg-green-500 text-white' : '' }}"> Service</a>

            <a href="{{ route('admin.clients.index') }}" class="block text-gray-700 bg-gray-200 hover:text-white hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-200 {{ request()->routeIs('admin.clients.index') ? 'bg-green-500 text-white' : '' }}"> Clients</a>
 
            <a href="{{ route('admin.testimonial.index') }}" class="block text-gray-700 bg-gray-200 hover:text-white hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-200 {{ request()->routeIs('admin.testimonial.index') ? 'bg-green-500 text-white' : '' }}"> Testimonials</a>
            <a href="{{ route('admin.contact.index') }}" class="block text-gray-700 bg-gray-200 hover:text-white hover:bg-blue-600 py-2 px-4 rounded-lg transition duration-200 {{ request()->routeIs('admin.contact.index') ? 'bg-green-500 text-white' : '' }}"> Contact</a>
           
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</body>
</html>
