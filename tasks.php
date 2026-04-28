<!DOCTYPE html>
<html lang="en">
<?php
include __DIR__ . '/Includes/head.php';
?>
<body class="h-screen bg-white overflow-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <div class="w-64 bg-white border-r border-gray-200 flex flex-col">

        <div class="p-6 border-b border-gray-200">
            <h1 class="text-xl font-bold text-gray-900">Ennoia</h1>
            <p class="text-xs text-gray-600">Express your self</p>
        </div>

        <div class="p-4">
            <button
                onclick="window.location.href='chats.php'"
                class="w-full flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg cursor-pointer"
            >
                <span>+</span>
                <span>New Chat</span>
            </button>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-4 overflow-y-auto">

            <a href="analysis.php"
               class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] hover:bg-gray-50 py-2 px-3 rounded-lg transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                Analysis
            </a>

            <!-- ACTIVE PAGE -->
            <a href="#"
               class="flex items-center gap-3 bg-blue-50 text-[#3369FF] py-2 px-3 rounded-lg font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Daily Tasks
            </a>

            <div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase px-3 py-2">
                    Recent
                </h3>

                <div class="space-y-2 text-sm">
                    <a href="#" class="block py-2 px-3 rounded-lg hover:bg-gray-50">
                        March 12, 2026
                    </a>
                    <a href="#" class="block py-2 px-3 rounded-lg hover:bg-gray-50">
                        March 11, 2026
                    </a>
                </div>
            </div>

        </nav>

        <!-- Logout Button -->
        <div class="p-4 border-t border-gray-200">
            <button type="button" onclick="window.location.href='index.php'" class="w-full flex items-center justify-center gap-2 text-gray-700 hover:text-red-600 transition-colors py-2 px-3 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Logout</span>
            </button>
        </div>

    </div>


    <!-- MAIN -->
    <div class="flex-1 bg-gray-50 overflow-y-auto">

        <!-- HEADER -->
        <div class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center">

            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10"></path>
                </svg>
                <span class="text-sm text-gray-700">
                    Emotion-Based Daily Tasks
                </span>
            </div>

            <button class="w-10 h-10 rounded-full bg-[#11B8E5]/20 text-[#11B8E5] flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 0112 16"></path>
                </svg>
            </button>

        </div>


        <div class="p-8">

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">

                <!-- title -->
                <div class="mb-10">
                    <h1 class="text-4xl font-bold text-gray-800 mb-3">
                        Personalized Wellness Tasks
                    </h1>

                    <p class="text-gray-600 text-lg">
                        Generated from emotions detected in your recent chats.
                    </p>
                </div>


                <!-- DETECTED EMOTIONS -->
                <div class="mb-10">
                    <h3 class="font-semibold text-gray-800 mb-4">
                        Detected Emotional Signals
                    </h3>

                    <div class="flex flex-wrap gap-4">
                        <span class="px-5 py-3 rounded-full bg-red-50 text-red-500 font-medium">
                            Anger 82%
                        </span>

                        <span class="px-5 py-3 rounded-full bg-orange-50 text-orange-500 font-medium">
                            Frustration 70%
                        </span>

                        <span class="px-5 py-3 rounded-full bg-purple-50 text-purple-500 font-medium">
                            Loneliness 54%
                        </span>
                    </div>
                </div>


                <!-- TASK SECTIONS -->
                <div class="grid lg:grid-cols-2 gap-8 mb-12">

                    <!-- Emotional Regulation -->
                    <div class="bg-blue-50 rounded-2xl p-8 border border-blue-100">

                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800">
                                Emotional Regulation
                            </h3>
                            <span class="text-xs bg-white px-3 py-2 rounded-full">
                                Recommended
                            </span>
                        </div>

                        <div class="space-y-5">

                            <label class="flex gap-4 items-start bg-white rounded-xl p-4">
                                <input type="checkbox" class="mt-1">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        5 Minute Deep Breathing
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Helps reduce anger and tension.
                                    </p>
                                </div>
                            </label>

                            <label class="flex gap-4 items-start bg-white rounded-xl p-4">
                                <input type="checkbox" class="mt-1">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        Write 3 Things You Feel
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Journaling for frustration release.
                                    </p>
                                </div>
                            </label>

                            <label class="flex gap-4 items-start bg-white rounded-xl p-4">
                                <input type="checkbox" class="mt-1">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        15 Minute Nature Walk
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Helps regulate elevated stress.
                                    </p>
                                </div>
                            </label>

                        </div>

                    </div>


                    <!-- Social / Connection -->
                    <div class="bg-purple-50 rounded-2xl p-8 border border-purple-100">

                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-bold text-gray-800">
                                Connection Tasks
                            </h3>
                            <span class="text-xs bg-white px-3 py-2 rounded-full">
                                For Loneliness
                            </span>
                        </div>

                        <div class="space-y-5">

                            <label class="flex gap-4 items-start bg-white rounded-xl p-4">
                                <input type="checkbox">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        Message a Trusted Friend
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Small social contact can reduce isolation.
                                    </p>
                                </div>
                            </label>

                            <label class="flex gap-4 items-start bg-white rounded-xl p-4">
                                <input type="checkbox">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        Share One Thought With Someone
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Practice emotional openness.
                                    </p>
                                </div>
                            </label>

                            <label class="flex gap-4 items-start bg-white rounded-xl p-4">
                                <input type="checkbox">
                                <div>
                                    <h4 class="font-semibold text-gray-800">
                                        Spend 20 Minutes With Family
                                    </h4>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Rebuild emotional connection.
                                    </p>
                                </div>
                            </label>

                        </div>

                    </div>
                </div>


                <!-- AI SUGGESTED PLAN -->
                <div class="bg-[#395B64] rounded-2xl p-8 text-white mb-10">

                    <h2 class="text-2xl font-bold mb-4">
                        AI Suggested Daily Recovery Plan
                    </h2>

                    <div class="grid md:grid-cols-4 gap-6">

                        <div class="bg-white/10 rounded-xl p-5">
                            <p class="text-sm opacity-80 mb-2">
                                Morning
                            </p>
                            <h4 class="font-semibold">
                                Breathing + Journaling
                            </h4>
                        </div>

                        <div class="bg-white/10 rounded-xl p-5">
                            <p class="text-sm opacity-80 mb-2">
                                Afternoon
                            </p>
                            <h4 class="font-semibold">
                                Nature Walk
                            </h4>
                        </div>

                        <div class="bg-white/10 rounded-xl p-5">
                            <p class="text-sm opacity-80 mb-2">
                                Evening
                            </p>
                            <h4 class="font-semibold">
                                Connect with Friend
                            </h4>
                        </div>

                        <div class="bg-white/10 rounded-xl p-5">
                            <p class="text-sm opacity-80 mb-2">
                                Night
                            </p>
                            <h4 class="font-semibold">
                                Reflection Prompt
                            </h4>
                        </div>

                    </div>
                </div>


                <!-- Reflection prompt -->
                <div class="border rounded-2xl p-8 bg-gray-50">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">
                        Reflection Prompt
                    </h3>

                    <p class="text-gray-700 italic text-lg leading-relaxed mb-6">
                        “What emotion needed attention today, and what helped soothe it?”
                    </p>

                    <button class="bg-[#395B64] hover:bg-[#2F4D55] text-white px-8 py-3 rounded-xl font-semibold transition">
                        Complete Today's Tasks
                    </button>
                </div>

            </div>
        </div>

    </div>

</div>

</body>
</html>