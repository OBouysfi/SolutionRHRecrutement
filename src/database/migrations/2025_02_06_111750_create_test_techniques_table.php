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
        Schema::create('test_techniques', function (Blueprint $table) {
            $table->id();
            $table->string('test_name'); // Test Name
            $table->text('description')->nullable(); // Description
            $table->text('start_message')->nullable(); // Start Message
            $table->text('end_message')->nullable(); // End Message
            $table->string('language'); // Language
            $table->boolean('ordered_questions')->default(false); // Ordered Questions
            $table->boolean('random_questions')->default(false); // Random Questions
            $table->boolean('question_navigation')->default(false); // Allow navigation between questions
            $table->boolean('show_question_list')->default(false); // Show list of questions
            $table->boolean('show_read_question_button')->default(false); // Show button to read the question
            $table->boolean('is_active')->default(true); // Enable/Disable Test
            $table->integer('gra_type_id')->nullable();
            $table->string('subject')->nullable();
            $table->string('group')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('algorithm')->nullable();
            $table->string('tag')->default('library');
            $table->integer('duration')->nullable();
            $table->integer('questions_number')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_techniques');
    }
};
