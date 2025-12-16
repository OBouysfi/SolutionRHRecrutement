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
        Schema::create('job_offer_experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_offer_id', false, true)->nullable();
            $table->bigInteger('profession_id', false, true)->nullable();
            $table->integer('years')->nullable();
            $table->integer('weight_profession')->nullable();
            $table->integer('weight_experience')->nullable();
            $table->timestamps();

            $table->index('job_offer_id');
            $table->index('profession_id');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offer_experiences');
    }
};
