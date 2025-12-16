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
        Schema::table('recruitment_costs', function (Blueprint $table) {
                $table->string('devise')->after('budget')->nullable(); // or 'EUR', 'USD' — default if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruitment_costs', function (Blueprint $table) {
            $table->dropColumn('devise');
        });
    }
};
