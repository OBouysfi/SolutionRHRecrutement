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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id', false, true)->nullable();
            $table->bigInteger('profile_id', false, true)->nullable();
            $table->tinyInteger('type_id');
            $table->tinyInteger('reminder_before_days')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('rh_evaluator', 255)->nullable();
            $table->string('tech_evaluator', 255)->nullable();
            $table->timestamp('started_at');
            $table->timestamp('finished_at')->nullable();
            $table->timestamps();
            $table->index('profile_id');
            $table->index('user_id');
            $table->index('type_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
