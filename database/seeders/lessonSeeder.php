<?php

namespace Database\Seeders;

use App\Models\lessons;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class lessonSeeder extends Seeder
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

        while($x == 0){ // Cicle While for write 10 rows on database
            
            $lesson = new lessons();
            $lesson->name = Str::random(21);
            $lesson->save();
            $y = $y + 1;
            if($y == 10){ $x++; }
       }
        
    }
}