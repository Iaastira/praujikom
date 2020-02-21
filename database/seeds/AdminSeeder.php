<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'  => 'ilyas',
            'email' => 'aing@gmail.com',
            'password'  => bcrypt('Nastira')
        ]);
    }
}
