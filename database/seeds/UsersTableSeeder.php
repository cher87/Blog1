<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        /** @type App\User $user */
        App\User::create([
            'email'    => 'test@test.com',
            'name'     => 'admin',
            'password' => 'admin',
        ]);
    }
}
