<!doctype html>
<html>

@extends('layouts.master')


@section('title')
    <title>Show All Landmarks</title>
@stop

@section('content')
    <div class="container">
        <h1>Here are all the landmarks on the site:</h1>

        <?php $landmarks = \App\Landmark::orderBy('name')->get(); ?>
        @foreach($landmarks as $landmark)
            <div style="text-align: center" class="user_results_container">
                <h2>{{ $landmark->name }}</h2>
                <a href='show/{{$landmark->id}}'>About</a> |
                <a href='/photos/{{$landmark->id}}'>Photos</a>
                <br>
                @if(Auth::check())
                    <a href='/reviews/{{$landmark->id}}/create'>Write Review</a></li> |
                    <a href='/photos/{{$landmark->id}}/create'>Upload Photos</a></li>
                @endif
                <br>
                <div class="outer">
                    <?php $photos = \App\Photo::where('landmark_id','=',$landmark->id)->orderBy(DB::raw('RAND()'))->take(1)->get();
                    foreach($photos as $photo) {
                        $filepath = $photo['filepath'];
                    };?>
                    <div class="image">
                        <img style='width:100%' src={{$filepath}}>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

</html>
