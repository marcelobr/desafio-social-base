<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        if (count($users) == 0) {

            User::create(array('name' => 'SocialBase', 'username' => 'socialbase', 'password' => Hash::make('socialbase')));

        } else {

            $this->command->info('Usuários já adicionado');

        }
    }
}
