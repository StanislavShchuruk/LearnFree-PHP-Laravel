<?php

namespace App\Repositories;

use App\Contracts\Repositories\ICourseRepository;
use App\Models\Course;

class CourseRepository implements ICourseRepository {
    
    public function getCourseById($id) {
        return Course::where('id', $id)->first();
    }
    
    public function getAllCoursesOrderByDate() {
        return Course::orderBy('created_at', 'asc')->get();
    }
    
    public function getUserCoursesOrderByDate($userId) {
        return Course::where('user_id', $userId)->orderBy('created_at', 'asc')->get();
    }

}
