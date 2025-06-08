<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure roles exist
        $roles = [
            'super_admin',
            'administrator',
            'editor',
        ];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $users = [
            [
                'name' => 'Sheriffo Ceesay',
                'email' => 'sheriffo.ceesay@example.com',
                'password' => bcrypt('password'),
                'role' => 'super_admin',
            ],
            [
                'name' => 'Fatou Camara',
                'email' => 'fatou.camara@example.com',
                'password' => bcrypt('password'),
                'role' => 'administrator',
            ],
            [
                'name' => 'Lamin Sanyang',
                'email' => 'lamin.sanyang@example.com',
                'password' => bcrypt('password'),
                'role' => 'administrator',
            ],
            [
                'name' => 'Isatou Jallow',
                'email' => 'isatou.jallow@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'Ebrima Bah',
                'email' => 'ebrima.bah@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'Awa Touray',
                'email' => 'awa.touray@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'Momodou Jobe',
                'email' => 'momodou.jobe@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'Mariama Faye',
                'email' => 'mariama.faye@example.com',
                'password' => bcrypt('password'),
                'role' => 'administrator',
            ],
            [
                'name' => 'Abdoulie Njie',
                'email' => 'abdoulie.njie@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
            ],
            [
                'name' => 'Binta Coker',
                'email' => 'binta.coker@example.com',
                'password' => bcrypt('password'),
                'role' => 'editor',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );
            $user->syncRoles([$userData['role']]);
        }
    }
}
