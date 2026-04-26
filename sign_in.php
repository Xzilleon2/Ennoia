<!DOCTYPE html>
<html lang="en">
<?php 
    // included files
    include __DIR__ . '/Includes/head.php';
?>
<body class="h-screen bg-white overflow-hidden">
    
    <!-- Main Container -->
    <div class="relative w-full h-full flex items-center justify-center" style="background-image: url('./Assets/Imgs/Sands.jpg'); background-size: cover; background-position: center;">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-white/5"></div>
        
        <!-- Content -->
        <div class="relative z-10 w-full flex flex-col items-center justify-center px-4">
            
            <!-- Logo Section -->
            <div class="absolute -top-20 left-10">
                <h1 class="text-2xl font-bold text-gray-900 mb-1">Ennoia</h1>
                <p class="text-sm text-gray-600">Express your self</p>
            </div>
            
            <!-- Login Form -->
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">Login</h2>
                </div>
                
                <form class="space-y-6">
                    <!-- Username Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <input type="text" placeholder="Axmi123" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3369FF] focus:border-transparent bg-white/80">
                    </div>
                    
                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" placeholder="••••••••••••" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3369FF] focus:border-transparent bg-white/80">
                    </div>
                    
                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-400">
                            <span class="text-gray-700">Remember me</span>
                        </label>
                        <a href="#" class="text-gray-700 hover:text-[#3369FF] transition-colors">Forgot password?</a>
                    </div>
                    
                    <!-- Sign In Button -->
                    <button type="button" onclick="window.location.href='chats.php'" class="w-full bg-[#395B64] hover:bg-[#2F4D55] text-white font-semibold py-3 px-4 rounded-md transition-colors cursor-pointer">
                        Sign in
                    </button>
                    
                    <!-- Back Button -->
                    <button type="button" onclick="window.location.href='index.php'" class="w-full bg-white hover:bg-gray-100 text-gray-900 font-semibold py-3 px-4 rounded-md border border-gray-300 transition-colors cursor-pointer">
                        Back
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>