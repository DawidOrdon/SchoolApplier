<?php

namespace Database\Seeders;

use App\Http\Controllers\ClassesController;
use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'school_id'=>1,
            'name'=>'Technik informatyk',
            'desc'=>'Komputery',
            'slots'=>24,
            'school_type'=>'2',
            'subject1'=>9,
            'subject2'=>6,

        ]);
    }
}
