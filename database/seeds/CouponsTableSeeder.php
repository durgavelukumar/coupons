<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('coupons')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name_of_store' => 'Target',
        'description' => '25% off Clothes',
        'date_valid_from' => '2015-11-20',
        'time_valid_from' => '08:00:00',
		'date_valid_until' => '2015-11-29',
        'time_valid_until' => '22:00:00',
    ]);
	
	DB::table('coupons')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name_of_store' => 'JC Penny',
        'description' => '10% off Clothes',
        'date_valid_from' => '2015-12-10',
        'time_valid_from' => '08:00:00',
		'date_valid_until' => '2015-12-16',
        'time_valid_until' => '22:00:00',
    ]);
	
	DB::table('coupons')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name_of_store' => 'Belk',
        'description' => '15% off Clothes',
        'date_valid_from' => '2015-12-10',
        'time_valid_from' => '08:00:00',
		'date_valid_until' => '2015-12-17',
        'time_valid_until' => '22:00:00',
    ]);
	
	DB::table('coupons')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name_of_store' => 'Walmart',
        'description' => 'Buy one get one free- Clothes',
        'date_valid_from' => '2015-12-15',
        'time_valid_from' => '08:00:00',
		'date_valid_until' => '2015-12-18',
        'time_valid_until' => '22:00:00',
    ]);
	
	DB::table('coupons')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name_of_store' => 'Nordstrom',
        'description' => '70% off Clothes',
        'date_valid_from' => '2015-12-25',
        'time_valid_from' => '08:00:00',
		'date_valid_until' => '2015-12-29',
        'time_valid_until' => '22:00:00',
    ]);
    }
}
