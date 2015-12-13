<!doctype html>
<html>

@extends('layouts.master')


@section('title')
    <title>Show All Landmarks</title>
@stop

@section('content')
    <?php
    $landmarks = \App\Landmark::all();
    echo 'Here are all the landmarks:'."<br>";
    # loop through the Collection and access just the data
    foreach($landmarks as $landmark) {
    echo $landmark['name']."<br>";
    }
    ?>
@stop

</html>
