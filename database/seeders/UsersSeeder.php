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
                'email' => 'admin@bolgs.com',
                'password' => Hash::make('password'),
            ]);

            $adminRole = Role::where('name',  UserRoles::Admin)->first();
            $admin->roles()->sync($adminRole);
        }

        if (User::count() == 1) {
            $userRole = Role::where('name',  UserRoles::User)->first();
            $users =  User::factory(10)->create()->each(function ($user) use ($userRole) {
                $user->roles()->sync($userRole);
            });
        }
    }
}
