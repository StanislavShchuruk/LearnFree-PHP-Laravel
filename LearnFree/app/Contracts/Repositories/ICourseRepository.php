<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Contracts\Repositories;

/**
 *
 * @author Stanis
 */
interface ICourseRepository {
    public function getCourseById($id);
    public function getAllCoursesOrderByDate();
    public function getUserCoursesOrderByDate($userId);
}
