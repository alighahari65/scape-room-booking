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
        Schema::create('scape_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->integer('max_participants');
            $table->boolean('is_available')->default(1); // zero means is not available;
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scape_rooms');
    }
};
