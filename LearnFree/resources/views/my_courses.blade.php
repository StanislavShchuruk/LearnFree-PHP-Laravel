@extends('layouts.layout_main')

@section('content')

<div class="container">
    <div class="section-header">
        <h1 class="title">Мои курсы</h1>
        <div class="btn btn-primary">+ Создать новый курс</div>
    </div>
    <div class="courses-list">
    @if (isset($courses))
        @foreach ($courses as $course)
        <div class="container-md course-div-li">
            <div class="col-md-3 img-box">
            <img src="{{ asset($course->image_url) }}" />
            </div>
            <div class="col-md-7 text-box ">
                <h3 class="title">{{$course->title}}</h3>
                <p>{{$course->short_description}}</p>
            </div>
             <div class="col-md-2 action-box">
                 <div class="bottom_btn">
                    <div class="btn btn-primary"><a href="/course/{{ $course->id }}" >Подробнее</a></div>
                 </div>
            </div>
        </div>
        @endforeach
    @endif
    </div>
    
</div>

@endsection

@section('css')
    <link href="{{ asset('css/courses.css') }}" rel="stylesheet">
@endsection

