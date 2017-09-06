<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;

class LessonsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lessons')->delete();
        
        Lesson::create(['title' => 'Lesson 1',
                        'course_id' => Course::where('title', 'Basic Physics')->first()->id
            ]);
        Lesson::create(['title' => 'Lesson 2',
                        'course_id' => Course::where('title', 'Basic Physics')->first()->id
            ]);
    }

}

?>