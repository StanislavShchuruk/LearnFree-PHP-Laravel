@extends('layouts.layout_main')

@section('content')

@if($course == null)
    {{ $course == new App\Models\Course }}
@endif

<div class="container container-course">
    <div class="section-header">
        <h1 class="title">Курс: {{ $course->title }}</h1>
    </div>
    <div class="section text-box title-text-box">
        <div class="img-box">
            <img src="{{ asset($course->image_url) }}" />
        </div>
        <p>{{$course->short_description}}</p>
    </div>
    @if($course->video_url != null)
    <div class="section">
        <iframe class="video-box" src="{{ $course->video_url }}" 
                frameborder="0" allowfullscreen>                  
        </iframe>
    </div>
    @endif
    <div class="section text-box">
        <h3 class="title">О курсе:</h3>
        <p>{{$course->description}}</p>
    </div>   
</div>

@endsection

@section('css')
    <link href="{{ asset('css/courses.css') }}" rel="stylesheet">
@endsection





