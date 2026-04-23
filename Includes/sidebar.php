<div class="w-64 h-screen bg-white border-r border-gray-200 rounded-lg shadow-md p-4 flex flex-col gap-4 overflow-y-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-4">
        <button onclick="window.location.href='./splash.php?redirect=chat.php'" class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 text-sm font-medium cursor-pointer">
            <span>+</span> New chat
        </button>
    </div>

    <!-- Your History Section -->
    <div class="mt-4">
        <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-3">Your History</h3>
        
        <!-- Chat Items -->
        <div class="flex flex-col gap-2">
            <!-- JAVA Q&A -->
            <a href="./splash.php?redirect=questionnaire.php" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-100 transition">
                <img src="./Assets/Bookmark.svg" alt="bookmark" class="w-5 h-5">
                <span>JAVA Q&A</span>
            </a>

            <!-- Drugs Q&A -->
            <a href="./splash.php?redirect=questionnaire.php" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-100 transition">
                <img src="./Assets/Bookmark.svg" alt="bookmark" class="w-5 h-5">
                <span>Drugs Q&A</span>
            </a>

            <!-- Robotics Q&A -->
            <a href="./splash.php?redirect=questionnaire.php" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-100 transition">
                <img src="./Assets/Bookmark.svg" alt="bookmark" class="w-5 h-5">
                <span>Robotics Q&A</span>
            </a>

            <!-- Electronics Q&A -->
            <a href="./splash.php?redirect=questionnaire.php" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-gray-100 transition">
                <img src="./Assets/Bookmark.svg" alt="bookmark" class="w-5 h-5">
                <span>Electronics Q&A</span>
            </a>
        </div>
    </div>
</div>