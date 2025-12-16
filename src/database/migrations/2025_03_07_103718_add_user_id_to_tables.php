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
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('job_offers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('test_techniques', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('test_results', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Corrected here
        });

        Schema::table('tracking_applications', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after("id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('job_offers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('test_techniques', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('test_results', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('tracking_applications', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
