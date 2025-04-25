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
        Schema::table('brigades', function (Blueprint $table) {
            // Drop the cell_id column if it exists
            if (Schema::hasColumn('brigades', 'cell_id')) {
                $table->dropForeign(['cell_id']);
                $table->dropColumn('cell_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brigades', function (Blueprint $table) {
            // Add the cell_id column back if needed
            if (!Schema::hasColumn('brigades', 'cell_id')) {
                $table->unsignedBigInteger('cell_id')->nullable()->after('id');
                $table->foreign('cell_id')->references('id')->on('cells')->onDelete('cascade');
            }
        });
    }
};
