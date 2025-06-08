<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $baseProperties = [
            [
                'parcel_id' => 'GM-BJL-001',
                'street' => 'Kairaba Avenue',
                'city' => 'Serrekunda',
                'state' => 'Kanifing',
                'postal_code' => '220',
                'ownership_type' => 'Freehold',
                'centroid_lat' => 13.4576,
                'centroid_lng' => -16.6766,
                'boundary_coordinates' => [
                    [13.4575, -16.6767],
                    [13.4577, -16.6765],
                    [13.4578, -16.6768],
                    [13.4576, -16.6770],
                ],
                'area' => 500,
                'land_use_type' => 'Residential',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-001',
                'boundary_description' => 'Located near Kairaba Shopping Center, Serrekunda.',
            ],
            [
                'parcel_id' => 'GM-BJL-002',
                'street' => 'Bertil Harding Highway',
                'city' => 'Bakau',
                'state' => 'Kanifing',
                'postal_code' => '221',
                'ownership_type' => 'Leasehold',
                'centroid_lat' => 13.4781,
                'centroid_lng' => -16.6856,
                'boundary_coordinates' => [
                    [13.4780, -16.6857],
                    [13.4782, -16.6855],
                    [13.4783, -16.6858],
                    [13.4781, -16.6860],
                ],
                'area' => 750,
                'land_use_type' => 'Commercial',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-002',
                'boundary_description' => 'Opposite Bakau Stadium, along Bertil Harding Highway.',
            ],
            [
                'parcel_id' => 'GM-BJL-003',
                'street' => 'Independence Drive',
                'city' => 'Banjul',
                'state' => 'Banjul',
                'postal_code' => '100',
                'ownership_type' => 'Freehold',
                'centroid_lat' => 13.4549,
                'centroid_lng' => -16.5790,
                'boundary_coordinates' => [
                    [13.4548, -16.5791],
                    [13.4550, -16.5789],
                    [13.4551, -16.5792],
                    [13.4549, -16.5794],
                ],
                'area' => 600,
                'land_use_type' => 'Government',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-003',
                'boundary_description' => 'Near Arch 22, Banjul.',
            ],
            [
                'parcel_id' => 'GM-WCR-001',
                'street' => 'Brikama Highway',
                'city' => 'Brikama',
                'state' => 'West Coast Region',
                'postal_code' => '300',
                'ownership_type' => 'Leasehold',
                'centroid_lat' => 13.2711,
                'centroid_lng' => -16.6497,
                'boundary_coordinates' => [
                    [13.2710, -16.6498],
                    [13.2712, -16.6496],
                    [13.2713, -16.6499],
                    [13.2711, -16.6501],
                ],
                'area' => 1200,
                'land_use_type' => 'Agricultural',
                'zoning' => 'Rural',
                'survey_plan_number' => 'SPN-2024-004',
                'boundary_description' => 'Farmland near Brikama Market.',
            ],
            [
                'parcel_id' => 'GM-NBR-001',
                'street' => 'North Bank Road',
                'city' => 'Farafenni',
                'state' => 'North Bank Region',
                'postal_code' => '400',
                'ownership_type' => 'Freehold',
                'centroid_lat' => 13.5667,
                'centroid_lng' => -15.6000,
                'boundary_coordinates' => [
                    [13.5666, -15.6001],
                    [13.5668, -15.5999],
                    [13.5669, -15.6002],
                    [13.5667, -15.6004],
                ],
                'area' => 900,
                'land_use_type' => 'Residential',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-005',
                'boundary_description' => 'Near Farafenni General Hospital.',
            ],
            [
                'parcel_id' => 'GM-URR-001',
                'street' => 'Basse Main Road',
                'city' => 'Basse',
                'state' => 'Upper River Region',
                'postal_code' => '500',
                'ownership_type' => 'Leasehold',
                'centroid_lat' => 13.3122,
                'centroid_lng' => -14.2222,
                'boundary_coordinates' => [
                    [13.3121, -14.2223],
                    [13.3123, -14.2221],
                    [13.3124, -14.2224],
                    [13.3122, -14.2226],
                ],
                'area' => 800,
                'land_use_type' => 'Commercial',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-006',
                'boundary_description' => 'Near Basse Market.',
            ],
            [
                'parcel_id' => 'GM-CRR-001',
                'street' => 'Janjanbureh Road',
                'city' => 'Janjanbureh',
                'state' => 'Central River Region',
                'postal_code' => '600',
                'ownership_type' => 'Freehold',
                'centroid_lat' => 13.5333,
                'centroid_lng' => -14.7667,
                'boundary_coordinates' => [
                    [13.5332, -14.7668],
                    [13.5334, -14.7666],
                    [13.5335, -14.7669],
                    [13.5333, -14.7671],
                ],
                'area' => 950,
                'land_use_type' => 'Residential',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-007',
                'boundary_description' => 'Near Janjanbureh Prison.',
            ],
            [
                'parcel_id' => 'GM-LRR-001',
                'street' => 'Soma Highway',
                'city' => 'Soma',
                'state' => 'Lower River Region',
                'postal_code' => '700',
                'ownership_type' => 'Leasehold',
                'centroid_lat' => 13.4333,
                'centroid_lng' => -15.5333,
                'boundary_coordinates' => [
                    [13.4332, -15.5334],
                    [13.4334, -15.5332],
                    [13.4335, -15.5335],
                    [13.4333, -15.5337],
                ],
                'area' => 1100,
                'land_use_type' => 'Agricultural',
                'zoning' => 'Rural',
                'survey_plan_number' => 'SPN-2024-008',
                'boundary_description' => 'Near Soma Market.',
            ],
            [
                'parcel_id' => 'GM-NBR-002',
                'street' => 'Kerewan Road',
                'city' => 'Kerewan',
                'state' => 'North Bank Region',
                'postal_code' => '410',
                'ownership_type' => 'Freehold',
                'centroid_lat' => 13.4892,
                'centroid_lng' => -16.0886,
                'boundary_coordinates' => [
                    [13.4891, -16.0887],
                    [13.4893, -16.0885],
                    [13.4894, -16.0888],
                    [13.4892, -16.0890],
                ],
                'area' => 700,
                'land_use_type' => 'Residential',
                'zoning' => 'Urban',
                'survey_plan_number' => 'SPN-2024-009',
                'boundary_description' => 'Near Kerewan Health Centre.',
            ],
            [
                'parcel_id' => 'GM-WCR-002',
                'street' => 'Sanyang Coastal Road',
                'city' => 'Sanyang',
                'state' => 'West Coast Region',
                'postal_code' => '320',
                'ownership_type' => 'Leasehold',
                'centroid_lat' => 13.1881,
                'centroid_lng' => -16.7558,
                'boundary_coordinates' => [
                    [13.1880, -16.7559],
                    [13.1882, -16.7557],
                    [13.1883, -16.7560],
                    [13.1881, -16.7562],
                ],
                'area' => 850,
                'land_use_type' => 'Tourism',
                'zoning' => 'Coastal',
                'survey_plan_number' => 'SPN-2024-010',
                'boundary_description' => 'Near Sanyang Beach.',
            ],
        ];

        // Update land use and zoning options to match form select options
        $landUseTypes = ['Residential', 'Commercial', 'Agricultural', 'Industrial', 'Mixed_use'];
        $zoningTypes = ['R1', 'R2', 'C1', 'A1', 'I1'];

        // Generate 100 properties by varying the base properties
        for ($i = 1; $i <= 100; $i++) {
            $base = $baseProperties[($i - 1) % count($baseProperties)];
            $property = $base;
            $property['parcel_id'] = $base['parcel_id'] . '-' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $property['survey_plan_number'] = $base['survey_plan_number'] . '-' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $property['area'] = $base['area'] + rand(-50, 150);
            $property['centroid_lat'] = round($base['centroid_lat'] + (rand(-100, 100) / 10000), 6);
            $property['centroid_lng'] = round($base['centroid_lng'] + (rand(-100, 100) / 10000), 6);

            // Generate random boundary coordinates around centroid in the required format
            $lat = $property['centroid_lat'];
            $lng = $property['centroid_lng'];
            $boundaryCoordinates = [
                ['lat' => round($lat + 0.0005, 6), 'lng' => round($lng + 0.0005, 6)],
                ['lat' => round($lat + 0.0005, 6), 'lng' => round($lng - 0.0005, 6)],
                ['lat' => round($lat - 0.0005, 6), 'lng' => round($lng - 0.0005, 6)],
                ['lat' => round($lat - 0.0005, 6), 'lng' => round($lng + 0.0005, 6)],
            ];
            $property['boundary_coordinates'] = $boundaryCoordinates;

            // Assign random land use and zoning using the updated options
            $property['land_use_type'] = $landUseTypes[array_rand($landUseTypes)];
            $property['zoning'] = $zoningTypes[array_rand($zoningTypes)];

            Property::create($property);
        }
    }
}
