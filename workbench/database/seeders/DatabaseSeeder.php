<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
// use Heritage\Database\Console\Seeds\WithoutModelEvents;
use Heritage\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // UserFactory::new()->times(10)->create();

        UserFactory::new()->create([
            'name' => 'Test User',
            'email' => 'test@ugarit.com',
        ]);
    }
}
