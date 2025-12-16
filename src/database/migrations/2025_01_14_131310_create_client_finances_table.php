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
        Schema::create('client_finances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 
            $table->string('rc')->nullable();
            $table->string('unique_identifier')->nullable();
            $table->string('ice_siret')->nullable();
            $table->string('taxe')->nullable();
            $table->unsignedBigInteger('country_id')->nullable(); 
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade'); 
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 

            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_finances');
    }
};
