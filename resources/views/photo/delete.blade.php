@extends('layouts.master')

@section('title')
    Delete photo
@stop


@section('content')

    <h1>Delete photo</h1>

    <div class="container">
            {{$photo->photo}}
    </div>

    <p class="centered_text">
        Are you sure you want to delete photo ID# <em>{{$photo->id}}</em>?
    </p>

    <p class="centered_text">
        <a href='/landmarks/delete/{{$photo->id}}'>Yes...</a>
    </p>

@stop