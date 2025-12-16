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
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('parent')->nullable()->after('name');
            $table->string('action')->nullable()->after('parent');
            $table->string('color_btn')->nullable()->after('action');
            $table->string( 'task')->nullable()->after('color_btn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn(['parent', 'action', 'color_btn', 'task']);
        });
    }
};