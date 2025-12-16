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
        Schema::create('profiles_skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profile_id', false, true);
            $table->bigInteger('skill_id', false, true)->nullable();
            $table->bigInteger('mission_id', false, true)->nullable();
            $table->string('level', false, true)->nullable();
            $table->integer('weight')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('profile_id');
            $table->index('skill_id');
            $table->index('mission_id');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles_skills');
    }
};
