<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('occasion_rsvps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('occasion_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('response', ['yes', 'no', 'maybe'])->default('yes');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->unique(['occasion_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('occasion_rsvps');
    }
};
