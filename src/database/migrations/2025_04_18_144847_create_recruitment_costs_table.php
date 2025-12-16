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
        Schema::create('recruitment_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // référence à users
            $table->string('platform')->nullable();
            $table->string('logo')->nullable(); // URL ou chemin du logo
            $table->double('budget')->nullable();
            $table->double('amount')->nullable();
            $table->string('invoice')->nullable();
            $table->double('difference')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitment_costs');
    }
};
