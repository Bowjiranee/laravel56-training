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
        DB::table('users')->insert([
            'email' => 'kongarn@gmail.com',
            'salary_class_id' => 1
        ]);
        DB::table('users')->insert([
            'email' => 'kongarn2@gmail.com',
            'salary_class_id' => 1
        ]);
    }
}
