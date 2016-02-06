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
    public $ip;

    /**
     * Create a new event instance.
     *
     * @param \App\Academy $academy
     * @param              $ip
     */
    public function __construct(Academy $academy,  $ip)
    {
        $this->ip = $ip;
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
