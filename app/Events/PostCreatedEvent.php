<?php

declare(strict_types=1);

namespace Modules\Post\Events;

use Illuminate\Queue\SerializesModels;

final class PostCreatedEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [];
    }
}
