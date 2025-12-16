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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
    
            $table->enum('log_type', ['ats', 'match', 'profile', 'job_offer', 'technical_test', 'personnal_test']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('ats_id')->nullable();
            $table->unsignedBigInteger('match_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable(); 
            $table->unsignedBigInteger('job_offer_id')->nullable();
            $table->unsignedTinyInteger('new_status_id')->nullable();
            $table->date('match_date')->nullable();
            $table->date('job_offer_modified_date')->nullable(); // Date de modification de l'offre d'emploi
            $table->date('profile_modified_date')->nullable(); // Date de log profil

            $table->timestamps();
    
            $table->index('user_id');
            $table->index('ats_id');
            $table->index('match_id');
            $table->index('profile_id');
            $table->index('job_offer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
