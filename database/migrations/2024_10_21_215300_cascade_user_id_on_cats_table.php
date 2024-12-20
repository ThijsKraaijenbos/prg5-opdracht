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
        Schema::table('cats', function (Blueprint $table) {
            $table->dropForeign(['user_id']);

            // Re-add the foreign key constraint with ON DELETE CASCADE
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cats', function (Blueprint $table) {
            // Drop the cascade foreign key
            $table->dropForeign(['user_id']);

            // Re-add the foreign key constraint without cascade (the previous state)
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }
};
