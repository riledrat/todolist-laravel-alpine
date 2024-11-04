<?php

    namespace App\Events;

    use Illuminate\Broadcasting\Channel;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;

    class TaskAssigned implements ShouldBroadcast
    {
        use Dispatchable, InteractsWithSockets, SerializesModels;

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
                new Channel('todolist-laravel-alpine-channel.' . $this->assignedTo), // Korisnik koji dobija zadatak
            ];
        }

        public function broadcastAs()
        {
            return 'assigned-task';
        }
    }
