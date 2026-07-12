<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $john = User::create([
            'username' => 'johndoe',
            'password' => 'password'
        ]);

        $jane = User::create([
           'username' => 'janedoe',
           'password' => 'password'
        ]);

        $categories = [
            ['name' => 'School'],
            ['name' => 'Household'],
            ['name' => 'Work'],
            ['name' => 'Hobby'],
            ['name' => 'Relationship'],
            ['name' => 'Family'],
            ['name' => 'Other'],
        ];

        DB::table('categories')->insert($categories);

        Todo::factory()
            ->for($john)
            ->checked()
            ->count(30)
            ->create();

        Todo::factory()
            ->for($john)
            ->unchecked()
            ->count(30)
            ->create();

        Todo::factory()
            ->for($jane)
            ->checked()
            ->count(30)
            ->create();

        Todo::factory()
            ->for($jane)
            ->unchecked()
            ->count(30)
            ->create();
    }
}
