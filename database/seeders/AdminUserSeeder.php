<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'hr']);

        $admin = User::updateOrCreate([
            'email' => 'admin@mail.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
            'mobile_number' => random_int(1000000000, 9999999999),
        ]);

        $hr = User::updateOrCreate([
            'email' => 'hr@mail.com'
        ], [
            'name' => 'Admin',
            'password' => bcrypt('secret'),
            'email_verified_at' => now(),
            'mobile_number' => random_int(1000000000, 9999999999),
        ]);

        $admin->assignRole('admin');
        $hr->assignRole('hr');
    }
}
