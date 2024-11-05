<?php

    namespace App\Models;

    class Task extends \Illuminate\Database\Eloquent\Model
    {
        protected $fillable = [
            'name',
            'description',
            'start_date',
            'end_date',
            'priority',
            'user_id',
            'status',
            'assigned_to',
        ];

        public function assignedUser(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(User::class, 'assigned_to');
        }

        public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return $this->belongsTo(User::class, 'user_id');
        }

    }
