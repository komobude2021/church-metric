<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('church_ministry')->insert([
            'name' => 'Sunday School',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Intercessory Prayer Group',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Evangelism Group',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Choir Band',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Drama',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Welfare-Visitation and Hospitality',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Sanctuary Keepers',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Technical, IT and Media',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Ushering and Protocol Unit',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Decorations and Events Management',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Facility, Transport and Traffic Control Unit',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_ministry')->insert([
            'name' => 'Believers, Baptismal and Counselling',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
