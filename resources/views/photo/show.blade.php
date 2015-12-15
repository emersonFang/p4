<!doctype html>
<html>

@extends('layouts.master')

@section('title')
    <title>Show User's photos of Landmark</title>
@stop

@section('content')
    <?php
    $photos = \App\Photo::where('landmark_id','=',$landmark->id)->orderBy(DB::raw('RAND()'))->take(1)->get();
    foreach($photos as $photo) {
        $filepath = $photo['filepath'];
    };?>
    <div class="image">
        <img style='width:20%' src={{$filepath}}>
    </div>
    <div class="centered_text">
        @if(Auth::check())
            <a href='/photos'>All your photos</a> |
            <a href='/landmarks/show/{{$landmark->id}}'>All photos of {{$landmark->name}}</a> |
            <a href='/photos/{{$landmark->id}}/create'>Add a photo</a> |
            <a href='/photos/{{$landmark->id}}/create'>Add a photo</a>
        @else
        @endif
    </div>
    <?php $photos = \App\photo::where('landmark_id','=',$landmark->id)->where('user_id','=',\Auth::id())->get();?>
    @if(empty($photos->first()))
        <h2>No photos of {{$landmark->name}} (Yet!)...</h2>
        <div class="centered_text">
            <a href="/photos/{{$landmark->id}}/create" class="centered_text">Add </a>a photo?
        </div>
    @else
        <h2>Your photos of {{$landmark->name}}</h2>
        <div class="container">
            @foreach($photos as $photo)
                <div class="photo_results_container">
                {{$photo->photo}}
                </div>
            @endforeach
        </div>
    @endif
@stop


</html>