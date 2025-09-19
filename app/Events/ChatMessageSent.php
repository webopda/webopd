<?php
namespace App\Events;

use App\Models\Chat; // ✅ ini harus model
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ChatMessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;

    public function __construct(Chat $chat) // ✅ parameternya model
    {
        $this->chat = $chat;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
    }

    public function broadcastAs()
    {
        return 'chat-message';
    }

    public function broadcastWith()
    {
        return [
            'id'       => $this->chat->id,
            'username' => $this->chat->username,
            'message'  => $this->chat->message,
            'is_admin' => $this->chat->is_admin,
            'time'     => $this->chat->created_at->toDateTimeString(),
        ];
    }
    
}
