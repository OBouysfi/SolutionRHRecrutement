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
        Schema::create('predictive_model', function (Blueprint $table) {
            $table->id();
            // columns : lable , data , profession , status , company , user_id
            $table->string('label');
            $table->json('data');
            $table->string('profession');
            $table->string('assessfirst_uuid')->nullable();
            $table->string('status')->default('pending');
            $table->foreignId('company_id')->constrained('companies')->nullable();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictive_model');
    }
};
