<?php

    // database/migrations/2024_10_29_141424_create_tasks_table.php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('tasks', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->unsignedBigInteger('user_id');
                $table->enum('priority', ['Normal', 'Minor', 'Critical']);
                $table->enum('status', ['Pending', 'Completed', 'Canceled'])->default('Pending'); // Dodato polje status
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('tasks');
        }
    };
