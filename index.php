<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<?php 
    if (!isset($_SESSION['user_id'])) {
        header("Location: welcome.php");
        exit();
    }

    // included files
    include_once __DIR__ . '/Includes/head.php';
    include_once __DIR__ . '/Classes/MessagesView.class.php';

    // Date passed
    $selectedDate = $_GET['date'] ?? date('Y-m-d');

    $start = $selectedDate . " 00:00:00";
    $end   = date('Y-m-d', strtotime($selectedDate . ' +1 day')) . " 00:00:00";
?>
<body class="h-screen bg-white overflow-hidden">
    
    <div class="flex h-screen">

        <!-- Sidebar -->
        <?php include __DIR__ . '/Includes/sidebar.php'; ?>

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
                    <span class="text-sm text-gray-600" id="chatDateDisplay">
                        <?= date('F j, Y') ?>
                    </span>
                </div>
                <button class="w-10 h-10 rounded-full bg-[#11B8E5] text-white flex items-center justify-center hover:bg-[#0fa5d0] transition-colors cursor-pointer">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </button>
            </div>

            
            <!-- Chat Title and Search -->
            
            <div class="bg-white px-8 py-6 border-b border-gray-200 flex items-center justify-end">

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
                <div class="flex-1 flex items-end gap-3">
                    <form id="chatForm" class="flex-1 flex items-center gap-3">
                        <textarea
                            id="userInput"
                            rows="1"
                            placeholder="Share your thoughts..."
                            class="flex-1 px-6 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#395B64] focus:border-transparent text-sm resize-none overflow-hidden"
                            autocomplete="off"
                        ></textarea>
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
            const sendButton = chatForm.querySelector('button');

            let isGenerating = false;

            /* =========================
            DATES
            ========================= */
            const TODAY = new Date().toISOString().split('T')[0];

            // PHP injected selected date OR fallback to today
            const ACTIVE_DATE = "<?= $selectedDate ?? '' ?>" || TODAY;

            /* =========================
            UTILS
            ========================= */
            function safeJson(response) {
                return response.json().catch(() => ({}));
            }

            /* =========================
            UI: MESSAGE RENDER
            ========================= */
            function appendMessage(sender, text) {
                const wrapper = document.createElement('div');
                wrapper.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'}`;

                const bubble = document.createElement('div');
                bubble.className =
                    sender === 'user'
                        ? 'max-w-md bg-[#3F646E] text-white px-4 py-3 rounded-lg'
                        : 'max-w-md bg-[#395B64] text-white px-4 py-3 rounded-lg';

                bubble.innerHTML = `<p class="text-sm">${text}</p>`;

                wrapper.appendChild(bubble);
                chatMessages.appendChild(wrapper);

                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            /* =========================
            LOCKING (ENABLE/DISABLE CHAT)
            ========================= */
            function setLocked(state, placeholder = "") {
                isGenerating = state;
                userInput.disabled = state;
                sendButton.disabled = state;

                if (placeholder) userInput.placeholder = placeholder;

                sendButton.classList.toggle('opacity-50', state);
                sendButton.classList.toggle('cursor-not-allowed', state);

                if (!state) userInput.focus();
            }

            /* =========================
            TYPING INDICATOR
            ========================= */
            function typingIndicator() {
                const el = document.createElement('div');
                el.className = "flex justify-start";

                const bubble = document.createElement('div');
                bubble.className = "max-w-md bg-[#395B64] text-white px-4 py-3 rounded-lg";
                bubble.textContent = "...";

                el.appendChild(bubble);
                chatMessages.appendChild(el);

                let dots = 0;
                const interval = setInterval(() => {
                    dots = (dots + 1) % 4;
                    bubble.textContent = ".".repeat(dots || 3);
                }, 400);

                return {
                    stop() {
                        clearInterval(interval);
                        el.remove();
                    }
                };
            }

            /* =========================
            INTRO (TODAY ONLY)
            ========================= */
            async function runIntro() {
                setLocked(true, "Ennoia is responding...");

                const typing = typingIndicator();
                await new Promise(r => setTimeout(r, 1200));
                typing.stop();

                appendMessage(
                    'bot',
                    "Hello, I am Ennoia! Your supportive companion. I'm here to listen and help you reflect on your thoughts and emotions."
                );

                await new Promise(r => setTimeout(r, 600));

                const starters = [
                    "How have you been feeling lately?",
                    "What’s been on your mind today?",
                    "How was your day emotionally?",
                    "Is there something you'd like to talk about today?",
                    "What emotions have been strongest for you recently?",
                    "What’s been bothering you lately?",
                    "How are you feeling right now?"
                ];

                const question = starters[Math.floor(Math.random() * starters.length)];

                const qTyping = typingIndicator();
                await new Promise(r => setTimeout(r, 1000));
                qTyping.stop();

                appendMessage('bot', question);

                setLocked(false);
            }

            /* =========================
            LOAD CHAT
            ========================= */
            async function loadChat(date) {

                chatMessages.innerHTML = "";

                const isToday = date === TODAY;

                // update header
                const dateObj = new Date(date + 'T00:00:00');
                document.getElementById('chatDateDisplay').textContent =
                    dateObj.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                try {

                    const url = isToday
                        ? `./API/history.php?action=recent`
                        : `./API/history.php?action=messages&date=${date}`;

                    const res = await fetch(url);
                    const data = await safeJson(res);

                    const messages = Array.isArray(data.messages) ? data.messages : [];

                    if (messages.length > 0) {

                        messages.forEach(m => {
                            if (m.USER_MESSAGE) appendMessage('user', m.USER_MESSAGE);
                            if (m.BOT_MESSAGE) appendMessage('bot', m.BOT_MESSAGE);
                        });

                        setLocked(!isToday);
                        return;
                    }

                    // no messages
                    if (isToday) {
                        await runIntro();
                    } else {
                        appendMessage('bot', "No messages found for this date.");
                        setLocked(true);
                    }

                } catch (err) {
                    console.error(err);
                    appendMessage('bot', "Could not load chat history.");

                    if (isToday) {
                        await runIntro();
                    } else {
                        setLocked(true);
                    }
                }
            }

            /* =========================
            SEND MESSAGE
            ========================= */
            chatForm.addEventListener('submit', async (e) => {
                e.preventDefault();

                if (isGenerating) return;

                const message = userInput.value.trim();
                if (!message) return;

                appendMessage('user', message);
                userInput.value = "";
                autoResize();

                setLocked(true, "Ennoia is responding...");

                const typing = typingIndicator();

                try {
                    const res = await fetch('./API/chat.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({ text: message })
                    });

                    const data = await safeJson(res);

                    typing.stop();
                    appendMessage('bot', data.response || "No response.");

                } catch {
                    typing.stop();
                    appendMessage('bot', "Error connecting to AI service.");
                }

                setLocked(false);
            });

            /* =========================
            AUTO RESIZE
            ========================= */
            const MAX_HEIGHT = 160;

            function autoResize() {
                userInput.style.height = "auto";

                if (userInput.scrollHeight > MAX_HEIGHT) {
                    userInput.style.height = MAX_HEIGHT + "px";
                    userInput.style.overflowY = "auto";
                } else {
                    userInput.style.height = userInput.scrollHeight + "px";
                    userInput.style.overflowY = "hidden";
                }
            }

            userInput.addEventListener("input", autoResize);

            userInput.addEventListener("keydown", (e) => {
                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    chatForm.requestSubmit();
                }
            });

            /* =========================
            INIT
            ========================= */
            window.addEventListener('load', () => {
                loadChat(ACTIVE_DATE);
            });
            </script>
        </div>
    </div>

</body>
</html>