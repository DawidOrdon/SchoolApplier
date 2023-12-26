<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Subjects::create([
            'name'=>'Język Polski'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Matematyka'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Pierwszy język obcy'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Drugi język obcy'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Historia'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Chemia'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Fizyka'
        ]);
         \App\Models\Subjects::create([
            'name'=>'Geografia'
        ]);
         \App\Models\Subjects::create([
            'name'=>'Biologia'
        ]);
         \App\Models\Subjects::create([
            'name'=>'Informatyka'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Wychowanie fizyczne'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Wiedza o społeczeństwie'
        ]);
        \App\Models\Subjects::create([
            'name'=>'Edukacja dla bezpieczeństwa'
        ]);

    }
}
