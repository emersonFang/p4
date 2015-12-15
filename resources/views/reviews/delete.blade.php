@extends('layouts.master')

@section('title')
    Delete Review
@stop


@section('content')

    <h1>Delete Landmark</h1>

    <p>
        Are you sure you want to delete Review ID# <em>{{$review->id}}</em>?
    </p>

    <p>
        <a href='/landmarks/delete/{{$review->id}}'>Yes...</a>
    </p>

@stop