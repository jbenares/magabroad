<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobTypes;
class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classifications = [
            'Full-Time',
            'Part-Time',
            'Contract',
            'Freelance',
            'Internship',
            'Temporary',
            'Seasonal',
            'Remote',
            'On-site',
            'Hybrid',
            // Add more classifications as needed
        ];

        foreach ($classifications as $class) {
            JobTypes::create(['name' => $class]);
        }
    }
}
