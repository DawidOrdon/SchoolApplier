<?php

namespace Database\Seeders;

use App\Models\SecondParents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SecondParents::create([
            'user_id'=>2,
            'email'=>'barbara@kowalska.pl',
            'first_name'=>'Barbara',
            'last_name'=>'Kowalska',
            'phone_number'=>'123456789',
            'zipcode'=>'64-510',
            'post'=>'Wronki',
            'address'=>'Nowa 199',
            'city'=>'Wronki',
            'commune'=>'Wronki',
            'county'=>'Szamotuły',
            'voivodeship'=>'Wielkopolska',
        ]);
    }
}
