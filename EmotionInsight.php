<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<?php 
    if (!isset($_SESSION['user_id'])) {
        header("Location: welcome.php");
        exit();
    }

    include_once __DIR__ . '/Includes/head.php';
    include_once __DIR__ . '/Classes/Dbh.class.php';
    include_once __DIR__ . '/Classes/EmotionsView.class.php';

    $emotionView = new EmotionsView();
    $emotions = $emotionView->TopEmotionHistory($_SESSION['user_id']);
    $topemotion = $emotionView->TopEmotionThisWeek($_SESSION['user_id']);
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
                    Emotional Insights
                </h1>

                <p class="text-sm text-gray-500 mt-1">
                    Understand emotional patterns and trends over time.
                </p>
            </div>
        </div>

        <!-- Scrollable Content -->
        <div class="flex-1 overflow-y-auto p-8 space-y-6 hide-scrollbar">

            <!-- SUMMARY CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div class="bg-white border border-gray-200 rounded-2xl p-5">
                    <p class="text-sm text-gray-500">
                        Dominant Emotion
                    </p>

                    <h2 class="text-2xl font-semibold text-[#395B64] mt-2">
                        <?php echo !empty($topemotion) ? $topemotion[0]['predicted_emotion'] : 'N/A'; ?>
                    </h2>

                    <p class="text-xs text-gray-400 mt-2">
                        Most expressed emotion this week.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-5">
                    <p class="text-sm text-gray-500">
                        Emotional Stability
                    </p>

                    <h2 class="text-2xl font-semibold text-[#395B64] mt-2">
                         <?php echo !empty($topemotion) ? round($topemotion[0]['emotion_percentage'], 2) : 'N/A'; ?>%
                    </h2>

                    <p class="text-xs text-gray-400 mt-2">
                        Based on conversation consistency.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-5">
                    <p class="text-sm text-gray-500">
                        Reflection Sessions
                    </p>

                    <h2 class="text-2xl font-semibold text-[#395B64] mt-2">
                         <?php echo !empty($topemotion) ? $topemotion[0]['total_count'] : 'N/A'; ?>
                    </h2>

                    <p class="text-xs text-gray-400 mt-2">
                        Conversations analyzed.
                    </p>
                </div>

            </div>

            <!-- GRAPH SECTION -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            Emotion Trends
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Emotional changes across recent conversations.
                        </p>
                    </div>

                    <button class="text-sm text-[#395B64] hover:underline">
                        View Details
                    </button>
                </div>

                <!-- GRAPH PLACEHOLDER -->
                <div class="h-80 rounded-2xl border border-dashed border-gray-300 flex items-center justify-center bg-gray-50">

                    <div class="text-center">
                        <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3v18h18M18 17l-5-5-4 4-3-3"></path>
                        </svg>

                        <p class="text-sm text-gray-400">
                            Emotion graph visualization here
                        </p>
                    </div>

                </div>
            </div>

            <!-- EMOTION RANKINGS -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <!-- Emotion Rankings -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">

                    <div class="mb-5">
                        <h2 class="text-lg font-semibold text-gray-800">
                            Emotion Rankings
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Most frequently detected emotions.
                        </p>
                    </div>

                    <div class="space-y-5">

                        <?php if (!empty($emotions)) : ?>

                            <?php foreach ($emotions as $emotion) : ?>

                                <?php
                                    $name = ucfirst($emotion['predicted_emotion']);
                                    $percent = $emotion['emotion_percentage'];
                                ?>

                                <div>
                                    <div class="flex justify-between text-sm mb-2">
                                        <span class="text-gray-700 font-medium">
                                            <?= htmlspecialchars($name) ?>
                                        </span>

                                        <span class="text-gray-400">
                                            <?= $percent ?>%
                                        </span>
                                    </div>

                                    <div class="w-full bg-gray-100 rounded-full h-2">
                                        <div 
                                            class="bg-[#395B64] h-2 rounded-full"
                                            style="width: <?= $percent ?>%">
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <p class="text-sm text-gray-400">
                                No emotion data available for this week.
                            </p>

                        <?php endif; ?>

                    </div>

                </div>

                <!-- Reflection Notes -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">

                    <div class="mb-5">
                        <h2 class="text-lg font-semibold text-gray-800">
                            Reflection Summary
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            AI-generated emotional observations.
                        </p>
                    </div>

                    <div class="space-y-4">

                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Your conversations this week show stronger emotional balance and calmness compared to previous sessions.
                            </p>
                        </div>

                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Anxiety-related expressions appeared less frequently during reflective discussions.
                            </p>
                        </div>

                        <div class="border border-gray-100 rounded-xl p-4 bg-gray-50">
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Positive emotional engagement increased during goal-oriented conversations.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>