<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();
        
        Course::create([
            'title' => 'Basic Physics',
            
            'short_description' => 
            'Learn some basic principles of physics that help you 
            understand how the world around you works.',

            'description' => 
            'In our highly technological society, it is useful to have 
             a basic understanding of the how and why the world works 
             the way it does: that’s what physics is all about. 
             It also involves a touch of history, a bit of mathematics, 
             and many everyday examples.
             Before starting this course, you are recommended to have the following equivalent mathematical knowledge:
             Calculus, Elementary statistics, Trigonometry,
             Sine and Cosine graphs, Algebra.
             Physics is concerned with every aspect of our universe, 
             and in Basic Physics you will explore 4 main areas: 
             Motion, Waves & Sound, Electricity & Magnetism, and Light. 
             You will gain some valuable insight into these topics, 
             and be able to make simple calculations and predictions.',

            'image_url' => 'images/Basic_physics_Tile.jpg',           
            'video_url' => 'https://www.youtube.com/embed/mq6UlAJQieA',            
            'user_id' => User::where('email', 'stas@email.ua')->first()->id
                
            ]);
    }
}
