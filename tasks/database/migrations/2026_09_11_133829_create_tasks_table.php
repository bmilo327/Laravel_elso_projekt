<?php

use App\Models\Task;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(false);
            $table->foreignId('user_id')->constrained();//->onDelete('cascade');
            $table->foreignId('project_id')->constrained();
            $table->timestamps();
        });

        Task::create([
            'title' => 'Task 1',
            'description' => 'This is the first task.',
            'end_date' => now()->addDays(7),
            'status' => false,
            'user_id' => 2,
            'project_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
