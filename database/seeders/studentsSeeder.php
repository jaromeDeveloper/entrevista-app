<?php

namespace Database\Seeders;

use App\Models\students;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class studentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $x = 0; // Counter And Condition Break Cicle While
        $y = 0;  // Counter 10 rows

        while($x == 0){ //Cicle While for write 10 rows on database
            
            $student = new students();
            $student->email = Str::random(10).'@gmail.com';
            $student->password = Hash::make('password');
            $student->save();
            
            $y = $y + 1;

            if($y == 10){ $x++; }
       }
    }
}
