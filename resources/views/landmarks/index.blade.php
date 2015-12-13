@extends('layouts.master')

@section('title')
    All Your Landmarks
@stop

@section('content')

    <h1>All of Your Landmarks</h1>

    @if(sizeof($landmarks) == 0)
        You have not added any landmarks.
    @else
        @foreach($landmarks as $landmark)
            <div>
                <h2>{{ $landmark->name }}</h2>
                <a href='/landmarks/edit/{{$landmark->id}}'>Edit</a> |
                <a href='/landmarks/confirm-delete/{{$landmark->id}}'>Delete</a><br>
                <img src='{{ $photo->filepath }}'>
            </div>
        @endforeach
    @endif

@stop