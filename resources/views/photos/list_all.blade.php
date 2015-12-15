<!doctype html>
<html>

@extends('layouts.master')


@section('title')
    <title>Show All Photos for {{$landmark->name}}</title>
@stop

@section('content')
    <div class="container">
        <h1>Here are all the photos on the site for:</h1>
        <h2>{{$landmark->name}}</h2>
        <div class="centered_text">
            @if(Auth::check())
                <a href='/photos/{{$landmark->id}}/create'>Add a photo</a>
            @else
            @endif
        </div>

        <?php $photos = \App\Photo::where('landmark_id','=',$landmark->id)->orderBy('id')->get(); ?>
        @foreach($photos as $photo)
            <?php
            $user_name = DB::table('users')
                    ->where('id', '=',$photo->user_id)->value('name');
            ?>
            <div style="text-align: center" class="user_results_container">
                <h2>Photo ID#: {{ $photo->id }}</h2>
                <div class="centered_text">Uploaded by {{$user_name}}</div>
                <br>
                <div class="outer">
                    <div class="image">
                        <img style='width:100%' src={{$photo->filepath}}>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

</html>