<?php
$today = date('Y-m-d');
include_once __DIR__ . "/../Classes/MessagesView.class.php";
$messagesView = new MessagesView();
?>

<div class="w-64 bg-white border-r border-gray-200 flex flex-col">

    <!-- HEADER -->
    <div class="p-6 border-b border-gray-200">
        <h1 class="text-xl font-bold text-gray-900">Ennoia</h1>
        <p class="text-xs text-gray-600">Express yourself</p>
    </div>

    <!-- TODAY BUTTON -->
    <div class="p-4">
        <button
            type="button"
            onclick="goToToday()"
            class="w-full flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors cursor-pointer">
            <span>Today's Chat</span>
        </button>
    </div>

    <!-- NAV LINKS -->
    <nav class="flex-1 px-4 py-6 space-y-4 overflow-y-auto">

        <div>
            <a href="./analysis.php"
               class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] transition-colors py-2 px-3 rounded-lg hover:bg-gray-50">
                <span>Analysis</span>
            </a>
        </div>

        <div>
            <a href="./tasks.php"
               class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] transition-colors py-2 px-3 rounded-lg hover:bg-gray-50">
                <span>Daily Tasks</span>
            </a>
        </div>

        <!-- RECENT CHATS (LAZY LOADED) -->
        <div>
            <h3 class="text-xs font-semibold text-gray-600 uppercase px-3 py-2">
                Recent
            </h3>

            <!-- JS will inject here -->
            <div id="chatDatesContainer" class="flex flex-col space-y-2">
                <?php
                $dates = $messagesView->Dates($_SESSION['user_id']);

                foreach ($dates as $date) {

                    echo '
                    <a href="./index.php?date=' . $date['message_date'] . '" 
                    class="block text-xs text-gray-400 px-3 py-1 whitespace-nowrap hover:text-gray-700">
                        ' . date('F j, Y', strtotime($date['message_date'])) . '
                    </a>';
                }
                ?>
            </div>
        </div>

    </nav>

    <!-- LOGOUT -->
    <div class="p-4 border-t border-gray-200">
        <a href="./logout.php"
           class="w-full flex items-center justify-center gap-2 text-gray-700 hover:text-red-600 transition-colors py-2 px-3 cursor-pointer">
            <span>Logout</span>
        </a>
    </div>

    <script>
        function goToToday() {
            const today = '<?= $today ?>';
            const onIndex = window.location.pathname.endsWith('index.php') 
                            || window.location.pathname.endsWith('/');

            if (onIndex && typeof loadChat === 'function') {
                loadChat(today); // already on index — just load the chat
            } else {
                window.location.href = './index.php'; // redirect to index
            }
        }
    </script>   

</div>