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
        Schema::create('cat_tag', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('cats');

            $table->smallInteger('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_tag');
    }
};
