<?php

namespace Database\Seeders;

use App\User;
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
        User::create([
            'nama'              => 'Admin Webite',
            'email'             => 'adminpulobaroh@gmail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('adminpulobaroh123'),
        ]);
    }
}
