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
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->string('intro');
            $table->string('couples_name');
            $table->string('slug')->unique();
            $table->string('quote')->nullable();
            $table->dateTime('event_date')->nullable();
            $table->string('stream_url')->nullable();
            $table->text('description')->nullable();
            $table->text('love_story')->nullable();
            $table->json('tags')->nullable();
            $table->json('gallery')->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('metadata')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streams');
    }
};
