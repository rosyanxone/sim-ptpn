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
        Schema::create('fertilizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('land_id')->constrained('lands')->onDelete('restrict');
            $table->foreignId('fertilization_stock_id')->constrained('fertilization_stocks')->onDelete('restrict');
            $table->dateTime('fertilization_date');
            $table->string('amount_fertilized');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fertilizations');
    }
};
