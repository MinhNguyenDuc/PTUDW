<?php

use Illuminate\Database\Seeder;

class Academic_YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('academic_years')->truncate();
        for ($i = 40; $i<=63; $i++){
            \App\AcademicYear::create([
                'id'=> $i,
                'name'=> 'K'.$i,
                'note'=> 'Khóa '.$i,
                'status'=> 1
            ]);
        }
    }
}
