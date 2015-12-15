<!doctype html>
<html>

@extends('layouts.master')

@section('title')
    <title>Show User's Reviews of Landmark</title>
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
            <a href='/reviews'>All your reviews</a> |
            <a href='/landmarks/show/{{$landmark->id}}'>All reviews of {{$landmark->name}}</a> |
            <a href='/reviews/{{$landmark->id}}/create'>Add a review</a> |
            <a href='/photos/{{$landmark->id}}/create'>Add a photo</a>
        @else
        @endif
    </div>
    <?php $reviews = \App\Review::where('landmark_id','=',$landmark->id)->where('user_id','=',\Auth::id())->get();?>
    @if(empty($reviews->first()))
        <h2>No Reviews of {{$landmark->name}} (Yet!)...</h2>
        <div class="centered_text">
            <a href="/reviews/{{$landmark->id}}/create" class="centered_text">Add </a>a review?
        </div>
    @else
        <h2>Your Reviews of {{$landmark->name}}</h2>
        <div class="container">
            @foreach($reviews as $review)
                <div class="review_results_container">
                {{$review->review}}
                </div>
            @endforeach
        </div>
    @endif
@stop


</html>