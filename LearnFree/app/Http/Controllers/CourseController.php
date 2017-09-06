<?php

namespace App\Http\Controllers;

use Debugbar;
use Auth;
use App\Contracts\Repositories\ICourseRepository;

class CourseController extends Controller 
{  
    
    protected $courseRepository;
    
    public function __construct(ICourseRepository $courseRepository) {
        $this->courseRepository = $courseRepository;
    }
    
    public function myCourses(){
        $title = 'Мои курсы';
        $courses = $this->courseRepository->getUserCoursesOrderByDate(Auth::id());
        return view('my_courses')->with([ 'title' => $title,
                                          'courses' => $courses]);
    }
    
    public function course($id){
        $course = $this->courseRepository->getCourseById($id);
        $title = "Курс: $course->title";
        return view('course')->with([ 'title' => $title,
                                      'course' => $course]);
    } 
}
