<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('church_group')->insert([
            'name' => 'Men',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_group')->insert([
            'name' => 'Women',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_group')->insert([
            'name' => 'Youth',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_group')->insert([
            'name' => 'Teens',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('church_group')->insert([
            'name' => 'Children',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
