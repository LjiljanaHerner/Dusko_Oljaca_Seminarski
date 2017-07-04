<?php

use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('users')->insert(array(
             array('id' => 1,'name'=>'dule','email'=>'dule@email.com','password'=>bcrypt('123456')),
             array('id' => 2, 'name'=>'pero','email'=>'pero@email.com','password'=>bcrypt('123123')),
             

          ));
    }
}
