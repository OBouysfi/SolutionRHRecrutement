<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->decimal('min_expected_salary', 10, 2)->nullable()->after('age');
            $table->decimal('max_expected_salary', 10, 2)->nullable()->after('min_expected_salary');
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('min_expected_salary');
            $table->dropColumn('max_expected_salary');
        });
    }
};
