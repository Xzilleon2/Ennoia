<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <?php 
        // included files
        include __DIR__ . '/Includes/head.php';
    ?>
<body class="h-screen bg-white overflow-hidden">
    <?php 
        define('LOADING_OVERLAY', true);
        include __DIR__ . '/Includes/loading.php';
    ?>
    
    <!-- Main Container -->
    <div class="relative w-full h-full flex items-center justify-center" style="background-image: url('./Assets/Imgs/Sands.jpg'); background-size: cover; background-position: center;">
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-white/5"></div>
        
        <!-- Content -->
        <div class="relative z-10 w-full flex flex-col items-center justify-center px-4">
            
            <!-- Logo Section -->
            <div class="absolute -top-15 left-10">
                <h1 class="text-2xl font-bold text-gray-900 mb-1">Ennoia</h1>
                <p class="text-sm text-gray-600">Express your self</p>
            </div>
            
            <!-- Register Form -->
            <div class="w-full max-w-md">
                <div class="flex flex-col text-center mb-8">
                    <?php if (isset($_SESSION['message_log'])): ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline"><?php echo $_SESSION['message_log']; ?></span>
                        </div>
                    <?php unset($_SESSION['message_log']); endif; ?>
                    <h2 class="text-3xl font-bold text-gray-900">Register</h2>
                </div>
                
                <form class="space-y-6" method="POST" action="Process/Register.php">
                    <!-- Username Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <input type="text" name="username" placeholder="Axmi123" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3369FF] focus:border-transparent bg-white/80">
                    </div>
                    
                    <!-- Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" placeholder="amihail" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3369FF] focus:border-transparent bg-white/80">
                    </div>
                    
                    <!-- Confirm Password Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Confirm</label>
                        <input type="password" name="passwordRep" placeholder="amihail" class="w-full px-4 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-[#3369FF] focus:border-transparent bg-white/80">
                    </div>
                    
                    <!-- Sign Up Button -->
                    <button type="submit" name="signupBtn" class="w-full bg-[#395B64] hover:bg-[#2F4D55] text-white font-semibold py-3 px-4 rounded-md transition-colors cursor-pointer">
                        Sign up
                    </button>
                    
                    <!-- Back Button -->
                    <button type="button" onclick="navigate('welcome.php', 'Please Wait…')" class="w-full bg-white hover:bg-gray-100 text-gray-900 font-semibold py-3 px-4 rounded-md border border-gray-300 transition-colors cursor-pointer">
                        Back
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script> 
        // Loading Modal Function
        function navigate(url, msg) {
            showLoadingModal(msg);
            setTimeout(() => { window.location.href = url; }, 800);
        }
    </script>

</body>
</html>