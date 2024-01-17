<?php

namespace Database\Seeders;

use App\Models\AppStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppStatus::create([
            'name'=>'Nowe',
        ]);
        AppStatus::create([
            'name'=>'W oczekiwaniu na weryfikacje',
        ]);
        AppStatus::create([
            'name'=>'Podanie zaakceptowane',
        ]);
        AppStatus::create([
            'name'=>'Kandydat przyjęty',
        ]);
        AppStatus::create([
            'name'=>'Kandydat na liście rezerwowej',
        ]);
        AppStatus::create([
            'name'=>'Podanie odrzucone',
        ]);
    }
}
