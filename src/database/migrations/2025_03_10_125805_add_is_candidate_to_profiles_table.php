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
        Schema::table('profiles', function (Blueprint $table) {
            //
            // Add 'is_candidate' column after 'is_talented'
            $table->boolean('is_candidate')->default(0)->after('is_talented');
            $table->string('status')->nullable()->after('is_candidate');
            $table->string('language')->nullable()->after('status');
            $table->string('overtime')->nullable()->after('language');
            $table->string('group')->nullable()->after('overtime');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            //
            // Remove 'is_candidate' column
            $table->dropColumn('is_candidate');
            $table->dropColumn('status');
            $table->dropColumn('language');
            $table->dropColumn('overtime');
            $table->dropColumn('group');

        });
    }
};
