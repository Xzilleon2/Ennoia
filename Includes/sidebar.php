<!-- Sidebar -->
<div class="w-64 bg-white border-r border-gray-200 flex flex-col">
    <!-- Logo Section -->
    <div class="p-6 border-b border-gray-200">
        <h1 class="text-xl font-bold text-gray-900">Ennoia</h1>
        <p class="text-xs text-gray-600">Express your self</p>
    </div>

    <!-- New Chat Button -->
    <div class="p-4">
        <button type="button" onclick="window.location.href='index.php'" class="w-full flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors cursor-pointer">
            <span>+</span>
            <span>New Chat</span>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-4 overflow-y-auto">
        <!-- Analysis -->
        <div>
            <a href="./analysis.php" class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] transition-colors py-2 px-3 rounded-lg hover:bg-gray-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
                <span>Analysis</span>
            </a>
        </div>

        <!-- Daily Tasks -->
        <div>
            <a href="./tasks.php" class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] transition-colors py-2 px-3 rounded-lg hover:bg-gray-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                <span>Daily Tasks</span>
            </a>
        </div>

        <!-- Recent -->
        <div>
            <h3 class="text-xs font-semibold text-gray-600 uppercase px-3 py-2">Recent</h3>
            <div class="space-y-2">
                <a href="#" class="block text-sm text-gray-700 hover:text-[#3369FF] hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors truncate">
                    March 12, 2025
                </a>
                <a href="#" class="block text-sm text-gray-700 hover:text-[#3369FF] hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors truncate">
                    March 11, 2025
                </a>
                <a href="#" class="block text-sm text-gray-700 hover:text-[#3369FF] hover:bg-gray-50 py-2 px-3 rounded-lg transition-colors truncate">
                    March 10, 2025
                </a>
            </div>
        </div>
    </nav>

    <!-- Logout Button -->
    <div class="p-4 border-t border-gray-200">
        <a href="./logout.php" class="w-full flex items-center justify-center gap-2 text-gray-700 hover:text-red-600 transition-colors py-2 px-3 cursor-pointer">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>Logout</span>
        </a>
    </div>
</div>