@extends('layouts.index')
@section('css')
<link rel="stylesheet" href="{{ asset('frontend/css/chat.css') }}">
@endsection
@section('content')
<section id="chat-section" style="margin-top: 50px !important;"></section>
<form id="chat-form">
    <input type="text" name="message" id="message-input" placeholder="Type your message here...">
    <input type="hidden" name="resever_id" id="message-id" value="10" >
    <input type="hidden" name="resever_guard" id="message-guard" value="teacher" >
    <button type="submit" id="send-button">Send</button>
</form>

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script>
        
        // Connect to Pusher
        Pusher.logToConsole = true;

const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
    cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
    encrypted: true
});

// Subscribe to the chat channel
const channel = pusher.subscribe('chat');

// Listen for new messages
channel.bind('new-message', function(data) {
    // Create a new chat message element
    console.log(data.message.username);
    const chatMessage = document.createElement('div');
    chatMessage.classList.add('chat-message');
    chatMessage.innerHTML = `
        <div class="avatar">
            <img src="${data.message.avatar}" alt="${data.message.username}">
        </div>
        <div class="message">
            <span class="username">${data.message.username}</span>
            <span class="text">${data.message.message}</span>
        </div>
    `;

    // Add the message to the chat section
    const chatSection = document.getElementById('chat-section');
    chatSection.appendChild(chatMessage);

    // Scroll to the bottom of the chat section
    chatSection.scrollTop = chatSection.scrollHeight;
});

// Send a new message
const chatForm = document.getElementById('chat-form');
chatForm.addEventListener('submit', function(event) {
    event.preventDefault();

    const messageInput = document.getElementById('message-input');
    const idInput = document.getElementById('message-id');
    const GuradInput = document.getElementById('message-guard');

    const messageText = messageInput.value.trim();
    const messageid = idInput.value.trim();
    const messageguard = GuradInput.value.trim();

    if (messageText !== '') {
        // Send the message to the server
        axios.post('/send-message', {
            message: messageText,
            resever_id: messageid,
            resever_guard: messageguard

        }).then(function(response) {
            // Clear the input field
            messageInput.value = '';
        }).catch(function(error) {
            console.error(error);
        });
    }
});

    </script>
@endsection