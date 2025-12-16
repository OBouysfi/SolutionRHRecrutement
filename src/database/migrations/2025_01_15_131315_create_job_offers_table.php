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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id', false, true);//client
            $table->unsignedBigInteger('city_id')->nullable();//lieu
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            // $table->string('contract_type')->nullable();
            $table->tinyInteger('contract_type_id')->nullable();//type contrat
            $table->tinyInteger('status_id')->nullable();
            // $table->boolean('status_change_mode')->nullable();
            $table->tinyInteger('activity_area_id')->nullable();
            $table->index('activity_area_id');
            $table->tinyInteger('matche_status_id')->nullable();
            $table->integer('profession_id')->nullable();
            $table->index('profession_id');
            $table->string('title'); //poste
            $table->text('company_info')->nullable();//Infos sur l’entreprise
            $table->text('formation_details')->nullable();//Formation
            $table->text('experience_details')->nullable();//Expérience
            $table->text('mission_details')->nullable();//Mission Principale
            $table->text('Responsibilities_details')->nullable();//Responsabilités
            $table->text('technical_skills_details')->nullable();//Compétences techniques
            $table->text('personal_skills_details')->nullable();//Compétences personnelles
            $table->boolean('is_salary_monthly')->nullable();
            $table->double('salary')->nullable();
            $table->integer('nbr_profiles')->nullable();//Nombre Profile
            // $table->boolean('is_mobility_national')->nullable();
            // $table->boolean('is_mobility_international')->nullable();
            // $table->boolean('is_mode_site')->nullable();
            // $table->boolean('is_mode_remote')->nullable();
            // $table->boolean('is_mode_hybrid')->nullable();
            // $table->boolean('is_engagement_full_time')->nullable();
            // $table->boolean('is_engagement_partial')->nullable();
            $table->text('description_responsibilities')->nullable();
            $table->text('description_missions')->nullable();
            $table->text('description_skills')->nullable();
            $table->timestamp('opening_at')->nullable();
            $table->timestamp('mission_started_at')->nullable();//Date début
            $table->timestamp('mission_finished_at')->nullable();//Date fin
            $table->integer('duration')->nullable();//durée
            $table->timestamp('closed_at')->nullable();
            $table->string('client_evaluator')->nullable();//Évaluateur
            $table->string('company_evaluator')->nullable();
            $table->string('client_coefficient')->nullable();
            $table->string('company_coefficient')->nullable();
            $table->boolean('has_driving_license')->nullable();
            $table->string('license_types')->nullable();

            // $table->string('offre_author')->nullable();

            $table->timestamps();
            $table->index('client_id');
            $table->index('contract_type_id');
            $table->index('status_id');
            $table->index('matche_status_id');

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};
