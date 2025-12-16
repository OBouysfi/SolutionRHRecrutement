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
        Schema::create('evaluator_type_coefficients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('evaluator_id')->constrained()->onDelete('cascade');
            $table->integer('coefficient');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluator_type_coefficients');
    }
};
