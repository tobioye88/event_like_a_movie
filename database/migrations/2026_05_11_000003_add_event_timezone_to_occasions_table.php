<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('occasions', function (Blueprint $table) {
            $table->string('event_timezone')->default('UTC')->after('event_at');
        });
    }

    public function down(): void
    {
        Schema::table('occasions', function (Blueprint $table) {
            $table->dropColumn('event_timezone');
        });
    }
};
