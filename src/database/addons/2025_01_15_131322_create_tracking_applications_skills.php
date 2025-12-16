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
            $table->unsignedBigInteger('trac_app_id', false, true);
            $table->unsignedBigInteger('skill_id', false, true)->nullable();
            $table->integer('level', false, true)->nullable();
            $table->boolean('is_sync_elasticsearch')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('trac_app_id');
            $table->index('skill_id');
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
