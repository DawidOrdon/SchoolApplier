<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Languages::create([
            'name'=>'Język Angielski'
        ]);
        \App\Models\Languages::create([
            'name'=>'Język Niemiecki'
        ]);
        \App\Models\Languages::create([
            'name'=>'Język Hiszpański'
        ]);
        \App\Models\Languages::create([
            'name'=>'Język Francuski'
        ]);
    }
}
