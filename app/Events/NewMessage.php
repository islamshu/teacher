<?php
namespace App\Events;

use App\Models\Message;
use App\Models\NewChat;
use BeyondCode\LaravelWebSockets\WebSockets\Channels\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(NewChat $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat-channel');

    }

    public function broadcastAs()
    {
        return 'new-message';
    }
}
