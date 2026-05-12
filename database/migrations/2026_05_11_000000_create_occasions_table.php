<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('occasions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('theme_color')->default('#9b007e');
            $table->string('background_image')->nullable();
            $table->dateTime('event_at');
            $table->string('location');
            $table->text('accommodation')->nullable();
            $table->string('dress_code_color_one')->default('#000000');
            $table->string('dress_code_color_two')->default('#ffffff');
            $table->text('custom_message')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('occasions');
    }
};
