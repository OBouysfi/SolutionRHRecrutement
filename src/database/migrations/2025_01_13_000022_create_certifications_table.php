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
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('logo')->nullable();
            $table->string('organisme')->nullable();
            $table->string('numero_accreditation')->nullable();
            $table->string('adresse')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('telephone_1')->nullable();
            $table->string('telephone_2')->nullable();
            $table->string('email')->nullable();
            $table->string('nom_certification')->nullable();
            $table->text('criteres_evaluation')->nullable();
            $table->string('theme_certification')->nullable();
            $table->string('score_resultat')->nullable();
            $table->string('niveau_certification')->nullable();
            $table->date('date_obtention')->nullable();
            $table->string('volume_horaire')->nullable();
            $table->date('date_expiration')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
