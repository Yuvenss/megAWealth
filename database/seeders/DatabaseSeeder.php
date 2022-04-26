<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'user_id' => Str::uuid(),
            'user_name' => 'admin megawealth',
            'user_email' => 'megawealth@gmail.com',
            'user_password' => bcrypt('password'),
            'is_admin' => true
        ]);
    }
}
