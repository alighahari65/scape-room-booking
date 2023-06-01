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
        Schema::create('scape_room_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('scape_room_id');
            $table->integer('discount')->default(0);
            $table->integer('final_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scape_room_user');
    }
};
