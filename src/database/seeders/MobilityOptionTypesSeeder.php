<?php
namespace Database\Seeders;

use App\Models\MobilityOptionType;
use Illuminate\Database\Seeder;


class MobilityOptionTypesSeeder extends Seeder
{
    public function run()
    {
        $option_types = [
            [
                'parent_id' => null,
                'slug' => 'mobility_geographic',
                'label' => 'Mobilité géographique',
            ],
            [
                'parent_id' => 1,
                'slug' => 'local',
                'label' => 'Locale',
            ],
            [
                'parent_id' => 1,
                'slug' => 'regional',
                'label' => 'Régionale',
            ],
            [
                'parent_id' => 1,
                'slug' => 'national',
                'label' => 'Nationale',
            ],
            [
                'parent_id' => 1,
                'slug' => 'international',
                'label' => 'Internationale',
            ],
            [
                'parent_id' => null,
                'slug' => 'work_mode',
                'label' => 'Mode de travail',
            ],
            [
                'parent_id' => 6,
                'slug' => 'onsite',
                'label' => 'Présentiel',
            ],
            [
                'parent_id' => 6,
                'slug' => 'remote',
                'label' => 'Distanciel',
            ],
            [
                'parent_id' => 6,
                'slug' => 'hybrid',
                'label' => 'Hybride',
            ],
            [
                'parent_id' => null,
                'slug' => 'work_time',
                'label' => 'Temps de travail',
            ],
            [
                'parent_id' => 10,
                'slug' => 'full_time',
                'label' => 'Plein',
            ],
            [
                'parent_id' => 10,
                'slug' => 'part_time',
                'label' => 'Partiel',
            ],
            [
                'parent_id' => null,
                'slug' => 'availability',
                'label' => 'Disponibilité',
            ],
            [
                'parent_id' => 13,
                'slug' => 'immediate',
                'label' => 'Immédiate',
            ],
            [
                'parent_id' => 13,
                'slug' => 'notice',
                'label' => 'Préavis',
            ],
        ];

        foreach ($option_types as $type) {
            MobilityOptionType::create($type);
        }
    }
}
