import './bootstrap';
import '../css/app.css';

$(document).ready(function() {
    $('#messages').animate({
        scrollTop: '+=90000'
    }, 500);
    $(document).on('click', '#send_message', function(e) {
        e.preventDefault();

        let message = $('#message').val();
        let reserve_id = $('#reseve_id').val();



        $.ajax({
            method: 'get',
            url: '/send-message',
            data: { message: message, reserve_id: reserve_id },
            success: function(res) {
                $('#messages').animate({
                    scrollTop: '+=90000'
                }, 500);
            }
        });

    });
});
let reserve_id = $('#reseve_id').val();
let user_id = $('#user_id').val();
var numbers = [reserve_id, user_id];
numbers.sort(function(a, b) {
    return a - b;
});
var firstNumber = numbers[0];
var secondNumber = numbers[1];
var name_chaneel = 'chat-' + firstNumber + '.' + secondNumber;

window.Echo.channel(name_chaneel)
    .listen('.message', (e) => {

        $('#messages').append('<p class="chat"><strong>(' + e.time + ')<br>' + e.username + '</strong>' + ' :' + e.message + '</p>');
        $('#message').val('');
        $('#messages').animate({
            scrollTop: '+=90000'
        }, 500);
    });