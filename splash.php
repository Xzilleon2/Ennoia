<!DOCTYPE html>
<html lang="en">
<?php 
    // included files
    include __DIR__ . '/Includes/head.php';
?>
<body class="h-full">
    
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes fadeOutScale {
            0% {
                opacity: 1;
                transform: scale(1);
            }
            100% {
                opacity: 0;
                transform: scale(0.95);
            }
        }
        
        @keyframes progressBar {
            0% { width: 10%; }
            50% { width: 60%; }
            100% { width: 95%; }
        }
        
        .splash-content {
            animation: fadeInScale 0.6s ease-out;
        }
        
        .splash-content.fade-out {
            animation: fadeOutScale 0.6s ease-in forwards;
        }
        
        .logo-float {
            animation: float 2s ease-in-out infinite;
        }
        
        .progress-bar {
            height: 3px;
            background: rgba(255, 255, 255, 0.3);
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #ffffff, rgba(255, 255, 255, 0.3));
            animation: progressBar 0.95s ease-in;
        }
    </style>
    
    <!-- Splash Screen -->
    <div class="splash-container w-full h-screen bg-[#3369FF] flex items-center justify-center relative overflow-hidden">
        <div class="splash-content text-center">
            <img src="./Assets/mascot-logo.svg" alt="Logo Animation" class="logo-float w-48 h-48 mx-auto">
            <p class="text-white mt-6 text-lg font-medium opacity-80">Getting ready...</p>
        </div>
        <div class="progress-bar">
            <div class="progress-fill"></div>
        </div>
    </div>

    <script>
        // Get redirect destination from URL parameter
        const params = new URLSearchParams(window.location.search);
        let redirectPage = params.get('redirect') || 'chat.php';
        
        // Security: Only allow redirects to local PHP files
        const allowedPages = ['chat.php', 'questionnaire.php', 'index.php', 'splash.php'];
        if (!allowedPages.includes(redirectPage)) {
            redirectPage = 'chat.php';
        }
        
        // Redirect after 1 second with fade-out animation
        setTimeout(function() {
            const splashContent = document.querySelector('.splash-content');
            splashContent.classList.add('fade-out');
            
            // Redirect after fade-out completes
            setTimeout(function() {
                window.location.href = redirectPage;
            }, 600);
        }, 1000);
    </script>

</body>
</html>