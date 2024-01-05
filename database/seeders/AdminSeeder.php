<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.pl',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('admin')->assignRole('school');
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.pl',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
            'first_name'=>'Jan',
            'last_name'=>'Kowalski',
            'phone_number'=>'123456789',
            'zipcode'=>'64-510',
            'post'=>'Wronki',
            'address'=>'Nowa 199',
            'city'=>'Wronki',
            'commune'=>'Wronki',
            'county'=>'Szamotuły',
            'voivodeship'=>'Wielkopolska'

        ])->assignRole('user');
    }
}
