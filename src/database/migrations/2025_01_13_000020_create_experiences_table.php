<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profile_id', false, true);
            $table->string('logo')->nullable();
            $table->string('company')->nullable();
            $table->bigInteger('profession_id', false, true);
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->string('project_name')->nullable();
            $table->string('skills_tech')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->boolean('current_job')->default(false)->nullable();
            $table->timestamps();
            
            $table->index('profile_id');
            $table->index('profession_id');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
};
