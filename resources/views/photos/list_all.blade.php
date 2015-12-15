<!doctype html>
<html>

@extends('layouts.master')


@section('title')
    <title>Show All Photos for {{$landmark->name}}</title>
@stop

@section('content')
    <div class="container">
        <h1>Here are all the photos on the site for {{$landmark->name}}:</h1>

        <?php $photos = \App\Photo::where('landmark_id','=',$landmark->id)->orderBy('id')->get(); ?>
        @foreach($photos as $photo)
            <div style="text-align: center" class="user_results_container">
                <h2>Photo ID#: {{ $photo->id }}</h2>
                <a href='show/{{$landmark->id}}'>Reviews</a> |
                <a href='/photos/{{$landmark->id}}'>Photos</a>
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