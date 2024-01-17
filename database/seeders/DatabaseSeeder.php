<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Languages;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(Schools_typesSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(SPSeeder::class);
        $this->call(KidsSeeder::class);
        $this->call(AppStatusSeeder::class);
        $this->call(AppSeeder::class);

    }
}
