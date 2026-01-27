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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price_per_night', 10, 2);
            $table->integer('max_guests');
            $table->string('bed_type')->nullable();
            $table->string('image')->nullable(); // secure URL
            $table->string('image_public_id')->nullable(); // required for delete
            $table->enum('status', ['available', 'booked', 'maintenance'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
