<?php

use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('phone')->insert([
            'phone' => '08xxxxxxxx',
            'users_id' => 1
        ]);
    }
}
