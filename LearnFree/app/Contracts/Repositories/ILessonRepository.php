<?php

namespace App\Contracts\Repositories;

/**
 *
 * @author Stanis
 */
interface ILessonRepository {
    public function getAllLessonsOrderByDate();
}
