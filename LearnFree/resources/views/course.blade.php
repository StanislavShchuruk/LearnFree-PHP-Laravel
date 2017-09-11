@extends('layouts.layout_main')

@section('content')

@if($course == null)
    {{ $course == new App\Models\Course }}
@endif

<div class="container">
    <div class="container-course">
        <div class="section-header">
            <h1 class="title">Курс: {{ $course->title }}</h1>
            <form>
                <input type="text" value="{{ $course->title }}"/>
                <input type="submit" value="save" />
            </form>
        </div>
        <div class="section text-box title-text-box">
            <div class="img-box">
                <img src="{{ asset($course->image_url) }}" />
            </div>
            <p>{{$course->short_description}}</p>
            <form>
                <textarea class="course-textarea">{{ $course->short_description }}</textarea>
                <br/>
                <input type="submit" value="save" />
            </form>
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
            <form>
                <textarea class="course-textarea">{{ $course->description }}</textarea>
                <br/>
                <input type="submit" value="save" />
            </form>
        </div>   
    </div>
</div>

@endsection

@section('css')
    <link href="{{ asset('css/courses.css') }}" rel="stylesheet">
@endsection





