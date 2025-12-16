<?php

use App\Enums\Profile\FavoriteProfileEnum;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_talented')->default(0);
            $table->unsignedBigInteger('talent_folder_id')->nullable();
            $table->foreign('talent_folder_id')->references('id')->on('talent_folders')->onDelete('set null');
            $table->tinyInteger('civility')->nullable();
            $table->string('source')->nullable();
            $table->string('matricule')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('sexe');
            $table->string('identity_type')->nullable();
            $table->string('identity_number')->nullable();
            $table->date('identity_expiration_date')->nullable();
            $table->bigInteger('profession_id',false, true)->nullable();
            $table->tinyInteger('is_active',false, true)->default(1);
            $table->tinyInteger('is_qualified',false, true)->default(0);
            $table->string('contract_type')->nullable(); // enum ( ContractTypeProfileEnum.php )
            $table->string('family_situation')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('city_id')->nullable(); 
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('postal_code')->nullable();
            $table->integer('age')->nullable();
            $table->string('email', 190)->unique();
            $table->string('phone_primary', 40)->unique();
            $table->string('phone_secondary', 40)->nullable();
            $table->string('desired_profile')->nullable();
            $table->string('company_size')->nullable();
            $table->string('sector')->nullable();
            $table->double('salary_expectation')->nullable();
            $table->boolean('is_salary_monthly')->nullable();
            // $table->string('driving_license_category', 10)->nullable();
            $table->boolean('has_driving_license')->nullable();
            $table->string('license_types')->nullable();
            $table->tinyInteger('has_vehicle', false, true)->default(0);
            $table->boolean('is_favorite')->default(FavoriteProfileEnum::NO);
            $table->integer('total_formation_in_years', false, true)->default(0);
            $table->integer('total_formation_in_months', false, true)->default(0);
            $table->integer('total_experience_in_years', false, true)->default(0);
            $table->integer('total_experience_in_months', false, true)->default(0);
            $table->string('path_picture')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('path_cv_parcing')->nullable();
            $table->string('path_cv_manual')->nullable();
            $table->string('path_cover_letter')->nullable();
            $table->string('path_cv_video')->nullable();
            $table->string('cv_video_duration', 20)->nullable();
            $table->string('url_cv')->nullable();
            $table->string('url_linkedin')->nullable();
            $table->string('url_facebook')->nullable();
            $table->string('url_twitter')->nullable();
            $table->string('any_url')->nullable();
            $table->string('categorie_socio_professionnelle')->nullable();
            $table->bigInteger('activity_area_id', false, true)->nullable();
            $table->index('activity_area_id');
            $table->unsignedBigInteger('total_views')->default(0);
            $table->timestamps();

            $table->index('profession_id');
            $table->index('path_picture');
            $table->index('path_cv_parcing');

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
        Schema::dropIfExists('profiles');
    }
};
