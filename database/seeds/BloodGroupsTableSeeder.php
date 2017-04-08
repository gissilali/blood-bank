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

        		['blood_group' => 'A+', 'name' => 'A RhD positive'],
        		['blood_group' => 'A-', 'name' => 'RhD negative'],
        		['blood_group' => 'B+', 'name' => 'B RhD positive'],
        		['blood_group' => 'B-', 'name' => 'B RhD negative'],
        		['blood_group' => 'O+', 'name' => 'O RhD positive'],
        		['blood_group' => 'O-', 'name' => 'O RhD negative'],
        		['blood_group' => 'AB+', 'name' => 'AB RhD positive'],
        		['blood_group' => 'AB-', 'name' => 'AB RhD negative'],

        	]);
    }
}