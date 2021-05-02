<?php



class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Chris Sevilleja',
            'email'    => 'chris@scotch.io',
            'password' => Hash::make('awesome'),
        ));
    }

}