@extends('layouts.master')

@section('title')
    Delete Review
@stop


@section('content')

    <h1>Delete Review</h1>

    <div class="container">
            {{$review->review}}
    </div>

    <p class="centered_text">
        Are you sure you want to delete Review ID# <em>{{$review->id}}</em>?
    </p>

    <p class="centered_text">
        <a href='/landmarks/delete/{{$review->id}}'>Yes...</a>
    </p>

@stop