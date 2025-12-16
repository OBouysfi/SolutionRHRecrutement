<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_offers_skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_offer_id', false, true);
            $table->bigInteger('skill_id', false, true)->nullable();
            $table->integer('level', false, true)->nullable();
            $table->integer('weight', false, true)->nullable();
            $table->timestamps();

            $table->index('job_offer_id');
            $table->index('skill_id');
            $table->engine = 'InnoDB';
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_offers_skills');
    }
};