<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
    }
}

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->insert(array('name'=>'Fábio','email' => 'fabio.profissional@yahoo.com.br','password'=> Hash::make('senha')));
	}
}
