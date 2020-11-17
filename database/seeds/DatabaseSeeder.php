<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database; Responsável por chamar os arquivos de criação
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeders::class);
    }
}
