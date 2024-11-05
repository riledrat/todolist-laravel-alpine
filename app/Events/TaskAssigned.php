<?php

    declare(strict_types=1);

    namespace App\Events;

    class TaskAssigned implements \Illuminate\Contracts\Broadcasting\ShouldBroadcastNow
    {
        use \Illuminate\Foundation\Events\Dispatchable;
        use \Illuminate\Broadcasting\InteractsWithSockets;
        use \Illuminate\Queue\SerializesModels;

        public $name;
        public $assignedTo;

        public function __construct($name, $assignedTo)
        {
            $this->name = $name;
            $this->assignedTo = $assignedTo;
        }

        public function broadcastOn(): array
        {
            return [
                new \Illuminate\Broadcasting\Channel('todolist-laravel-alpine-channel.' . $this->assignedTo),
            ];
        }

        public function broadcastAs(): string
        {
            return 'assigned-task';
        }
    }
