<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <style>
        #chat-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #2d7a3f, #44b36d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            animation: pulse 2s infinite;
            z-index: 10000;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        #chat-toggle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        #chat-widget {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 340px;
            height: 520px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 10000;
            font-family: 'Segoe UI', sans-serif;
        }

        #chat-header {
            background: linear-gradient(135deg, #2d7a3f, #44b36d);
            color: #fff;
            padding: 12px;
            display: flex;
            align-items: center;
            text-align: center;
        }

        #chat-header img {
            width: 80px;
            height: 40px;
            margin-right: 40px;
        }

        #chat-header span {
            font-weight: 600;
            font-size: 1.1rem;
        }

        #chat-messages {
            flex: 1;
            padding: 12px;
            overflow-y: auto;
            background: #f9f9f9;

            /* New styles for watermark */
            background-image: url("{{ asset('assets/IMG/logo111 (1).png') }}");
            background-size: 150px; /* Adjust size as needed */
            background-repeat: no-repeat;
            background-position: center;
            background-blend-mode: luminosity; /* Optional: Makes it look more like a watermark */
            opacity: 0.2; /* Adjust for desired transparency */
            transition: opacity 0.3s ease-in-out; /* Smooth transition */
        }

        /* Style to hide watermark when messages are present */
        #chat-messages.has-messages {
            background-image: none;
            opacity: 1;
        }

        .message { margin-bottom: 10px; display: flex; }

        .message.user .bubble {
            margin-left: auto;
            background: #2d7a3f;
            color: #fff;
            border-bottom-right-radius: 4px;
        }

        .message.bot .bubble {
            margin-right: auto;
            background: #e9ecef;
            color: #333;
            border-bottom-left-radius: 4px;
        }

        .bubble {
            padding: 10px 14px;
            border-radius: 16px;
            max-width: 75%;
            word-wrap: break-word;
            position: relative;
        }

        .typing {
            display: flex;
            align-items: center;
            height: 24px;
        }

        .typing-dot {
            width: 6px;
            height: 6px;
            margin: 0 2px;
            background: #555;
            border-radius: 50%;
            animation: blink 1.4s infinite both;
        }

        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes blink {
            0%, 80%, 100% { opacity: 0; }
            40% { opacity: 1; }
        }

        #quick-questions {
            padding: 10px;
            background: #fff;
            border-top: 1px solid #e0e0e0;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        #quick-questions button {
            flex: 1 1 calc(50% - 8px);
            background: #44b36d;
            border: none;
            color: #fff;
            padding: 6px;
            font-size: 0.85rem;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        #quick-questions button:hover {
            background: #2d7a3f;
        }

        #chat-input {
            display: flex;
            border-top: 1px solid #e0e0e0;
            background: #fff;
        }

        #chat-input input {
            flex: 1;
            border: none;
            padding: 10px;
            font-size: 0.9rem;
        }

        #chat-input button {
            border: none;
            background: linear-gradient(135deg, #2d7a3f, #44b36d);
            color: #fff;
            padding: 0 20px;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        #chat-input button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div id="chat-toggle">
        <img src="{{ asset('assets/IMG/pngtreegreen-chat-bot-icon-program-bot-illustration-vector-picture-image_10800531.png') }}" alt="Chat">
    </div>

    <div id="chat-widget">
        <div id="chat-header" class="d-flex align-items-center justify-content-center">
            <span>SmartHire Bot</span>
        </div>
        <div id="chat-messages"></div>
        <div id="quick-questions">
            <button onclick="selectQuestion('How can I apply for a job?')">How can I apply?</button>
            <button onclick="selectQuestion('What are the requirements?')">Requirements?</button>
            <button onclick="selectQuestion('How do I reset my password?')">Reset password?</button>
            <button onclick="selectQuestion('Who can I contact for help?')">Contact support?</button>
        </div>
        <div id="chat-input">
            <input type="text" id="user-input" placeholder="Type your question...">
            <button onclick="sendCustom()">Send</button>
        </div>
    </div>

    @auth
        <meta id="user-id" data-user-id="{{ Auth::id() }}">
    @endauth

    <script>
        const toggleBtn = document.getElementById('chat-toggle');
        const widgetEl = document.getElementById('chat-widget');
        const messagesEl = document.getElementById('chat-messages');
        const inputEl = document.getElementById('user-input');

        let currentUser_Id = null;
        const userIdMeta = document.getElementById('user-id');
        if (userIdMeta) {
            currentUser_Id = userIdMeta.dataset.userId;
        }

        const getStorageKey = () => {
            return currentUser_Id ? `smartHireChatHistory_${currentUser_Id}` : 'smartHireChatHistory_guest';
        };

        function toggleChat() {
            const style = window.getComputedStyle(widgetEl);
            widgetEl.style.display = (style.display === 'none') ? 'flex' : 'none';
        }
        toggleBtn.addEventListener('click', toggleChat);

        function loadHistory() {
            const history = JSON.parse(localStorage.getItem(getStorageKey()) || '[]');
            messagesEl.innerHTML = '';
            history.forEach(msg => appendMessage(msg.sender, msg.text, false));
            updateWatermarkVisibility(); // Check watermark after loading history
        }

        function saveMessage(sender, text) {
            const history = JSON.parse(localStorage.getItem(getStorageKey()) || '[]');
            history.push({ sender, text });
            localStorage.setItem(getStorageKey(), JSON.stringify(history));
        }

        function appendMessage(sender, text, save = true) {
            const typingEl = document.querySelector('.message.bot.typing');
            if (typingEl) typingEl.remove();
            const msgEl = document.createElement('div');
            msgEl.classList.add('message', sender);
            const bubble = document.createElement('div');
            bubble.classList.add('bubble');
            bubble.innerText = text;
            msgEl.appendChild(bubble);
            messagesEl.appendChild(msgEl);
            messagesEl.scrollTop = messagesEl.scrollHeight;
            if (save) saveMessage(sender, text);
            updateWatermarkVisibility(); // Check watermark after adding a message
        }

        function showTyping() {
            const msgEl = document.createElement('div');
            msgEl.classList.add('message', 'bot', 'typing');
            const bubble = document.createElement('div');
            bubble.classList.add('bubble');
            const dotContainer = document.createElement('div');
            dotContainer.classList.add('typing');
            for (let i = 0; i < 3; i++) {
                const dot = document.createElement('div');
                dot.classList.add('typing-dot');
                dotContainer.appendChild(dot);
            }
            bubble.appendChild(dotContainer);
            msgEl.appendChild(bubble);
            messagesEl.appendChild(msgEl);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        function selectQuestion(question) {
            appendMessage('user', question);
            showTyping();
            setTimeout(() => {
                const lower = question.toLowerCase();
                let answer;
                if (lower.includes('apply')) answer = 'To apply, click on "Hiring Now" and fill out the application form.';
                else if (lower.includes('requirement')) answer = 'Please check the specific job details page for requirements.';
                else if (lower.includes('reset')) answer = 'Click on "Forgot Password" at login and follow the instructions.';
                else if (lower.includes('contact')) answer = 'You can email smarthireteam@gmail.com for assistance';
                else answer = 'Sorry, I don’t have that info right now.';
                appendMessage('bot', answer);
            }, 1200);
        }

        function sendCustom() {
            const text = inputEl.value.trim();
            if (!text) return;
            appendMessage('user', text);
            inputEl.value = '';
            showTyping();
            setTimeout(() => {
                appendMessage('bot', 'Our customer service team will contact you soon.');
            }, 1200);
        }

        function updateWatermarkVisibility() {
            if (messagesEl.children.length > 0) {
                messagesEl.classList.add('has-messages');
            } else {
                messagesEl.classList.remove('has-messages');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadHistory();
        });

        function handleUserChange(newUserId) {
            currentUser_Id = newUserId;
            loadHistory();
        }
    </script>
</body>
</html>