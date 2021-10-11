<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Admin',
            'email'     => 'admin@root.com',
            'password'  =>  bcrypt('1234'),
            'role' => \App\Services\IUser::ADMIN_ROLE
        ]);
    }
}
