<?php

use App\User;
use Illuminate\Database\Seeder;

class TestUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = app()->make('config');

        DB::table("users")->delete();

        User::create(array('name' => 'SocialBase', 'username' => 'socialbase', 'password' => Hash::make('socialbase')));
    }
}
