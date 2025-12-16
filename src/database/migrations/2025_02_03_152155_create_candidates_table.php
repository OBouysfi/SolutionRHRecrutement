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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('civility')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sexe');
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('family_situation')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('email', 190)->unique();
            $table->string('phone_number', 40)->unique();
            $table->string('status')->nullable();
            $table->string('language')->nullable();
            $table->string('path_picture')->nullable();
            $table->string('cover_photo')->nullable();
            $table->unsignedBigInteger('user_id')->nullable(); 
            $table->string('overtime')->nullable();
            $table->string('group')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
