<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@smksa.com',
            'password' => bcrypt('Smkpk-54'),
        ]);
        User::factory()->create([
            'name' => 'Admin Backup',
            'email' => 'codepelitasmksa@gmail.com',
            'password' => bcrypt('123Codepelita;'),
        ]);

        $this->call([
            CategorySeeder::class,
            QuestionsSeeder::class,
            TestQuestionnaireSeeder::class,
        ]);
    }

}
