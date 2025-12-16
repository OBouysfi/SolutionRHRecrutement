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
        Schema::create('tracking_applications_skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tracking_application_id', false, true);
            $table->bigInteger('skill_id', false, true)->nullable();
            $table->integer('level', false, true)->nullable();
            $table->timestamps();

            $table->index('tracking_application_id', 'tracking_app_id_idx');
            $table->index('skill_id', 'skill_id_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_applications_skills');
    }
};