<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WorkCategories;
class WorkCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $categories = [
            'Information Technology',
            'Engineering',
            'Healthcare',
            'Education',
            'Marketing',
            'Sales',
            'Finance',
            'Human Resources',
            'Customer Service',
            'Design',
            'Construction',
            'Manufacturing',
            'Retail',
            'Hospitality',
            'Transportation',
            'Legal',
            'Accounting',
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            WorkCategories::create(['name' => $category]);
        }
    }
}
