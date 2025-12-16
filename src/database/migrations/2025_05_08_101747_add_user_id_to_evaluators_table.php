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
        Schema::table('evaluators', function (Blueprint $table) {
            $table->unsignedBigInteger('user_related_id')->nullable()->after('last_name');
            $table->foreign('user_related_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('evaluators', function (Blueprint $table) {
            $table->dropForeign(['user_related_id']);
            $table->dropColumn('user_related_id');
    });
    }
};
