<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $cities = [
            'Bacolod City', 'Bago City', 'Cadiz City', 'Escalante City', 'Himamaylan City',
            'Kabankalan City', 'La Carlota City', 'Sagay City', 'San Carlos City', 'Silay City',
            'Sipalay City', 'Talisay City', 'Victorias City',
            'Binalbagan', 'Calatrava', 'Candoni', 'Cauayan', 'Enrique B. Magalona',
            'Hinigaran', 'Hinoba-an', 'Ilog', 'Isabela', 'La Castellana',
            'Manapla', 'Moises Padilla', 'Murcia', 'Pontevedra', 'Pulupandan',
            'Salvador Benedicto', 'San Enrique', 'Toboso', 'Valladolid'
        ];

        $country_id = 139; // Set this to the correct country ID
        $region_id = 52; // Set this to the correct region ID for Western Visayas

        foreach ($cities as $city) {
            City::create([
                'city_name' => $city,
                'country_id' => $country_id,
                'region_id' => $region_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
