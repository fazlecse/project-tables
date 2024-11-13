<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\citie;
use Illuminate\Support\Facades\File;

class CitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/json/cities.json');
        $cities = collect(json_decode($json));

        $cities->each(function($citie){
            citie::create([
                'city_name' => $citie->city_name
            ]);
        });
    }
}
