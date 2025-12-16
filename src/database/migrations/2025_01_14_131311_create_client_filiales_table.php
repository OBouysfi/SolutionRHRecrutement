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
        Schema::create('client_filiales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade'); 
            $table->string('name');
            $table->string('juridical_form')->nullable();
            $table->string('tax_regime')->nullable(); 
            $table->string('path_logo')->nullable(); 
            $table->string('workforce')->nullable(); 
            $table->string('activity')->nullable(); 
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
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
        Schema::dropIfExists('client_filiales');
    }
};
