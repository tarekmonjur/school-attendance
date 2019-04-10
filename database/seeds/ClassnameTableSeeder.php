<?php

use Illuminate\Database\Seeder;
use App\Models\Classname;

class ClassnameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Classname::insert([
           ['bid'=>1, 'classname'=>'Play', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Nursery', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'One', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Two', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Three', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Four', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Five', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Six', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Seven', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Eight', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Nine', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
           ['bid'=>1, 'classname'=>'Ten', 'lang'=>'English', 'ufile'=> '', 'date'=>''],
       ]);
    }
}
