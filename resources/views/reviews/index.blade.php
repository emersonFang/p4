@extends('layouts.master')

@section('title')
    All Your Reviews
@stop

@section('content')
    <div class="container">
        @if(sizeof($reviews) == 0)
            You have not added any reviews.
        @else
            @foreach($reviews as $review)
                <?php
                    $landmark_name = DB::table('landmarks')
                    ->where('id', '=',$review->landmark_id)->value('name');
                ?>
                <div style="text-align: center" class="user_results_container">
                    <h2>Review of {{$landmark_name}}</h2>
                    <a href='/reviews/edit/{{$review->id}}'>Edit</a> |
                    <a href='/reviews/confirm-delete/{{$review->id}}'>Delete</a>
                    <br><br>
                    {{$review->review}}
                </div>
            @endforeach
        @endif
    </div>

@stop