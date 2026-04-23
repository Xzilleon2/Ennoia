<!DOCTYPE html>
<html lang="en">
<?php 
    // included files
    include __DIR__ . '/Includes/head.php';
?>
<body class="h-full">
    
    <!-- Main Contents -->
    <div class="w-full h-screen grid grid-cols-1 lg:grid-cols-[auto_1fr] gap-0">

        <!-- Sidebar Contents -->
        <div>
            <?php include __DIR__ . '/Includes/sidebar.php'; ?>
        </div>

        <!-- chat Contents -->
        <div class="flex flex-col h-screen">

            <!-- Top Bar -->
            <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
                <div class="flex gap-3">
                    <img src="./Assets/Halbert.svg" alt="Halbert">
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-800">JAVA Q&A</span>
                        <span class="text-xs text-green-300">
                            Score: 8/10
                        </span>
                    </div>
                </div>
            </div>

            <!-- Chat Section -->
            <div class="flex-1 overflow-y-auto px-8 py-8">
                <div class="max-w-3xl mx-auto space-y-12">
                    
                    <!-- Question 1 -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">1. When was the team that created Java formed?</h3>
                        <div class="space-y-3">
                            <button class="w-full bg-white border border-gray-200 rounded-full px-6 py-3 text-gray-700 hover:bg-gray-50 transition text-left">
                                A) 1989
                            </button>
                            <button class="w-full bg-green-500 text-white rounded-full px-6 py-3 hover:bg-green-600 transition text-left">
                                B) 1991
                            </button>
                            <button class="w-full bg-white border border-gray-200 rounded-full px-6 py-3 text-gray-700 hover:bg-gray-50 transition text-left">
                                C) 1995
                            </button>
                            <button class="w-full bg-white border border-gray-200 rounded-full px-6 py-3 text-gray-700 hover:bg-gray-50 transition text-left">
                                D) 2000
                            </button>
                        </div>
                    </div>

                    <!-- Question 2 -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">2. What was one of the main goals of Java's creation?</h3>
                        <div class="space-y-3">
                            <button class="w-full bg-red-500 text-white rounded-full px-6 py-3 hover:bg-red-600 transition text-left">
                                A) To create a web browser
                            </button>
                            <button class="w-full bg-green-500 text-white rounded-full px-6 py-3 hover:bg-green-600 transition text-left">
                                B) To create an object-oriented language
                            </button>
                            <button class="w-full bg-white border border-gray-200 rounded-full px-6 py-3 text-gray-700 hover:bg-gray-50 transition text-left">
                                C) To make a hardware-specific programming language
                            </button>
                            <button class="w-full bg-white border border-gray-200 rounded-full px-6 py-3 text-gray-700 hover:bg-gray-50 transition text-left">
                                D) To replace Python
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Message Input -->
            <div class="flex item-center justify-center bg-white px-8 py-8">
                <div class="w-1/3 flex items-center justify-center gap-3 shadow-lg border border-gray-100 rounded-full px-4 py-3">
                    <button class="text-white rounded-full p-2 cursor-pointer hover:bg-blue-300">
                        <img src="./Assets/delete.svg" alt="Delete" class="w-5 h-5">
                    </button>                    
                    <button class="text-white rounded-full p-2 cursor-pointer hover:bg-blue-300">
                        <img src="./Assets/Refresh.svg" alt="Refresh" class="w-5 h-5">
                    </button>
                    <button class="text-white rounded-full p-2 cursor-pointer hover:bg-blue-300">
                        <img src="./Assets/send.svg" alt="Send" class="w-5 h-5">
                    </button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>