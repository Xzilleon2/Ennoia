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
    $data = $emotionView->SentimentAnalysisThisWeek($_SESSION['user_id']);
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
                <div class="relative h-80 w-full border border-gray-200 rounded-2xl bg-white p-5">

                    <!-- Y Axis Labels -->
                    <div class="absolute left-5 top-0 bottom-0 my-5 w-10 flex flex-col justify-between text-xs text-gray-400">
                        <span>20</span>
                        <span>10</span>
                        <span>0</span>
                    </div>

                    <!-- Graph Area -->
                    <div id="graphArea" class="ml-10 h-full relative border-l border-b border-gray-200">

                        <!-- Lines will be injected here -->
                        <svg class="absolute inset-0 w-full h-full">
                            <polyline id="positiveLine" fill="none" stroke="green" stroke-width="2"/>
                            <polyline id="negativeLine" fill="none" stroke="red" stroke-width="2"/>
                            <polyline id="neutralLine" fill="none" stroke="gray" stroke-width="2"/>
                        </svg>

                    </div>

                    <!-- X Axis Labels -->
                    <div id="xAxis" class="ml-10 mt-1 flex justify-between text-xs text-gray-400"></div>
                </div>             

                <!-- LEGEND -->
                <div class="mt-4 flex items-center justify-center space-x-6 text-xs font-medium text-gray-500">
                    <div class="flex items-center space-x-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-green-600"></span>
                        <span>Positive</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                        <span>Negative</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-gray-400"></span>
                        <span>Neutral</span>
                    </div>
                </div>

                <div class="mt-1 flex items-center justify-center space-x-6 text-xs font-medium text-gray-500">
                    <p class="text-sm text-gray-400 mt-4">
                        Note: Data show the number of sentiments based on the last 7 days of conversations.
                    </p>
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

    <script>
        (function() {
            'use strict';
 
            const rawData = <?php echo json_encode($data); ?>;
            const daysOrder = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
 
            // Initialize data arrays
            let positive = Array(7).fill(null);
            let negative = Array(7).fill(null);
            let neutral = Array(7).fill(null);
 
            /**
             * Parse data from server and populate arrays
             */
            function parseData() {
                rawData.forEach(row => {
                    const cleanDay = row.day.trim().toLowerCase();
                    const index = daysOrder.findIndex(d => d.toLowerCase() === cleanDay);
 
                    if (index === -1) return;
 
                    const p = Number(row.positive_count) || 0;
                    const n = Number(row.negative_count) || 0;
                    const ne = Number(row.neutral_count) || 0;
 
                    // Skip days with all zeros
                    if (p === 0 && n === 0 && ne === 0) {
                        positive[index] = null;
                        negative[index] = null;
                        neutral[index] = null;
                        return;
                    }
 
                    positive[index] = p;
                    negative[index] = n;
                    neutral[index] = ne;
                });
            }
 
            /**
             * Build continuous line segments, breaking where data is null
             * Scaling is calculated directly against the chart Y-axis limit (50)
             */
            function buildSegments(arr, width, height) {
                const segments = [];
                let currentSegment = [];
                const maxChartValue = 20; // Aligns perfectly with your Y-axis label

                arr.forEach((value, i) => {
                    if (value === null) {
                        if (currentSegment.length > 0) {
                            segments.push(currentSegment);
                            currentSegment = [];
                        }
                        return;
                    }
 
                    // X position: spread 7 days across width (0 at Sunday, max at Saturday)
                    const x = (i / 6) * width;
 
                    // Y position: 0 value = bottom (height), maxChartValue = top (0)
                    const y = height - (value / maxChartValue) * height;
 
                    currentSegment.push(`${x},${y}`);
                });
 
                if (currentSegment.length > 0) {
                    segments.push(currentSegment);
                }
 
                return segments;
            }
 
            /**
             * Render all polylines to SVG
             */
            function renderGraph() {
                const graphArea = document.getElementById("graphArea");
                const width = graphArea.getBoundingClientRect().width;
                const height = graphArea.getBoundingClientRect().height;
 
                const svg = document.querySelector("svg");
                svg.innerHTML = "";
 
                /**
                 * Draw lines for a single emotion
                 */
                function drawLine(arr, color) {
                    const segments = buildSegments(arr, width, height);
 
                    segments.forEach(points => {
                        const polyline = document.createElementNS(
                            "http://www.w3.org/2000/svg",
                            "polyline"
                        );
 
                        polyline.setAttribute("points", points.join(" "));
                        polyline.setAttribute("fill", "none");
                        polyline.setAttribute("stroke", color);
                        polyline.setAttribute("stroke-width", "2");
                        polyline.setAttribute("stroke-linecap", "round");
                        polyline.setAttribute("stroke-linejoin", "round");
 
                        svg.appendChild(polyline);
                    });
                }
 
                // Draw all emotion lines
                drawLine(positive, "green");
                drawLine(negative, "red");
                drawLine(neutral, "gray");
 
                // Update X-axis labels
                document.getElementById("xAxis").innerHTML = daysOrder
                    .map(d => `<span>${d.slice(0, 3)}</span>`)
                    .join("");
            }
 
            /**
             * Initialize on page load
             */
            function init() {
                parseData();
                // Removed erratic individual normalization functions
                renderGraph();
            }
 
            // Wait for page to load before rendering
            window.addEventListener("load", init);
 
        })();
    </script>
    
</div>

</body>
</html>