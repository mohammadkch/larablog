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
        Schema::create('post_image', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('post_id')->nullable(true)->default(null)->references('id')->on('post');
            $table->string('image')->nullable(false);
            $table->bigInteger('created_at', false, false)->nullable();
            $table->bigInteger('updated_at', false, false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_image');
    }
};
