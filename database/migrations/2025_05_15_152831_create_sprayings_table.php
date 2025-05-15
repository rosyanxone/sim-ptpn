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
        Schema::create('sprayings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('land_id')->constrained('lands')->onDelete('restrict');
            $table->foreignId('pesticide_stock_id')->constrained('pesticide_stocks')->onDelete('restrict');
            $table->dateTime('spraying_date');
            $table->string('amount_spraying')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprayings');
    }
};
