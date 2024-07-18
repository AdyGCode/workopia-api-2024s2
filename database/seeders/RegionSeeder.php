<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Code inspired by...
     *
     */
    public function run(): void
    {
        // Delete all data from the regions table
        Region::truncate();

        // File Illuminate Facade
        $json=File::get('database/data/regions.json');

        $continents = json_decode($json);

        foreach ($continents as $key=>$continent) {
            Region::create([
               'name'=>$continent->name,
            ]);
        }
    }
}
