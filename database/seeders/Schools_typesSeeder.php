<?php

namespace Database\Seeders;

use App\Models\Schools_types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Schools_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schools_types::create([
            'name'=>'Liceum'
        ]);
        Schools_types::create([
            'name'=>'Technikum'
        ]);
        Schools_types::create([
            'name'=>'Szkoła branżowa'
        ]);
        Schools_types::create([
            'name'=>'Liceum wieczorowe'
        ]);

    }
}
