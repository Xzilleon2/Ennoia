<!DOCTYPE html>
<html lang="en">
<?php
include __DIR__ . '/Includes/head.php';
?>
<body class="h-screen bg-white overflow-hidden">

<div class="flex h-screen">

    
    <!-- Sidebar -->
    <?php include __DIR__ . '/Includes/sidebar.php'; ?>


    <!-- MAIN CONTENT -->
    <div class="flex-1 bg-gray-50 overflow-y-auto">

        <!-- top header -->
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 17v-6m4 6V7m4 10V4M5 19V9">
                    </path>
                </svg>
                <span class="text-sm text-gray-700">Data Analysis</span>
            </div>

            <button class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </button>
        </div>


        <!-- Dashboard Container -->
        <div class="p-8">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

                <!-- title -->
                <div class="mb-10">
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">
                        Emotional Analytics Dashboard
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Learn Your Emotion Patterns
                    </p>
                </div>


                <!-- emotion cards -->
                <div class="mb-12">
                    <h3 class="font-semibold text-gray-700 mb-5">
                        Top Emotions
                    </h3>

                    <div class="grid md:grid-cols-4 gap-6">

                        <div class="rounded-2xl p-6 bg-red-50 border border-red-100 shadow-sm">
                            <p class="text-sm text-gray-500 mb-2">Primary</p>
                            <h4 class="text-xl font-bold text-red-500">
                                Anger
                            </h4>
                            <div class="mt-4 h-2 bg-red-100 rounded-full overflow-hidden">
                                <div class="h-full bg-red-400 w-[82%]"></div>
                            </div>
                        </div>

                        <div class="rounded-2xl p-6 bg-blue-50 border border-blue-100 shadow-sm">
                            <p class="text-sm text-gray-500 mb-2">Secondary</p>
                            <h4 class="text-xl font-bold text-blue-500">
                                Sadness
                            </h4>
                            <div class="mt-4 h-2 bg-blue-100 rounded-full overflow-hidden">
                                <div class="h-full bg-blue-400 w-[68%]"></div>
                            </div>
                        </div>

                        <div class="rounded-2xl p-6 bg-orange-50 border border-orange-100 shadow-sm">
                            <p class="text-sm text-gray-500 mb-2">Rising</p>
                            <h4 class="text-xl font-bold text-orange-500">
                                Frustration
                            </h4>
                            <div class="mt-4 h-2 bg-orange-100 rounded-full overflow-hidden">
                                <div class="h-full bg-orange-400 w-[58%]"></div>
                            </div>
                        </div>

                        <div class="rounded-2xl p-6 bg-purple-50 border border-purple-100 shadow-sm">
                            <p class="text-sm text-gray-500 mb-2">Detected</p>
                            <h4 class="text-xl font-bold text-purple-500">
                                Loneliness
                            </h4>
                            <div class="mt-4 h-2 bg-purple-100 rounded-full overflow-hidden">
                                <div class="h-full bg-purple-400 w-[47%]"></div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- Chart Section -->
                <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6 mb-10">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-semibold text-gray-800 text-lg">
                            Emotion Graph
                        </h3>

                        <div class="flex gap-3 text-sm">
                            <button class="px-4 py-2 rounded-lg bg-[#395B64] text-white">
                                Daily
                            </button>
                            <button class="px-4 py-2 rounded-lg bg-white border hover:bg-gray-50">
                                Weekly
                            </button>
                            <button class="px-4 py-2 rounded-lg bg-white border hover:bg-gray-50">
                                Monthly
                            </button>
                        </div>
                    </div>


                    <!-- fake graph using CSS -->
                    <div class="relative h-[420px] rounded-xl bg-white border overflow-hidden">

                        <!-- grid lines -->
                        <div class="absolute inset-0 bg-[linear-gradient(to_right,#e5e7eb_1px,transparent_1px),linear-gradient(to_bottom,#e5e7eb_1px,transparent_1px)] bg-[size:40px_40px] opacity-70"></div>

                        <!-- chart svg -->
                        <svg viewBox="0 0 900 420"
                             class="absolute inset-0 w-full h-full">

                            <!-- blue area -->
                            <path
                              d="M0 340
                                 L90 250
                                 L220 160
                                 L350 110
                                 L480 250
                                 L610 180
                                 L740 300
                                 L860 110
                                 L900 110
                                 L900 420
                                 L0 420 Z"
                              fill="rgba(59,130,246,.25)"
                              stroke="#60A5FA"
                              stroke-width="4"
                            />

                            <!-- red area -->
                            <path
                              d="M0 350
                                 L80 160
                                 L230 120
                                 L350 70
                                 L480 160
                                 L610 160
                                 L740 160
                                 L860 240
                                 L900 240
                                 L900 420
                                 L0 420 Z"
                              fill="rgba(248,113,113,.25)"
                              stroke="#EF4444"
                              stroke-width="4"
                            />
                        </svg>
                    </div>

                    <div class="flex gap-8 mt-6 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-1 bg-blue-400 block"></span>
                            Positive Emotions
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-1 bg-red-400 block"></span>
                            Negative Emotions
                        </div>
                    </div>

                </div>


                <!-- Insight cards -->
                <div class="grid lg:grid-cols-3 gap-6">

                    <div class="bg-white border rounded-2xl p-6 shadow-sm">
                        <h4 class="font-semibold text-gray-800 mb-3">
                            Mood Trend
                        </h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Emotional spikes tend to appear midweek, while weekends show recovery patterns.
                        </p>
                    </div>

                    <div class="bg-white border rounded-2xl p-6 shadow-sm">
                        <h4 class="font-semibold text-gray-800 mb-3">
                            Trigger Insight
                        </h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Frustration increases after task-heavy days and often overlaps with loneliness signals.
                        </p>
                    </div>

                    <div class="bg-white border rounded-2xl p-6 shadow-sm">
                        <h4 class="font-semibold text-gray-800 mb-3">
                            Wellness Suggestion
                        </h4>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Consider journaling, guided breathing or checking in with your support network.
                        </p>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

</body>
</html>