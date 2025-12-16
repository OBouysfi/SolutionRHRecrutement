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
        Schema::create('mobility_option_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id', false, true)->nullable();
            $table->string('slug', 50)->unique();
            $table->string('label');
            $table->timestamps();

            $table->index('parent_id');
            $table->index('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobility_option_types');
    }
};
