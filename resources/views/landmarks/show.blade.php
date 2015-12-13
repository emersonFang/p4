<!doctype html>
<html>

@extends('layouts.master')

@section('title')
<title>Show Landmark</title>
@stop

@section('content')
        @if(isset($name))
            <h1>Show landmark: {{ $name }}</h1>
        @else
            <h1>No landmark chosen.</h1>
        @endif
@stop


</html>