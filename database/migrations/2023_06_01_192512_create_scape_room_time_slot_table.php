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
        Schema::create('scape_room_time_slot', function (Blueprint $table) {
            $table->id();
            $table->integer('time_slot_id');
            $table->integer('scape_room_id');
            $table->boolean('is_available')->default(1); // zero means is not available;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scape_room_time_slot');
    }
};
