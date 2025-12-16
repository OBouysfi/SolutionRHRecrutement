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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('juridical_form')->nullable();
            $table->string('tax_regime')->nullable(); 
            $table->string('path_logo')->nullable(); 
            $table->string('workforce')->nullable(); 
            $table->unsignedBigInteger('activity_area_id')->nullable(); 
            $table->foreign('activity_area_id')->references('id')->on('activity_areas')->onDelete('cascade'); 
            $table->string('activity')->nullable(); 
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 
            $table->date('date_creation')->nullable(); 
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
