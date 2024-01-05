<?php

namespace Database\Seeders;

use App\Models\SchoolLanguage;
use App\Models\schools;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        schools::create([
            'user_id'=>1,
            'email'=>'sekretariat@szkolanalesnej.edu.pl',
            'name'=>'Szkoła na leśnej Wronki',
            'desc'=>'Zespół szkół wronki',
            'page'=>'https://www.szkolanalesnej.edu.pl/',
            'phone'=>'123456789',
            'address'=>'lesna 17',
            'city'=>'Wronki',
            'county'=>'Szamotuły',
            'voivodeship'=>'Wielkopolska',
            'img'=>'1703955255.jpg'
        ]);
        SchoolLanguage::create([
            'school_id'=>1,
            'language_id'=>1
        ]);
        SchoolLanguage::create([
            'school_id'=>1,
            'language_id'=>3
        ]);
    }
}
