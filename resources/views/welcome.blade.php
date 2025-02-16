<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMCCO - Empowering Cooperative Members</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            --primary: #4f46e5;
            --secondary: #f59e0b;
        }
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .gradient-text {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hover-tilt {
            transition: transform 0.3s ease;
        }
        .hover-tilt:hover {
            transform: rotate(-2deg) scale(1.02);
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50">
    <header class="sticky top-0 z-50 border-b border-gray-100 bg-white/80 backdrop-blur-md">
        <nav class="container flex items-center justify-between px-6 py-4 mx-auto">
            <a href="#" class="text-2xl font-bold gradient-text">AANEMPC</a>

            <button id="mobile-menu-button" class="block p-2 text-indigo-600 md:hidden hover:text-indigo-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="items-center hidden space-x-6 md:flex">
                <nav class="flex items-center space-x-6">
                    <a href="#about-us" class="text-sm font-medium text-gray-500 transition-colors duration-200 hover:text-indigo-600 hover:underline hover:underline-offset-8 decoration-2">
                        About
                    </a>
                    <a href="#services" class="text-sm font-medium text-gray-500 transition-colors duration-200 hover:text-indigo-600 hover:underline hover:underline-offset-8 decoration-2">
                        Services
                    </a>
                    <a href="#members" class="text-sm font-medium text-gray-500 transition-colors duration-200 hover:text-indigo-600 hover:underline hover:underline-offset-8 decoration-2">
                        Members
                    </a>
                    <a href="#contact" class="text-sm font-medium text-gray-500 transition-colors duration-200 hover:text-indigo-600 hover:underline hover:underline-offset-8 decoration-2">
                        Contact
                    </a>
                </nav>

                <div class="w-px h-6 mx-2 bg-gray-200"></div>

                @if(!auth()->user())
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-medium text-indigo-600 transition-colors duration-200 rounded-lg hover:bg-indigo-50">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-medium text-white transition-all duration-200 rounded-lg shadow-sm bg-gradient-to-r from-indigo-600 to-indigo-500 hover:shadow-md hover:from-indigo-700 hover:to-indigo-600">
                        Register
                    </a>
                </div>
                @else
                <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 text-sm font-medium text-white transition-all duration-200 rounded-lg shadow-sm bg-gradient-to-r from-indigo-600 to-indigo-500 hover:shadow-md hover:from-indigo-700 hover:to-indigo-600">
                    Dashboard
                </a>
                @endif
            </div>

            <div id="mobile-menu" class="absolute left-0 right-0 hidden bg-white shadow-lg top-full md:hidden">
                <div class="flex flex-col items-center py-4 space-y-4">
                    <a href="#about-us" class="text-sm font-medium text-gray-500 hover:text-indigo-600 hover:underline">About</a>
                    <a href="#services" class="text-sm font-medium text-gray-500 hover:text-indigo-600 hover:underline">Services</a>
                    <a href="#members" class="text-sm font-medium text-gray-500 hover:text-indigo-600 hover:underline">Members</a>
                    <a href="#contact" class="text-sm font-medium text-gray-500 hover:text-indigo-600 hover:underline">Contact</a>

                    @if(!auth()->user())
                    <div class="flex flex-col items-center space-y-2">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Login</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Register</a>
                    </div>
                    @else
                    <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800">Dashboard</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <main>
        <section class="relative py-24 overflow-hidden">
            <div class="container px-6 mx-auto text-center">
                <div class="max-w-3xl mx-auto animate-fade-in">
                    <h1 class="mb-6 text-5xl font-bold text-gray-900">Empowering Your Financial Growth,<br><span class="gradient-text">Together</span></h1>
                    <p class="mb-8 text-xl text-gray-600">Join PEMCCO, where cooperation meets financial freedom.</p>
                    <div class="flex justify-center space-x-4">
                        <a href="#apply-now" class="px-8 py-4 font-medium text-white transition-all duration-300 bg-gradient-to-r from-indigo-600 to-indigo-500 rounded-xl hover:shadow-xl hover:-translate-y-1">
                            Join Now →
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="about-us" class="py-20 bg-white">
            <div class="container px-6 mx-auto">
                <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
                    <div class="p-8 shadow-sm bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl hover-tilt">
                        <div class="flex items-center justify-center mb-6 bg-indigo-100 rounded-lg w-14 h-14">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Our Mission</h3>
                        <p class="leading-relaxed text-gray-600">To empower cooperative members with innovative financial solutions that foster community growth and mutual success.</p>
                    </div>

                    <div class="p-8 shadow-sm bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl hover-tilt">
                        <div class="flex items-center justify-center mb-6 rounded-lg w-14 h-14 bg-amber-100">
                            <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold text-gray-900">Our Vision</h3>
                        <p class="leading-relaxed text-gray-600">Building a sustainable future for members by fostering an inclusive environment where everyone has access to financial opportunities.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="py-20 bg-gray-50">
            <div class="container px-6 mx-auto">
                <div class="mb-16 text-center">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900">Our Services</h2>
                    <p class="max-w-2xl mx-auto text-gray-600">Financial services designed with the needs of our members in mind</p>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div class="p-8 transition-all duration-300 bg-white shadow-sm rounded-2xl hover:shadow-md">
                        <div class="flex items-center justify-center mb-6 bg-green-100 rounded-lg w-14 h-14">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-4 text-xl font-semibold">Loan Services</h3>
                        <p class="text-gray-600">Flexible loan options to cater to both personal and business needs, with tailored terms and rates.</p>
                    </div>

                    <div class="p-8 transition-all duration-300 bg-white shadow-sm rounded-2xl hover:shadow-md">
                        <div class="flex items-center justify-center mb-6 bg-blue-100 rounded-lg w-14 h-14">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 12l9 9m0 0l-9 9m9-9H3"></path>
                            </svg>
                        </div>
                        <h3 class="mb-4 text-xl font-semibold">Savings & Investments</h3>
                        <p class="text-gray-600">Secure and profitable savings plans, allowing members to grow their wealth over time with dividends.</p>
                    </div>

                    <div class="p-8 transition-all duration-300 bg-white shadow-sm rounded-2xl hover:shadow-md">
                        <div class="flex items-center justify-center mb-6 bg-yellow-100 rounded-lg w-14 h-14">
                            <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="mb-4 text-xl font-semibold">Member Benefits</h3>
                        <p class="text-gray-600">Exclusive benefits for our members, including discounts, dividends, and other financial incentives.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="py-8 text-white bg-indigo-600">
        <div class="container px-6 mx-auto text-center">
            <p class="text-lg">&copy; 2025 PEMCCO. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        const menuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
