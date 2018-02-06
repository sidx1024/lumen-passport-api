<?php

use Illuminate\Database\Seeder;

class ElementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('element')->insert(['atomic_number' => '1', 'name' => 'Hydrogen', 'symbol' => 'H']);
        DB::table('element')->insert(['atomic_number' => '2', 'name' => 'Helium', 'symbol' => 'He']);
        DB::table('element')->insert(['atomic_number' => '6', 'name' => 'Carbon', 'symbol' => 'C']);
        DB::table('element')->insert(['atomic_number' => '7', 'name' => 'Nitrogen', 'symbol' => 'N']);
        DB::table('element')->insert(['atomic_number' => '8', 'name' => 'Oxygen', 'symbol' => 'O']);
    }
}
