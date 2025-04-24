<?php

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
        Schema::create('brigade_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();
            $table->foreignId('brigade_id')
                ->constrained('brigades')
                ->restrictOnDelete();
            $table->date('start_date');
            $table->date('end_date')->nullable(); // null = досі працює в бригаді
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'start_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brigade_user');
    }
};
