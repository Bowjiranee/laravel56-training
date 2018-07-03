<?php

use Illuminate\Database\Seeder;

class SalaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('salary_class')->insert([
            'id' => 1,
            'salary' => 15000,
        ]);
    }
}
