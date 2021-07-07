<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('admins')->insert([
           'name'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'0971618198',
            'password'=>Hash::make('admin')
        ]);
    }
}
