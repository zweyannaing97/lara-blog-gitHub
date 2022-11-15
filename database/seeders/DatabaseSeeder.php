<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Zwe Yan Naing',
             'email' => 'zyn1@gmail.com',
             'role' => 'admin',
             'password' => Hash::make('asdffdsa')
         ]);
        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('asdffdsa')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test Editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('asdffdsa')
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test Author',
            'email' => 'author@gmail.com',
            'role' => 'author',
            'password' => Hash::make('asdffdsa')
        ]);

        $this->call([
           CategorySeeder::class,
           PostSeeder::class
        ]);
    }
}
