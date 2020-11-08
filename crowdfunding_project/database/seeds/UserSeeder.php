<?php

use Illuminate\Database\Seeder;
use App\Role;

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
                'id'                => Str::uuid(),
                'name'              => "Kukuh Yoga Rizki Ananda User",
                'password'          => Hash::make('123'),
                'email'             => "123@gmail.com",
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
                'role_id'           => Role::where('name', 'user')->first()->id
            ],
            [
                //admin
                'id'                => Str::uuid(),
                'name'              => "Kukuh Yoga Rizki Ananda Admin",
                'password'          => Hash::make('123'),
                'email'             => "1234@gmail.com",
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
                'role_id'           => Role::where('name', 'admin')->first()->id
            ],
        ]);
    }
}
