<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        Section::factory()->create([
            'name' => 'apple',
            'goal' => 40,
            'color' => '#FF0000'
        ]);
        Section::factory()->create([
            'name' => 'orange',
            'goal' => 35,
            'color' => '#FFC000'
        ]);

        Section::factory()->create([
            'name' => 'mango',
            'goal' => 30,
            'color' => "#FFFF00",
        ]);


        Student::factory(54)->create();
    }
}
