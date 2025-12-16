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
        Schema::create('tracking_applications_matches', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_offer_id', false, true);
            $table->bigInteger('profile_id', false, true);
            $table->double('sum_weight_job_offer_skills')->default(0);
            $table->double('sum_ratio_profile_skill')->default(0);
            $table->double('sum_ratio_profile_skill_x_weight_criteria')->default(0);
            $table->double('ratio')->default(0);
            $table->timestamps();

            $table->index('job_offer_id');
            $table->index('profile_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_applications_matches');
    }
};
