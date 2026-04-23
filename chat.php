<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/Includes/head.php'; ?>
<body class="h-full">
    
    <div class="w-full h-screen grid grid-cols-1 lg:grid-cols-[auto_1fr] gap-0">
        <div class="hidden lg:block">
            <?php include __DIR__ . '/Includes/sidebar.php'; ?>
        </div>

        <div class="flex flex-col h-screen">
            <div class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
                <div class="flex gap-3">
                    <img src="./Assets/Halbert.svg" alt="Halbert" class="w-8 h-8">
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-800">Halbert</span>
                        <span class="text-xs text-green-500 font-medium">• Online</span>
                    </div>
                </div>
            </div>

            <div id="chatMessages" class="flex-1 overflow-y-auto px-8 py-12 flex flex-col gap-4">
                
                <div id="welcomeSection" class="text-center my-auto">
                    <div class="flex justify-center mb-4">
                        <img src="./Assets/translate.svg" alt="Welcome" class="scale-150">
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome</h1>
                    <p class="text-md font-bold text-gray-800 mb-8">Need a buddy to chat with?</p>
                </div>
            </div>

            <div class="flex items-center justify-center bg-white px-8 py-8 border-t border-gray-100">
                <div class="w-full max-w-2xl shadow-lg border border-gray-100 rounded-3xl px-4 py-2">
                    <form id="chatForm" class="flex items-end gap-3">
                        <textarea id="userInput" name="message" placeholder="Share your thoughts..." class="flex-1 bg-transparent outline-none text-md text-gray-700 placeholder-gray-400 resize-none max-h-15 overflow-y-auto" rows="1" maxlength="2000" autocomplete="off"></textarea>
                        <button type="submit" class="flex items-center justify-center rounded-full p-2 hover:bg-gray-100 transition-colors cursor-pointer flex-shrink-0 text-gray-400 hover:text-gray-600">
                            <img src="./Assets/send.svg" alt="Send" class="w-5 h-5">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const chatForm = document.getElementById('chatForm');
        const chatMessages = document.getElementById('chatMessages');
        const userInput = document.getElementById('userInput');
        const welcomeSection = document.getElementById('welcomeSection');

        // Auto-resize textarea height based on content
        function autoResizeTextarea() {
            userInput.style.height = 'auto';
            userInput.style.height = Math.min(userInput.scrollHeight, 128) + 'px'; // 128px = max-h-32 (32 * 4)
        }

        userInput.addEventListener('input', autoResizeTextarea);
        userInput.addEventListener('keydown', (e) => {
            // Allow Enter to submit, Shift+Enter for new line
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                chatForm.dispatchEvent(new Event('submit'));
            }
        });

        // Function for example buttons
        window.sendExample = function(text) {
            userInput.value = text;
            autoResizeTextarea();
            chatForm.dispatchEvent(new Event('submit'));
        };

        function appendMessage(sender, text) {
            // Hide welcome screen on first message
            if (welcomeSection) {
                welcomeSection.style.display = 'none';
            }

            const container = document.createElement('div');
            container.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'}`;

            const bubble = document.createElement('div');
            bubble.className = `max-w-[80%] p-4 rounded-2xl shadow-sm ${
                sender === 'user' 
                ? 'bg-blue-600 text-white rounded-tr-none' 
                : 'bg-gray-200 text-gray-800 rounded-tl-none'
            }`;
            bubble.innerText = text;

            container.appendChild(bubble);
            chatMessages.appendChild(container);
            chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll
        }

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = userInput.value.trim();
            if (!message) return;

            appendMessage('user', message);
            userInput.value = '';
            autoResizeTextarea();

            // Show a "typing" indicator or placeholder
            const typingId = 'typing-' + Date.now();
            appendMessage('bot', '...', typingId); 

            try {
                // Send message to PHP API endpoint
                const response = await fetch('/Halbert/API/chat.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ text: message })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                
                // Remove the "..." and add real response
                chatMessages.lastElementChild.remove(); 
                appendMessage('bot', data.response || "No response from AI.");
                
            } catch (error) {
                console.error('Error:', error);
                chatMessages.lastElementChild.remove();
                appendMessage('bot', "Error connecting to AI service. Make sure Ollama is running and PHP API is available.");
            }
        });
    </script>
</body>
</html>