<?php

use Illuminate\Database\Seeder;

class BloodGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blood_groups')->delete();

        DB::table('blood_groups')->insert([

        		['blood_group' => 'A+', 'name' => 'A RhD positive', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'A-', 'name' => 'RhD negative', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'B+', 'name' => 'B RhD positive', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'B-', 'name' => 'B RhD negative', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'O+', 'name' => 'O RhD positive', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'O-', 'name' => 'O RhD negative', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'AB+', 'name' => 'AB RhD positive', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],
        		['blood_group' => 'AB-', 'name' => 'AB RhD negative', 'quantity' => 0, 'donated' => 0, 'dispatched' => 0],

        	]);
    }
}