<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pass = Hash::make('rabbidsinvasion');
        Admin::insert([
            'nama' => 'Clinchy',
            'email' => 'clinchy@gmail.com',
            'password' => $pass,
            'level' => 'admin',
            'remember_token' => null
        ]);
    }
}
