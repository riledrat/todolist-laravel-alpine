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
        ];
    }
