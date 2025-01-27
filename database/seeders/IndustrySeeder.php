<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Industry;
class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            'Agriculture',
            'Mining',
            'Manufacturing',
            'Construction',
            'Wholesale and Retail Trade',
            'Transportation and Storage',
            'Accommodation and Food Service Activities',
            'Information and Communication',
            'Financial and Insurance Activities',
            'Real Estate Activities',
            'Professional, Scientific and Technical Activities',
            'Administrative and Support Service Activities',
            'Public Administration and Defense; Compulsory Social Security',
            'Human Health and Social Work Activities',
            'Arts, Entertainment and Recreation',
            'Other Service Activities',
            'Utilities', // Added Utilities sector
            'Information Technology', // Added IT as a separate sector
            'Healthcare', // Added Healthcare as a separate sector
            'Education', // Added Education as a separate sector
            'Finance', // Added Finance as a separate sector
            'Tourism', // Added Tourism as a separate sector
            'Energy', // Added Energy sector
            'Biotechnology', // Added Biotechnology sector
            'Aerospace', // Added Aerospace sector
            'Defense', // Added Defense sector
            'Logistics', // Added Logistics sector
            'Retail', // Added Retail as a separate sector
        ];

        foreach ($industries as $industryName) {
            Industry::create(['name' => $industryName]);
        }
        //DB::table('industries')->insert($industries);
    }
}
