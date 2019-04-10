<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::insert([
            ['bid' => 1, 'section'=> 'Section A'],
            ['bid' => 1, 'section'=> 'Section B'],
            ['bid' => 1, 'section'=> 'Section C'],
            ['bid' => 1, 'section'=> 'Section D'],
        ]);
    }
}
