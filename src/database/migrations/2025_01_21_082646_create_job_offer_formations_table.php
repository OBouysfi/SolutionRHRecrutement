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
        Schema::create('job_offer_formations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_offer_id', false, true)->nullable();
            $table->bigInteger('diploma_id', false, true)->nullable();
            $table->bigInteger('option_id', false, true)->nullable();
            $table->integer('weight_formation')->nullable();
            $table->integer('weight_option')->nullable();
            $table->timestamps();

            $table->index('job_offer_id');
            $table->index('diploma_id');
            $table->index('option_id');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offer_formations');
    }
};
