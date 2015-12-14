<!doctype html>
<html>

@extends('layouts.master')

@section('title')
<title>Show Landmark</title>
@stop

@section('content')
        @if(isset($id))
            <?php
                $landmarks = \App\Landmark::where('id','=',$id)->get();
                foreach($landmarks as $landmark) {
                    $landmark_name = $landmark['name'];
                    }
                $photos = \App\Photo::where('landmark_id','=',$landmark->id)->orderBy(DB::raw('RAND()'))->take(1)->get();
                foreach($photos as $photo) {
                    $filepath = $photo['filepath'];
            };?>
            <h1>Show landmark: {{ $landmark_name }}</h1>
            <div class="image">
                <img style='width:20%' src={{$filepath}}>
            </div>
        @else
            <h1>No landmark chosen.</h1>
        @endif
@stop


</html>