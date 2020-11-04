<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                //user biasa
                'id_users'          => Str::uuid(),
                'name'              => "Kukuh Yoga Rizki Ananda User",
                'password'          => Hash::make('123'),
                'email'             => "123@gmail.com",
                'email_verified_at'  => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                //admin
                'id_users'          => Str::uuid(),
                'name'              => "Kukuh Yoga Rizki Ananda Admin",
                'password'          => Hash::make('123'),
                'email'             => "1234@gmail.com",
                'email_verified_at'  => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                //belom verif
                'id_users'          => Str::uuid(),
                'name'              => "Kukuh Yoga Rizki Ananda Verif",
                'password'          => Hash::make('123'),
                'email'             => "12345@gmail.com",
                // 'email_verified_at'  => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ]);
    }
}
