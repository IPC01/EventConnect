<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'company', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'client', 'created_at' => now(), 'updated_at' => now()],
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'id_role' => 1,
                'phone' => '1111111111',
                'address' => 'Admin Street',
                'id_img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Company User',
                'email' => 'company@example.com',
                'password' => Hash::make('12345678'),
                'id_role' => 2,
                'phone' => '2222222222',
                'address' => 'Company Street',
                'id_img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => Hash::make('12345678'),
                'id_role' => 3,
                'phone' => '3333333333',
                'address' => 'Client Street',
                'id_img' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('event_types')->insert([
            ['name' => 'Wedding', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Birthday Party', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Conference', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Concert', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Workshop', 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
