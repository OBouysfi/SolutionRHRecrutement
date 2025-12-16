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
        Schema::table('test_techniques', function (Blueprint $table) {
            //
            $table->integer('average_score')->nullable()->after('questions_number');
            $table->integer('global_score')->nullable()->after('average_score');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('test_techniques', function (Blueprint $table) {
            //
            $table->dropColumn('average_score');
            $table->dropColumn('global_score');

        });
    }
};
