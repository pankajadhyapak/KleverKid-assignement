<?php

namespace App\Events;

use App\Academy;
use App\Events\Event;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AcademyViewed extends Event
{
    use SerializesModels;

    public $academy;
    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Academy $academy, Request $request)
    {
        $this->request = $request;
        $this->academy = $academy;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
