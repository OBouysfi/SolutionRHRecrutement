<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMatchingTable extends Migration
{
    public function up()
    {
        Schema::create('matching_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('skill_id')->nullable();
            $table->double('profile_score')->default(0);
            $table->double('job_offer_score')->default(0);
            $table->double('skill_match_score')->default(0);
            $table->string('type')->nullable(); // Type of score ("skill", "mobility", etc.)
            $table->unsignedBigInteger('related_id')->nullable(); // Optional: To store related ID (e.g., formation_id, region_id, etc.)
            $table->timestamps();
            $table->engine = 'InnoDB';

            // Clés étrangères
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_matching');
    }
}
