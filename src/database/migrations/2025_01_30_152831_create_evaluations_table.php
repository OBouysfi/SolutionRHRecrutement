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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluator_id')->constrained(table: 'evaluators')->onDelete('cascade');
            $table->foreignId('evaluation_type_id')->constrained(table: 'evaluation_types')->onDelete('cascade');
            $table->foreignId('profile_id')->constrained()->onDelete('cascade'); 
            $table->integer('mark')->nullable(); 
            $table->integer('ponderation')->nullable();  
            $table->text('evaluation')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
