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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->integer('mileage')->nullable();
            $table->date('buyingDate')->nullable();
            $table->string('color')->nullable();
            $table->string('drivetrain')->nullable();
            $table->string('picture')->nullable();
            $table->string('case')->nullable();
            $table->integer('status')->nullable();
            $table->unsignedBigInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
