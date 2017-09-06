<?php

namespace App\Repositories;

use App\Models\Lesson;
use App\Mosels\User;
use App\Contracts\Repositories\ILessonRepository;

/**
 * Description of LessonRepository
 *
 * @author Stanis
 */
class LessonRepository implements ILessonRepository {
    
    public function getAllLessonsOrderByDate()
    {
        return Lesson::orderBy('created_at', 'asc')->get();
    }
    
}
