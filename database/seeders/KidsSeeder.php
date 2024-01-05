<?php

namespace Database\Seeders;

use App\Models\Kids;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KidsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kids::create([
            'user_id'=>2,
            's_parent'=>1,
            'first_name'=>'Brayan',
            'second_name'=>'Xavier',
            'last_name'=>'Kowalski',
            'pesel'=>'99837847857',
            'birth_date'=>'2003-03-02',
            'email'=>'brayan@kowalski.pl',
            'phone_number'=>'123456789',
            'zipcode'=>'64-510',
            'post'=>'Wronki',
            'address'=>'Nowa 199',
            'city'=>'Wronki',
            'commune'=>'Wronki',
            'county'=>'Szamotuły',
            'voivodeship'=>'Wielkopolska',
            'school_city'=>'Wronki',
            'school_number'=>2,
            'school_commune'=>'Szamotuły',
            'school_voivodeship'=>'Wielkopolska',
            'exam_pl'=>23,
            'exam_fl'=>3,
            'exam_mat'=>32,
            'exam_photo'=>'1704405795.jpg'
        ]);
        Kids::create([
            'user_id'=>2,
            's_parent'=>1,
            'first_name'=>'Jessica',
            'second_name'=>'Hermenegilda',
            'last_name'=>'Kowalska',
            'pesel'=>'99837847832',
            'birth_date'=>'2003-02-02',
            'email'=>'jessica@kowalska.pl',
            'phone_number'=>'123456789',
            'zipcode'=>'64-510',
            'post'=>'Wronki',
            'address'=>'Nowa 199',
            'city'=>'Wronki',
            'commune'=>'Wronki',
            'county'=>'Szamotuły',
            'voivodeship'=>'Wielkopolska',
            'school_city'=>'Wronki',
            'school_number'=>2,
            'school_commune'=>'Szamotuły',
            'school_voivodeship'=>'Wielkopolska',
        ]);
    }
}
