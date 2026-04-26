<!DOCTYPE html>
<html lang="en">
<?php 
    // included files
    include __DIR__ . '/Includes/head.php';
?>
<body class="h-screen bg-white overflow-hidden">
    
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-gray-200 flex flex-col">
            <!-- Logo Section -->
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-900">Ennoia</h1>
                <p class="text-xs text-gray-600">Express your self</p>
            </div>

            <!-- New Chat Button -->
            <div class="p-4">
                <button type="button" onclick="window.location.href='chats.php'" class="w-full flex items-center justify-center gap-2 bg-white hover:bg-gray-50 border border-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg transition-colors cursor-pointer">
                    <span>+</span>
                    <span>New Chat</span>
                </button>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-6 space-y-4 overflow-y-auto">
                <!-- Analysis -->
                <div>
                    <a href="#" class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] transition-colors py-2 px-3 rounded-lg hover:bg-gray-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span>Analysis</span>
                    </a>
                </div>

                <!-- Daily Tasks -->
                <div>
                    <a href="#" class="flex items-center gap-3 text-gray-700 hover:text-[#3369FF] transition-colors py-2 px-3 rounded-lg hover:bg-gray-50">
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
                <button type="button" onclick="window.location.href='index.php'" class="w-full flex items-center justify-center gap-2 text-gray-700 hover:text-red-600 transition-colors py-2 px-3 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    <span>Logout</span>
                </button>
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="flex-1 flex flex-col bg-gray-50">
            <!-- Chat Header -->
            <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span class="text-sm text-gray-600">Chat</span>
                    <span class="text-sm text-gray-400">·</span>
                    <span class="text-sm text-gray-600">March 12, 2025</span>
                </div>
                <button class="w-10 h-10 rounded-full bg-[#11B8E5] text-white flex items-center justify-center hover:bg-[#0fa5d0] transition-colors cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </button>
            </div>

            <!-- Chat Title and Search -->
            <div class="bg-white px-8 py-6 border-b border-gray-200 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <h2 id="chatTitle" class="text-2xl font-bold text-gray-900 cursor-pointer hover:text-[#3369FF] transition-colors" onclick="editTitle()">Todays Counselling</h2>
                    <button onclick="editTitle()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <input type="text" placeholder="Search" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3369FF] focus:border-transparent text-sm">
                    </div>
                    <button class="bg-[#395B64] hover:bg-[#2F4D55] text-white font-semibold py-2 px-6 rounded-lg transition-colors cursor-pointer text-sm">
                        Search
                    </button>
                </div>
            </div>

            <!-- Messages Area -->
            <div id="chatMessages" class="flex-1 overflow-y-auto px-8 py-6 space-y-4">
                <!-- Messages will be dynamically added here -->
            </div>

            <!-- Message Input Area -->
            <div class="bg-white border-t border-gray-200 px-8 py-6">
                <div class="flex items-center gap-3">
                    <form id="chatForm" class="flex-1 flex items-center gap-3">
                        <input id="userInput" type="text" placeholder="Share your thoughts..." class="flex-1 px-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#395B64] focus:border-transparent text-sm" autocomplete="off">
                        <button type="submit" class="bg-[#395B64] hover:bg-[#2F4D55] text-white p-3 rounded-full transition-colors cursor-pointer flex items-center justify-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.6563168,11.6889879 L4.13399899,1.16151496 C3.34915502,0.9 2.40734225,0.9 1.77946707,1.4429026 C0.994623095,2.10604706 0.837654326,3.0486314 1.15159189,3.98726575 L3.03521743,10.4282588 C3.03521743,10.5853562 3.19218622,10.7424536 3.50612381,10.7424536 L16.6915026,11.5279405 C16.6915026,11.5279405 17.1624089,11.5279405 17.1624089,12.0008467 C17.1624089,12.4744748 16.6915026,12.4744748 16.6915026,12.4744748 Z"></path>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

        <script>
            const chatForm = document.getElementById('chatForm');
            const chatMessages = document.getElementById('chatMessages');
            const userInput = document.getElementById('userInput');


            /* =========================
            MESSAGE APPENDER
            ========================= */
            function appendMessage(sender, text) {
                const container = document.createElement('div');

                container.className = `flex ${
                    sender === 'user'
                        ? 'justify-end'
                        : 'justify-start'
                }`;

                const bubble = document.createElement('div');

                bubble.className =
                    sender === 'user'
                        ? 'max-w-md bg-[#395B64] text-white px-4 py-3 rounded-lg'
                        : 'max-w-md bg-[#A6CFD5] text-gray-900 px-4 py-3 rounded-lg';

                bubble.innerHTML = `<p class="text-sm">${text}</p>`;

                container.appendChild(bubble);
                chatMessages.appendChild(container);

                chatMessages.scrollTop = chatMessages.scrollHeight;

                return container;
            }


            /* =========================
            TYPING ANIMATION SYSTEM
            ========================= */
            function showTypingIndicator() {

                const typingBubble = appendMessage(
                    'bot',
                    '<span class="typingDots">...</span>'
                );

                let dots = 0;

                const interval = setInterval(() => {
                    dots = (dots + 1) % 4;

                    const indicator = typingBubble.querySelector('.typingDots');

                    if (indicator) {
                        indicator.textContent = '.'.repeat(dots || 3);
                    }

                }, 500);

                return {
                    stop() {
                        clearInterval(interval);
                        typingBubble.remove();
                    }
                };
            }


            /* =========================
            INTRO MESSAGE ON LOAD
            ========================= */
            async function sendIntroduction() {

                const introMessage =
                    "Please introduce yourself briefly and let the user know how you can help them. Do it in a short paragraph.";

                const typing = showTypingIndicator();

                try {
                    const response = await fetch('/Halbert/API/chat.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            text: introMessage
                        })
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    const data = await response.json();

                    typing.stop();

                    appendMessage(
                        'bot',
                        data.response || "Hello! I'm here to help you."
                    );

                } catch (error) {

                    console.error(error);

                    typing.stop();

                    appendMessage(
                        'bot',
                        "Hello! I'm here to help you today."
                    );
                }
            }


            /* =========================
            SEND MESSAGE HANDLER
            ========================= */
            chatForm.addEventListener('submit', async (e) => {

                e.preventDefault();

                const message = userInput.value.trim();
                if (!message) return;

                appendMessage('user', message);
                userInput.value = '';

                const typing = showTypingIndicator();

                try {
                    const response = await fetch('/Halbert/API/chat.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ text: message })
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error: ${response.status}`);
                    }

                    const data = await response.json();

                    typing.stop();

                    appendMessage(
                        'bot',
                        data.response || "No response from AI."
                    );

                } catch (error) {

                    console.error(error);

                    typing.stop();

                    appendMessage(
                        'bot',
                        "Error connecting to AI service. Make sure the server is running."
                    );
                }
            });


            /* =========================
            TITLE EDIT FUNCTION
            ========================= */
            function editTitle() {

                const titleElement = document.getElementById('chatTitle');
                const currentTitle = titleElement.textContent;

                const input = document.createElement('input');

                input.type = 'text';
                input.value = currentTitle;

                input.className =
                    'text-2xl font-bold text-gray-900 border-2 border-[#3369FF] rounded px-2 py-1 focus:outline-none';

                titleElement.replaceWith(input);

                input.focus();
                input.select();

                function saveTitle() {

                    const newTitle = input.value.trim() || currentTitle;

                    const newTitleElement = document.createElement('h2');

                    newTitleElement.id = 'chatTitle';
                    newTitleElement.className =
                        'text-2xl font-bold text-gray-900 cursor-pointer hover:text-[#3369FF] transition-colors';

                    newTitleElement.textContent = newTitle;
                    newTitleElement.onclick = editTitle;

                    input.replaceWith(newTitleElement);
                }

                input.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') saveTitle();
                });

                input.addEventListener('blur', saveTitle);
            }

            window.addEventListener('load', sendIntroduction);
        </script>
        </div>
    </div>

</body>
</html>