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
        //
        Schema::table('test_results', function (Blueprint $table) {
// Drop the old candidate_id column
            $table->dropForeign(['candidate_id']);
            $table->dropColumn('candidate_id');

            // Add the new profile_id column
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade')->after('test_id');

        });

    }

        /**
         * Reverse the migrations.
         */
        public
        function down(): void
        {
            //
            Schema::table('test_results', function (Blueprint $table) {
                // Rollback the profile_id addition
                $table->dropForeign(['profile_id']);
                $table->dropColumn('profile_id');

                // Restore the candidate_id column
                $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
            });

        }
    };
