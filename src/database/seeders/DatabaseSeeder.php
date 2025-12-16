<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Diploma;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Level;
use App\Models\Profile;
use Illuminate\Database\Seeder;
// use SettingsSeeder;
use Database\Seeders\SettingsSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ActivityAreaSeeder::class);       
        $this->call(RoleTypeSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AssignAllPermissionsToRoleSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(RegionsSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(NewProfessionsSeeder::class);
        $this->call(MobilityOptionTypesSeeder::class);
        $this->call(SkillTypesSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(NewDiplomaOptionsSeeder::class);
        $this->call(EvaluationTypesSeeder::class);
        $this->call(EmailTemplateSeeder::class);
        $this->call(DiplomasSeeder::class);
        $this->call(DiplomaLevelsSeeder::class);
        $this->call(ActivityAreaSeeder::class);
        $this->call(CompaniesSeeder::class);
        $this->call(ApiSeeder::class);
        $this->call(SettingsSeeder::class);
        // Level::factory(10)->create();
        // Diploma::factory(20)->create();
        // Formation::factory(50)->create();
        // Experience::factory(100)->create();
    }
}
