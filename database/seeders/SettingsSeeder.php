<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        // Seed Regions of The Gambia
        $regions = [
            ['name' => 'Banjul', 'code' => 'BJ'],
            ['name' => 'Kanifing', 'code' => 'KN'],
            ['name' => 'Brikama', 'code' => 'BR', 'description' => 'West Coast Region'],
            ['name' => 'Mansa Konko', 'code' => 'MK', 'description' => 'Lower River Region'],
            ['name' => 'Kerewan', 'code' => 'KR', 'description' => 'North Bank Region'],
            ['name' => 'Kuntaur', 'code' => 'KU', 'description' => 'Central River Region'],
            ['name' => 'Janjanbureh', 'code' => 'JJ', 'description' => 'Central River Region South'],
            ['name' => 'Basse', 'code' => 'BS', 'description' => 'Upper River Region'],
        ];

        $regionIds = [];
        foreach ($regions as $region) {
            $created = Setting::create([
                'type' => 'region',
                'name' => $region['name'],
                'code' => $region['code'],
                'description' => $region['description'] ?? null,
                'is_active' => true,
                'sort_order' => count($regionIds) + 1
            ]);
            $regionIds[$region['name']] = $created->id;
        }

        // Seed Districts (grouped by region)
        $districts = [
            'Banjul' => [
                'Banjul Central',
                'Banjul North',
                'Banjul South',
            ],
            'Kanifing' => [
                'Bakau',
                'Kanifing Municipal',
                'Kombo North',
            ],
            'Brikama' => [
                'Foni Brefet',
                'Foni Bondali',
                'Foni Bintang',
                'Foni Kansala',
                'Foni Jarrol',
                'Kombo Central',
                'Kombo East',
                'Kombo North',
                'Kombo South',
            ],
            // Add districts for other regions...
            'Mansa Konko' => [
                'Jarra Central',
                'Jarra East',
                'Jarra West',
                'Kiang Central',
                'Kiang East',
                'Kiang West',
            ],
            'Kerewan' => [
                'Lower Niumi',
                'Upper Niumi',
                'Jokadu',
                'Lower Baddibu',
                'Upper Baddibu',
                'Central Baddibu',
            ],
            'Basse' => [
                'Fulladu West',
                'Kantora',
                'Sandu',
                'Wuli East',
                'Wuli West',
            ],
        ];

        foreach ($districts as $region => $districtNames) {
            foreach ($districtNames as $districtName) {
                Setting::create([
                    'type' => 'district',
                    'name' => $districtName,
                    'parent_id' => $regionIds[$region],
                    'is_active' => true,
                    'sort_order' => count($regionIds) + 1
                ]);
            }
        }

        // Seed Ownership Types
        $ownershipTypes = [
            'Freehold',
            'Leasehold',
            'Customary',
            'Government',
            'Communal',
            'Company',
            'Other',
        ];

        foreach ($ownershipTypes as $index => $ownership) {
            Setting::create([
                'type' => 'ownership_type',
                'name' => $ownership,
                'is_active' => true,
                'sort_order' => $index + 1
            ]);
        }

        // Seed Land Use Types
        $landUses = [
            'Residential',
            'Commercial',
            'Industrial',
            'Agricultural',
            'Forestry',
            'Tourism',
            'Conservation',
            'Government',
            'Religious',
            'Educational',
            'Open Space',
            'Mixed Use',
        ];

        foreach ($landUses as $index => $landUse) {
            Setting::create([
                'type' => 'land_use',
                'name' => $landUse,
                'is_active' => true,
                'sort_order' => $index + 1
            ]);
        }

        // Seed Zoning Categories
        $zoningCategories = [
            'High Density Residential',
            'Medium Density Residential',
            'Low Density Residential',
            'Central Business District',
            'General Commercial',
            'Light Industrial',
            'Heavy Industrial',
            'Agricultural Zone',
            'Conservation Zone',
            'Special Development Area',
        ];

        foreach ($zoningCategories as $index => $zone) {
            Setting::create([
                'type' => 'zoning',
                'name' => $zone,
                'is_active' => true,
                'sort_order' => $index + 1
            ]);
        }

        $this->command->info('Successfully seeded Gambia regions, districts, land use types and zoning categories!');
    }
}