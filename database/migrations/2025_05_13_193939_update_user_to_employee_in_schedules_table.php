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
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'date']);
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->foreignId('employee_id')
                ->after('shift_id')
                ->constrained('employees')
                ->restrictOnDelete();

            $table->unique(['employee_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropUnique(['employee_id', 'date']);
            $table->dropForeign(['employee_id']);
            $table->dropColumn('employee_id');

            $table->foreignId('user_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->unique(['user_id', 'date']);
        });
    }
};
