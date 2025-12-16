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
        Schema::create('evaluators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable()->constrained(table: 'companies')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->constrained(table: 'clients')->onDelete('cascade');
            $table->string('path_logo')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->foreignId('profession_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluators');
    }
};
