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
        Schema::create('apis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('system_name');
            $table->string('type'); // Type de système (SIRH, ERP, etc.)
            $table->string('connection_port')->nullable();
            $table->string('protocol')->default('HTTPS');
            $table->string('access_identifier');
            $table->string('access_password');
            $table->string('api_token')->nullable();
            $table->integer('status')->default(1); // Statut (1: Activé, 0: Désactivé)
            $table->string('image_path')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apis');
    }
};
