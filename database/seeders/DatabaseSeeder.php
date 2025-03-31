<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\IndustrySeeder;
use Database\Seeders\SkillSeeder;
use Database\Seeders\JobTypesSeeder;
use Database\Seeders\WorkCategoriesSeeder;
use Database\Seeders\ApplicantStatusSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\CurrencySeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(CountryCodesSeeder::class);
        $this->call(IndustrySeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(JobTypesSeeder::class);
        $this->call(WorkCategoriesSeeder::class);
        $this->call(ApplicantStatusSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CurrencySeeder::class);
      
    }
}
