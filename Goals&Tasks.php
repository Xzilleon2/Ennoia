<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<?php 
    if (!isset($_SESSION['user_id'])) {
        header("Location: welcome.php");
        exit();
    }

    include_once __DIR__ . '/Includes/head.php';
?>

<body class="h-screen bg-white overflow-hidden">

<div class="flex h-screen">

    <!-- Sidebar -->
    <?php include __DIR__ . '/Includes/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col bg-gray-50 overflow-hidden">

        <!-- Header -->
        <div class="bg-white border-b border-gray-200 px-8 py-5 flex items-center justify-between">

            <div>
                <h1 class="text-xl font-semibold text-gray-800">
                    Goals & Tasks
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Small intentional actions for balance, growth, and reflection.
                </p>
            </div>

            <div class="flex items-center gap-3">

                <input 
                    type="date"
                    class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#395B64]"
                >

                <button class="bg-[#395B64] hover:bg-[#2F4D55] text-white px-5 py-2 rounded-lg text-sm font-medium transition-colors">
                    Update
                </button>

            </div>
        </div>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8 space-y-6 hide-scrollbar">

            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="bg-white border border-gray-200 rounded-2xl p-5">
                    <p class="text-sm text-gray-500">
                        Daily Focus
                    </p>

                    <h2 class="text-2xl font-semibold text-[#395B64] mt-2">
                        Mindfulness
                    </h2>

                    <p class="text-xs text-gray-400 mt-2">
                        Main focus area for today.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-5">
                    <p class="text-sm text-gray-500">
                        Completed Tasks
                    </p>

                    <h2 class="text-2xl font-semibold text-[#395B64] mt-2">
                        5 / 8
                    </h2>

                    <p class="text-xs text-gray-400 mt-2">
                        Progress from today’s goals.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-5">
                    <p class="text-sm text-gray-500">
                        Consistency
                    </p>

                    <h2 class="text-2xl font-semibold text-[#395B64] mt-2">
                        78%
                    </h2>

                    <p class="text-xs text-gray-400 mt-2">
                        Based on recent task completion.
                    </p>
                </div>

            </div>

            <!-- MAIN CONTENT -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- THINGS TO DO -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">

                    <div class="flex items-center justify-between mb-6">

                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                Things To Do
                            </h2>

                            <p class="text-sm text-gray-500 mt-1">
                                Healthy and productive actions for today.
                            </p>
                        </div>

                        <button class="text-sm text-[#395B64] hover:underline">
                            Add Task
                        </button>

                    </div>

                    <div class="space-y-4">

                        <!-- Task -->
                        <div class="flex items-start gap-4 border border-gray-100 rounded-xl p-4 hover:bg-gray-50 transition">

                            <input type="checkbox"
                            class="mt-1 w-4 h-4 accent-[#395B64]">

                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-800">
                                    Take a 10-minute walk
                                </h3>

                                <p class="text-xs text-gray-500 mt-1">
                                    Clear your thoughts and reduce stress.
                                </p>
                            </div>

                        </div>

                        <!-- Task -->
                        <div class="flex items-start gap-4 border border-gray-100 rounded-xl p-4 hover:bg-gray-50 transition">

                            <input type="checkbox"
                            class="mt-1 w-4 h-4 accent-[#395B64]">

                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-800">
                                    Write down 3 positive thoughts
                                </h3>

                                <p class="text-xs text-gray-500 mt-1">
                                    Practice gratitude and reflection.
                                </p>
                            </div>

                        </div>

                        <!-- Task -->
                        <div class="flex items-start gap-4 border border-gray-100 rounded-xl p-4 hover:bg-gray-50 transition">

                            <input type="checkbox"
                            class="mt-1 w-4 h-4 accent-[#395B64]">

                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-800">
                                    Complete pending academic task
                                </h3>

                                <p class="text-xs text-gray-500 mt-1">
                                    Focus on one important responsibility.
                                </p>
                            </div>

                        </div>

                        <!-- Task -->
                        <div class="flex items-start gap-4 border border-gray-100 rounded-xl p-4 hover:bg-gray-50 transition">

                            <input type="checkbox"
                            class="mt-1 w-4 h-4 accent-[#395B64]">

                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-800">
                                    Drink more water
                                </h3>

                                <p class="text-xs text-gray-500 mt-1">
                                    Stay hydrated throughout the day.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- THINGS TO AVOID -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">

                    <div class="mb-6">

                        <h2 class="text-lg font-semibold text-gray-800">
                            Things To Avoid
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Habits that may negatively affect your well-being.
                        </p>

                    </div>

                    <div class="space-y-4">

                        <!-- Avoid -->
                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">

                            <div class="flex items-start gap-3">

                                <div class="w-2 h-2 rounded-full bg-[#395B64] mt-2"></div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-800">
                                        Overthinking late at night
                                    </h3>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Give yourself time to rest mentally.
                                    </p>
                                </div>

                            </div>

                        </div>

                        <!-- Avoid -->
                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">

                            <div class="flex items-start gap-3">

                                <div class="w-2 h-2 rounded-full bg-[#395B64] mt-2"></div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-800">
                                        Skipping meals
                                    </h3>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Maintain healthy energy levels.
                                    </p>
                                </div>

                            </div>

                        </div>

                        <!-- Avoid -->
                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">

                            <div class="flex items-start gap-3">

                                <div class="w-2 h-2 rounded-full bg-[#395B64] mt-2"></div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-800">
                                        Excessive screen time
                                    </h3>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Reduce mental fatigue and distractions.
                                    </p>
                                </div>

                            </div>

                        </div>

                        <!-- Avoid -->
                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">

                            <div class="flex items-start gap-3">

                                <div class="w-2 h-2 rounded-full bg-[#395B64] mt-2"></div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-800">
                                        Negative self-talk
                                    </h3>

                                    <p class="text-xs text-gray-500 mt-1">
                                        Practice self-compassion and patience.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- PROGRESS SECTION -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6">

                <div class="flex items-center justify-between mb-6">

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Weekly Progress
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Track consistency and personal growth.
                        </p>
                    </div>

                    <span class="text-sm text-[#395B64] font-medium">
                        78% Completed
                    </span>

                </div>

                <!-- Progress Bar -->
                <div class="w-full bg-gray-100 rounded-full h-3 overflow-hidden">
                    <div class="bg-[#395B64] h-full rounded-full w-[78%]"></div>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>