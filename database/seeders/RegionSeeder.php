<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['country_id' => 139, 'region_name' => 'Abra'],
            ['country_id' => 139, 'region_name' => 'Agusan del Norte'],
            ['country_id' => 139, 'region_name' => 'Agusan del Sur'],
            ['country_id' => 139, 'region_name' => 'Aklan'],
            ['country_id' => 139, 'region_name' => 'Albay'],
            ['country_id' => 139, 'region_name' => 'Antique'],
            ['country_id' => 139, 'region_name' => 'Apayao'],
            ['country_id' => 139, 'region_name' => 'Aurora'],
            ['country_id' => 139, 'region_name' => 'Basilan'],
            ['country_id' => 139, 'region_name' => 'Bataan'],
            ['country_id' => 139, 'region_name' => 'Batanes'],
            ['country_id' => 139, 'region_name' => 'Batangas'],
            ['country_id' => 139, 'region_name' => 'Benguet'],
            ['country_id' => 139, 'region_name' => 'Biliran'],
            ['country_id' => 139, 'region_name' => 'Bohol'],
            ['country_id' => 139, 'region_name' => 'Bukidnon'],
            ['country_id' => 139, 'region_name' => 'Bulacan'],
            ['country_id' => 139, 'region_name' => 'Cagayan'],
            ['country_id' => 139, 'region_name' => 'Camarines Norte'],
            ['country_id' => 139, 'region_name' => 'Camarines Sur'],
            ['country_id' => 139, 'region_name' => 'Camiguin'],
            ['country_id' => 139, 'region_name' => 'Capiz'],
            ['country_id' => 139, 'region_name' => 'Catanduanes'],
            ['country_id' => 139, 'region_name' => 'Cavite'],
            ['country_id' => 139, 'region_name' => 'Cebu'],
            ['country_id' => 139, 'region_name' => 'Compostela Valley'],
            ['country_id' => 139, 'region_name' => 'Cotabato'],
            ['country_id' => 139, 'region_name' => 'Davao del Norte'],
            ['country_id' => 139, 'region_name' => 'Davao del Sur'],
            ['country_id' => 139, 'region_name' => 'Davao Occidental'],
            ['country_id' => 139, 'region_name' => 'Davao Oriental'],
            ['country_id' => 139, 'region_name' => 'Dinagat Islands'],
            ['country_id' => 139, 'region_name' => 'Eastern Samar'],
            ['country_id' => 139, 'region_name' => 'Guimaras'],
            ['country_id' => 139, 'region_name' => 'Ifugao'],
            ['country_id' => 139, 'region_name' => 'Ilocos Norte'],
            ['country_id' => 139, 'region_name' => 'Ilocos Sur'],
            ['country_id' => 139, 'region_name' => 'Iloilo'],
            ['country_id' => 139, 'region_name' => 'Isabela'],
            ['country_id' => 139, 'region_name' => 'Kalinga'],
            ['country_id' => 139, 'region_name' => 'La Union'],
            ['country_id' => 139, 'region_name' => 'Laguna'],
            ['country_id' => 139, 'region_name' => 'Lanao del Norte'],
            ['country_id' => 139, 'region_name' => 'Lanao del Sur'],
            ['country_id' => 139, 'region_name' => 'Leyte'],
            ['country_id' => 139, 'region_name' => 'Maguindanao'],
            ['country_id' => 139, 'region_name' => 'Marinduque'],
            ['country_id' => 139, 'region_name' => 'Masbate'],
            ['country_id' => 139, 'region_name' => 'Misamis Occidental'],
            ['country_id' => 139, 'region_name' => 'Misamis Oriental'],
            ['country_id' => 139, 'region_name' => 'Mountain Province'],
            ['country_id' => 139, 'region_name' => 'Negros Occidental'],
            ['country_id' => 139, 'region_name' => 'Negros Oriental'],
            ['country_id' => 139, 'region_name' => 'Northern Samar'],
            ['country_id' => 139, 'region_name' => 'Nueva Ecija'],
            ['country_id' => 139, 'region_name' => 'Nueva Vizcaya'],
            ['country_id' => 139, 'region_name' => 'Occidental Mindoro'],
            ['country_id' => 139, 'region_name' => 'Oriental Mindoro'],
            ['country_id' => 139, 'region_name' => 'Palawan'],
            ['country_id' => 139, 'region_name' => 'Pampanga'],
            ['country_id' => 139, 'region_name' => 'Pangasinan'],
            ['country_id' => 139, 'region_name' => 'Quezon'],
            ['country_id' => 139, 'region_name' => 'Quirino'],
            ['country_id' => 139, 'region_name' => 'Rizal'],
            ['country_id' => 139, 'region_name' => 'Romblon'],
            ['country_id' => 139, 'region_name' => 'Samar'],
            ['country_id' => 139, 'region_name' => 'Sarangani'],
            ['country_id' => 139, 'region_name' => 'Siquijor'],
            ['country_id' => 139, 'region_name' => 'Sorsogon'],
            ['country_id' => 139, 'region_name' => 'South Cotabato'],
            ['country_id' => 139, 'region_name' => 'Southern Leyte'],
            ['country_id' => 139, 'region_name' => 'Sultan Kudarat'],
            ['country_id' => 139, 'region_name' => 'Sulu'],
            ['country_id' => 139, 'region_name' => 'Surigao del Norte'],
            ['country_id' => 139, 'region_name' => 'Surigao del Sur'],
            ['country_id' => 139, 'region_name' => 'Tarlac'],
            ['country_id' => 139, 'region_name' => 'Tawi-Tawi'],
            ['country_id' => 139, 'region_name' => 'Zambales'],
            ['country_id' => 139, 'region_name' => 'Zamboanga del Norte'],
            ['country_id' => 139, 'region_name' => 'Zamboanga del Sur'],
            ['country_id' => 139, 'region_name' => 'Zamboanga Sibugay'],
        ];

        foreach ($provinces as $province) {
            Region::create($province);
        }
    }
}
