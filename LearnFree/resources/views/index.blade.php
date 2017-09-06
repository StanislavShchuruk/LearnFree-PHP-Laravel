@extends('layouts.layout_main')

@section('content')
<ul>
    @foreach ($lessons->all() as $lesson)
        <li> {{ $lesson->created_at }} : {{ $lesson->title }} </li>
    @endforeach
</ul>
@endsection

