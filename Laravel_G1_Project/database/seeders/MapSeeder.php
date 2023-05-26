<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maps = [
            ['image' => 'Mango farm' , 'drone_id' =>1 , 'farm_id' =>2],
            ['image' => 'Orange farm' , 'drone_id' =>2 , 'farm_id' =>1],
            ['image' => 'Chantey farm' , 'drone_id' =>4 , 'farm_id' =>3],
            ['image' => 'Rice farm' , 'drone_id' =>3 , 'farm_id' =>4],
            ['image' => 'ohh yeah farm' , 'drone_id' =>3 , 'farm_id' =>5],
            ['image' => 'hah farm' , 'drone_id' =>4 , 'farm_id' =>6],
            ['image' => 'emm farm' , 'drone_id' =>1 , 'farm_id' =>7],
            ['image' => 'loy farm' , 'drone_id' =>2 , 'farm_id' =>8],
        ];
        foreach ($maps as $map) {
            Map::create($map);
        }
    }
}
