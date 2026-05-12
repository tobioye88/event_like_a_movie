<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('occasions', function (Blueprint $table) {
            $table->string('location_country')->nullable()->after('location');
            $table->string('location_state')->nullable()->after('location_country');
            $table->string('location_address')->nullable()->after('location_state');
            $table->string('dress_code_color_one_name')->nullable()->after('dress_code_color_one');
            $table->string('dress_code_color_two_name')->nullable()->after('dress_code_color_two');
            $table->string('side_image')->nullable()->after('background_image');
        });
    }

    public function down(): void
    {
        Schema::table('occasions', function (Blueprint $table) {
            $table->dropColumn([
                'location_country',
                'location_state',
                'location_address',
                'dress_code_color_one_name',
                'dress_code_color_two_name',
                'side_image',
            ]);
        });
    }
};
