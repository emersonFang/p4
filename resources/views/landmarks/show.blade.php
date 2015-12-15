<!doctype html>
<html>

@extends('layouts.master')

@section('title')
<title>Show Landmark</title>
@stop

@section('content')
            <?php
                $photos = \App\Photo::where('landmark_id','=',$landmark->id)->orderBy(DB::raw('RAND()'))->take(1)->get();
                foreach($photos as $photo) {
                    $filepath = $photo['filepath'];
            };?>
            <h1> {{ $landmark->name }}</h1>
                <div class="centered_text">
                    @if(Auth::check())
                        <a href='/reviews/show/{{$landmark->id}}'>Your reviews of {{$landmark->name}}</a> |
                        <a href='/reviews/{{$landmark->id}}/create'>Add a review</a> |
                        <a href='/photos/{{$landmark->id}}/create'>Add a photo</a>
                    @else
                    @endif
                </div>
                <div class="image">
                    <img style='width:20%' src={{$filepath}}>
                </div>
                <div class="centered_text">
                    <div class="align_left">
                        Location: {{$landmark->location}} <br>
                        Description: {{$landmark->description}} <br>
                        Tags:
                            @if((count($landmark->tags))===0)
                                {{' None'}}
                            @else
                                @foreach($landmark->tags as $tag)
                                    {{$tag->tag.' '}}
                                @endforeach
                            @endif
                    </div>
                </div>
            <?php $reviews = \App\Review::where('landmark_id','=',$landmark->id)->orderBy('id')->get();?>
            @if(empty($reviews->first()))
                <h2>No Reviews (Yet!)...</h2>
                @if(Auth::check())
                    <div class="centered_text">
                        <a href="/reviews/{{$landmark->id}}/create" class="centered_text">Add </a>a review?
                    </div>
                @endif
            @else
                <h2>Reviews:</h2>
                <div class="container">
                        @foreach($reviews as $review)
                            <?php $users= \App\User::where('id','=',$review->user_id)->get();
                                foreach($users as $user) {
                                    $user_name = $user->name;
                                };?>
                            <div style="text-align: center" class="review_results_container">
                                    <div class="align_left">
                                    {{$review->review}}
                                    <br>
                                    --{{$user_name}}
                                    </div>
                            </div>
                        @endforeach
                </div>
            @endif
@stop


</html>