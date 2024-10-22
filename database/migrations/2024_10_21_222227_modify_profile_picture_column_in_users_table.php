<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->binary('profile_picture_blob')->nullable(); // New column
        });

        // Drop the old column
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_picture');
        });

        // Rename the new column to match the original column name
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('profile_picture_blob', 'profile_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_picture_blob');
        });
    }
};
