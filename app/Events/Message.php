<?php

namespace App\Events;

use App\Models\Teacher;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $message;
    public $receiver_id;
    public $mesagee;
    public $email;
    public $time;
    

    public function __construct($username,$email,$message,$receiver_id,$mesagee,$time)
    {

        // $this->username = ;
        $this->mesagee = $mesagee;

        $sender_id = $this->mesagee->sender_id;
        if($sender_id ==get_guard_id()  ){
            $this->username = 'me';
        }else{
            $this->username = Teacher::find($sender_id)->name;
        }
        $this->message = $message;
        $this->receiver_id = $receiver_id;
        $this->email = $email;
        $this->time = $time;
    }

    public function broadcastOn()
    {
        $sender_id = $this->mesagee->sender_id;
        $receiver_id = $this->mesagee->receiver_id;
        $numbers = [$sender_id,$receiver_id];
        sort($numbers);
        $firstNumber = $numbers[0];
        $secondNumber = $numbers[1];

        $channel_name = 'chat-' . $firstNumber . '.' . $secondNumber;
        return new Channel($channel_name);
    }

    public function broadcastAs()
    {
        return 'message';
    }
}