<?php

namespace App\Events;

use App\Models\Content;
use Illuminate\Broadcasting\InteractsWithSockets;

;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FormSubmitEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $content;

    /**
     * Create a new event instance.
     *
     * @param Content $content
     */
    public function __construct(Content $content)
    {
        $this->content = $content;
//        Log::info('dd', ['event' => $this->content]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
