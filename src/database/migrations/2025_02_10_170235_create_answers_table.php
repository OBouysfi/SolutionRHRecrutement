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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade'); // Associer réponse à une question
            $table->text('answer_text')->nullable(); // Texte de la réponse
            $table->boolean('is_correct')->default(false); // Indique si la réponse est correcte
            $table->integer('order')->nullable()->comment('Order of the answer in the question');
            $table->string('left_item')->nullable();
            $table->string('right_item')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
