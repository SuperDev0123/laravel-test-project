<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTableForTeam extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('receipts');
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->index();
            $table->string('provider_id')->index();
            $table->string('amount');
            $table->string('tax');
            $table->timestamp('paid_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
}
