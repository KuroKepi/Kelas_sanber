<?php

use Illuminate\Database\Seeder;
use App\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            //admin
            'id'                => Str::uuid(),
            'name'              => "Kukuh Yoga Rizki Ananda Admin",
            'password'          => Hash::make('123'),
            'email'             => "1234@gmail.com",
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
            'role_id'           => Role::where('name', 'admin')->first()->id
        ]);
    }
}
