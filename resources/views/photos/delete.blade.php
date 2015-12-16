@extends('layouts.master')

@section('title')
    Delete photo
@stop


@section('content')

    <h1>Delete photo</h1>

    <div class="image">
        <img style='width:30%' src={{$photo->filepath}}>
    </div>

    <p class="centered_text">
        Are you sure you want to delete photo ID# <em>{{$photo->id}}</em>?
    </p>

    <p class="centered_text">
        <a href='/photos/delete/{{$photo->id}}'>Yes...</a>
    </p>

@stop