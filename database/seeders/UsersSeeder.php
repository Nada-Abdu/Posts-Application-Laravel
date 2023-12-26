<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Enums\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =  User::where('email', 'admin@bolgs.com')->first();
        if ($admin == null) {
            $admin =   User::create([
                'name' => 'Admin',
                'email' => 'admin@posts.com',
                'image' => 'user1.jpg',
                'password' => Hash::make('password'),
            ]);

            $adminRole = Role::where('name',  UserRoles::Admin)->first();
            $admin->roles()->sync($adminRole);
        }

        if (User::count() == 1) {
            $userRole = Role::where('name',  UserRoles::User)->first();
            $user1 =   User::create([
                'name' => 'Ahmed',
                'email' => 'ahmed@posts.com',
                'image' => 'user2.jpg',
                'password' => Hash::make('password'),
            ]);
            $user1->roles()->sync($userRole);
            $user2 =   User::create([
                'name' => 'Ali',
                'email' => 'ali@posts.com',
                'image' => 'user3.jpg',
                'password' => Hash::make('password'),
            ]);
            $user2->roles()->sync($userRole);
        }
    }
}
