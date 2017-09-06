<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facade;
use Illuminate\Http\Request;
use App\Contracts\Repositories\ILessonRepository;

class HomeController extends Controller
{
    
    protected $repository;
    
    public function __construct(ILessonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $title = 'LearnFree.ua';
        $lessons = $this->repository->getAllLessonsOrderByDate();
        
        return view('index')->with(['title' => $title, 'lessons' => $lessons]);
    }
    
}
