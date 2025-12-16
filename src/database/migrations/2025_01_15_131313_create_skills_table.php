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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('skill_type_id', false, true)->nullable();
            $table->string('slug', 250)->nullable();
            $table->string('label', 250);
            $table->string('level')->nullable();  // enum ( LevelSkillEnum )
            $table->timestamps();

            $table->index('skill_type_id');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
