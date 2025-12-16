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
        Schema::create('campaign', function (Blueprint $table) {
            $table->id();
            
            $table->string('label')->nullable();
            $table->string('assessfirst_id');
            $table->unsignedBigInteger('predictive_model_id')->nullable();
            $table->foreign('predictive_model_id')->references('id')->on('predictive_model')->onDelete('cascade');

            $table->unsignedBigInteger('location')->nullable();         // foreign key of city table
            $table->foreign('location')->references('id')->on('cities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign');
    }
};
