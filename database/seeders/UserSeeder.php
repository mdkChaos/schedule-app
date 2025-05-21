<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::pluck('id', 'name');

        $users = [
            [
                'login' => 'User',
                'password' => 'user123',
                'role' => 'User',
            ],
            [
                'login' => 'Manager',
                'password' => 'manager123',
                'role' => 'Manager',
            ],
            [
                'login' => 'Admin',
                'password' => 'admin123',
                'role' => 'Admin',
            ],
            [
                'login' => 'Super Admin',
                'password' => 'superadmin123',
                'role' => 'Super Admin',
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['login' => $user['login']],
                [
                    'password' => Hash::make($user['password']),
                    'role_id' => $roles[$user['role']],
                ]
            );
        }
    }
}
