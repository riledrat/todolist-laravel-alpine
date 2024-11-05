<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    class ActivityLog extends \Illuminate\Database\Eloquent\Model
    {
        use HasFactory;
        protected $fillable = ['user_id', 'description'];
    }
