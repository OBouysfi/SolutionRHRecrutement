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
        Schema::create('mobility_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profile_id', false, true)->nullable();
            $table->bigInteger('job_offer_id', false, true)->nullable();
            $table->bigInteger('mobility_option_type_id', false, true)->nullable();
            $table->boolean('is_active')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('notice_period_per_month')->nullable();
            $table->timestamps();

            $table->index('profile_id');
            $table->index('job_offer_id');
            $table->index('mobility_option_type_id');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobility_options');
    }
};
