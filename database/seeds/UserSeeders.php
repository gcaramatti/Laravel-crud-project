<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'             => 'Adm',
            'email'            => 'biel.caramatti180@gmail.com',
            'CPF'              => '12806759692',
            'password'         =>  bcrypt('12345678'),
            'is_admin'         => '1'
        ]);
      }
}
