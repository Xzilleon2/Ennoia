<!DOCTYPE html>
<html lang="en">
<?php 
    // included files
    include __DIR__ . '/Includes/head.php';
?>
<body class="h-full bg-white">
    
    <!-- Navigation Bar -->
    <nav class="fixed top-0 w-full backdrop-blur z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">Ennoia</h1>
            <div class="flex gap-8 items-center">
                <a href="#" class="text-white hover:text-[#2F4D55]">About Us</a>
                <a href="#" class="text-white hover:text-[#2F4D55]">Experience</a>
                <a href="#" class="text-white hover:text-[#2F4D55]">Training</a>
                <a href="#" class="text-white hover:text-[#2F4D55]">Contact</a>
            </div>
            <div class="flex gap-3 items-center">
                <button type="button" onclick="window.location.href='sign_in.php'" class="hover:bg-[#2F4D55] text-white py-2 px-5 transition-colors cursor-pointer">
                    Sign in
                </button>
                <button type="button" onclick="window.location.href='sign_up.php'" class="bg-[#395B64] hover:bg-[#2F4D55] text-white py-2 px-5 transition-colors  cursor-pointer">
                    Sign up
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="w-full min-h-screen pt-20 flex items-center justify-center px-8 bg-cover bg-center relative" style="background-image: url('./Assets/Imgs/Banner1.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/40"></div>
        
        <!-- Bottom Blur Gradient -->
        <div class="absolute bottom-0 left-0 right-0 h-15 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
        
        <!-- Content -->
        <div class="relative z-10 flex flex-col justify-center items-center gap-8 text-center max-w-3xl">
            <div>
                <h1 class="text-5xl lg:text-6xl font-bold text-white leading-tight mb-4">
                    Make Conversations<br>Enjoyable & Effortless
                </h1>
                <p class="text-lg text-white/90">
                   Turn your conversations  into something smarter and more effortless get answers, ideas, and solutions with speed and ease.
                </p>
            </div>
            <div class="flex items-center justify-center w-full max-w-md">
                <div class="relative w-full bg-white/20 backdrop-blur rounded-full px-6 py-3 flex items-center justify-between border border-white/30">
                    <input type="text" placeholder="Send a Message" class="bg-transparent text-white placeholder-white/70 outline-none flex-1 text-sm">
                    <a href="./chats.php" class="bg-[#395B64] hover:bg-[#2F4D55] transition-colors rounded-full p-2 flex items-center justify-center ml-2">
                        <img src="./Assets/Imgs/Send.svg" alt="Send" class="w-5 h-5">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="w-full py-20 px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-16 items-start">
                <!-- Left Title -->
                <div class="flex-shrink-0">
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">Why<br>Choosing Us</h2>
                </div>

                <!-- Right Features Grid -->
                <div class="flex-1">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Feature 1 -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Casual Chats</h3>
                            <p class="text-gray-600 text-sm">
                                The advantage of having a workspace chat is it streamlines your work process and all around facilitates.
                            </p>
                        </div>

                        <!-- Feature 2 -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Fun Experience</h3>
                            <p class="text-gray-600 text-sm">
                                You can just use it and you can get affordable price and still enjoy the features that are any time.
                            </p>
                        </div>

                        <!-- Feature 3 -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Endless topics</h3>
                            <p class="text-gray-600 text-sm">
                                We provide many unusual work space so that you can choose the workspace for your long thing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="w-full py-20 px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
                <div class="flex items-center justify-center">
                    <img src="./Assets/Imgs/Banner2.jpg" alt="Experience" class="w-full rounded-2xl shadow-lg">
                </div>

                <!-- Right Content -->
                <div class="flex flex-col gap-1 h-full">
                    <p class="text-[#395B64] font-semibold text-sm mb-3">EXPERIENCES</p>
                    <h2 class="text-4xl lg:text-5xl font-bold text-black mb-6">We Provide You The<br>Best Experience</h2>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        You don't have to worry about the result because of all of these interns are made by people who are professionals in their fields with an elegant and luxurious style and with premium quality experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Materials Section -->
    <section class="w-full py-20 px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row gap-12 items-center">
                <!-- Left Content -->
                <div class="flex-1">
                    <p class="text-[#395B64] font-semibold text-sm mb-3">MATERIALS</p>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Carefully Crafted<br>Training For Optimal<br>Performance</h2>
                    <p class="text-gray-600">
                        Because we're very serious about developing hardware for our measurement using a very meticulous and famous night but at a relatively low price
                    </p>
                </div>

                <!-- Right Image Grid -->
                <div class="flex-1">
                    <div class="grid grid-cols-3 gap-4 h-96">
                        <!-- Left Column - 2 stacked images -->
                        <div class="col-span-1 flex flex-col gap-4">
                            <img src="./Assets/Imgs/codes.jpg" alt="Training 1" class="rounded-xl w-full h-32 object-cover shadow-lg">
                            <img src="./Assets/Imgs/conversation2.jpg" alt="Training 2" class="rounded-xl w-full h-32 object-cover shadow-lg">
                        </div>
                        
                        <!-- Right Column - 1 large image -->
                        <div class="col-span-2">
                            <img src="./Assets/Imgs/developer.jpg" alt="Training 3" class="rounded-xl w-full h-full object-cover shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="w-full py-32 px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-20">
                <p class="text-[#395B64] font-semibold text-sm mb-3 uppercase tracking-wide">TESTIMONIALS</p>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900">Our Client Reviews</h2>
            </div>

            <!-- Testimonials Carousel -->
            <div class="relative">
                <!-- Navigation Arrows -->
                <button class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-16 z-10 text-gray-400 hover:text-gray-900 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <button class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-16 z-10 text-gray-400 hover:text-gray-900 transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Testimonials Container -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-8">
                    <!-- Testimonial 1 -->
                    <div class="relative h-80 rounded-2xl overflow-hidden group">
                        <img src="./Assets/Imgs/room.jpg" alt="James" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        <!-- Content Card -->
                        <div class="absolute mx-4 bottom-2 left-0 right-0 bg-white rounded-2xl p-6 transform transition-transform">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center text-white font-bold">J</div>
                                <div>
                                    <p class="font-semibold text-gray-900">James</p>
                                    <p class="text-sm text-gray-500">Student</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">
                                "The interface is incredibly intuitive, offering a seamless flow of conversation that feels natural and completely uninterrupted."
                            </p>
                            <div class="flex gap-1">
                                <span class="text-orange-400">★★★★★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 2 -->
                    <div class="relative h-80 rounded-2xl overflow-hidden group">
                        <img src="./Assets/Imgs/room2.jpg" alt="Sarah" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        <!-- Content Card -->
                        <div class="absolute mx-4 bottom-2 left-0 right-0 bg-white rounded-2xl p-6 transform transition-transform">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-gray-400 rounded-full flex items-center justify-center text-white font-bold">S</div>
                                <div>
                                    <p class="font-semibold text-gray-900">Sarah</p>
                                    <p class="text-sm text-gray-500">Student</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">
                                "Offers a distraction-free space where you can focus entirely on your thoughts without the tech getting in the way."
                            </p>
                            <div class="flex gap-1">
                                <span class="text-orange-400">★★★★★</span>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial 3 -->
                    <div class="relative h-80 rounded-2xl overflow-hidden group">
                        <img src="./Assets/Imgs/room3.jpg" alt="Bella" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        
                        <!-- Content Card -->
                        <div class="absolute mx-4 bottom-2 left-0 right-0 bg-white rounded-2xl p-6 transform transition-transform">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center text-white font-bold">B</div>
                                <div>
                                    <p class="font-semibold text-gray-900">Bella</p>
                                    <p class="text-sm text-gray-500">Student</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm mb-3">
                                "A truly seamless experience stays consistent from the first message to the last, making digital counselling feel incredibly human."
                            </p>
                            <div class="flex gap-1">
                                <span class="text-orange-400">★★★★★</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full bg-white border-t border-gray-200 py-16 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <!-- Brand -->
                <div>
                    <h3 class="text-lg font-bold text-[#395B64] mb-4">Ennoia</h3>
                    <p class="text-sm text-gray-600">
                        The advantages of being a workspace with us is to have a private and comfortable service and all around good facilities.
                    </p>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Services</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-[#395B64]">Email Marketing</a></li>
                        <li><a href="#" class="hover:text-[#395B64]">Campaigns</a></li>
                        <li><a href="#" class="hover:text-[#395B64]">Branding</a></li>
                    </ul>
                </div>

                <!-- Features -->
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Features</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-[#395B64]">Bots</a></li>
                        <li><a href="#" class="hover:text-[#395B64]">Chats</a></li>
                        <li><a href="#" class="hover:text-[#395B64]">AI</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h4 class="font-semibold text-gray-900 mb-4">Follow Us</h4>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li><a href="#" class="hover:text-[#395B64]">Facebook</a></li>
                        <li><a href="#" class="hover:text-[#395B64]">Twitter</a></li>
                        <li><a href="#" class="hover:text-[#395B64]">Instagram</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-600">
                <p>Copyright © 2025</p>
                <div class="flex gap-8">
                    <a href="#" class="hover:text-[#395B64]">Terms & Conditions</a>
                    <a href="#" class="hover:text-[#395B64]">Privacy Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const nav = document.querySelector('nav');
        const heroSection = document.querySelector('section');
        const logo = document.querySelector('nav h1');
        const buttons = document.querySelectorAll('nav button');
        
        window.addEventListener('scroll', () => {
            const heroBottom = heroSection.offsetHeight;
            
            if (window.scrollY > heroBottom - 100) {
                // Scrolled past hero - add dark styles
                nav.classList.remove('bg-transparent', 'backdrop-blur');
                nav.classList.add('bg-white', 'shadow-lg');
                
                // Change logo color
                logo.classList.remove('text-white');
                logo.classList.add('text-gray-900');
                
                // Change link colors
                document.querySelectorAll('nav a').forEach(link => {
                    link.classList.remove('text-white', 'hover:text-[#3369FF]', 'text-gray-600');
                    link.classList.add('text-gray-900', 'hover:text-[#3369FF]');
                });
                
                // Change button text colors
                buttons.forEach(button => {
                    button.classList.remove('text-white');
                    button.classList.add('text-gray-900');
                });
            } else {
                // On hero section - white text
                nav.classList.add('bg-transparent', 'backdrop-blur');
                nav.classList.remove('bg-white');
                
                // Change logo color back to white
                logo.classList.remove('text-gray-900');
                logo.classList.add('text-white');
                
                document.querySelectorAll('nav a').forEach(link => {
                    link.classList.remove('text-gray-900');
                    link.classList.add('text-white', 'hover:text-[#3369FF]');
                });
                
                // Change button text colors back to white
                buttons.forEach(button => {
                    button.classList.remove('text-gray-900');
                    button.classList.add('text-white');
                });
            }
        });
    </script>

</body>
</html>