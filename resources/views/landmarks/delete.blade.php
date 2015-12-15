@extends('layouts.master')

@section('title')
    Delete Landmark
@stop


@section('content')

    <h1>Delete Landmark</h1>

    <p class="centered_text">
        Are you sure you want to delete <em>{{$landmark->name}}</em>?
    </p>

    <p class="centered_text">
        <a href='/landmarks/delete/{{$landmark->id}}'>Yes...</a>
    </p>

@stop