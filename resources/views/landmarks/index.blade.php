@extends('layouts.master')

@section('title')
    All Your Landmarks
@stop

@section('content')
<div class="container">
    <h1>All of Your Landmarks</h1>
    @if(sizeof($landmarks) == 0)
        You have not added any landmarks.
        <div class="centered_text">
            <a href="/landmark/create" class="centered_text">Add </a>a landmark?
        </div>
    @else
        @foreach($landmarks as $landmark)
            <div style="text-align: center" class="user_results_container">
                <h2>{{ $landmark->name }}</h2>
                <a href='landmarks/show/{{$landmark->id}}'>About</a> |
                <a href='/landmarks/edit/{{$landmark->id}}'>Edit</a> |
                <a href='/landmarks/confirm-delete/{{$landmark->id}}'>Delete</a>
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
    @endif
</div>

@stop