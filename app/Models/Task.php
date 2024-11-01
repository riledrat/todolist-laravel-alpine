<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Task extends Model
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
        
        public function assignedUser()
        {
            return $this->belongsTo(User::class, 'assigned_to');
        }

        // In Task.php model
        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

    }
