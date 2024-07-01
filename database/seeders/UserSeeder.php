<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // User::factory()->count(4)->create();

        $admin_accounts = [
            [
                'nom' => 'ENABEL',
                'prenom' => 'Enabel',
                'statut' => 1,
                'adresse' => 'Koudougou',
                'email' => 'admin@senegal.com',
                'password' => bcrypt('password'),
                'role' => 'handler-admin',
                'email_verified_at' => now(),
            ],
            [
                'nom' => 'COOPERATIVE',
                'prenom' => 'Cooperative',
                'statut' => 1,
                'adresse' => 'Ouagadougou',
                'email' => 'admin@cooperative.com',
                'password' => bcrypt('password'),
                'role' => 'handler-op',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($admin_accounts as $admin_account) {
            User::create($admin_account);
        }
    }
}
