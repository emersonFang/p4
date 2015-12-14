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
            <h1>Show landmark: {{ $landmark->name }}</h1>
            <div class="image">
                <img style='width:20%' src={{$filepath}}>
            </div>
            <h2>Reviews:</h2>
            <div class="container">
                <?php $reviews = \App\Review::where('landmark_id','=',$landmark->id)->orderBy('id')->get();?>
                @foreach($reviews as $review)
                    <?php $users= \App\User::where('id','=',$review->user_id)->get();
                        foreach($users as $user) {
                            $user_name = $user->name;
                        };?>
                    <div style="text-align: center" class="review_results_container">
                            {{$review->review}}
                            <br>
                            --{{$user_name}}
                    </div>
                @endforeach
            </div>
@stop


</html>