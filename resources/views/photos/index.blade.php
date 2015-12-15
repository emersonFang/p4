@extends('layouts.master')

@section('title')
    All Your Photos
@stop

@section('content')
    <div class="container">
        @if(sizeof($photos) == 0)
            You have not added any photos.
        @else
            @foreach($photos as $photo)
                <?php
                    $landmark_name = DB::table('landmarks')
                    ->where('id', '=',$photo->landmark_id)->value('name');
                ?>
                <div style="text-align: center" class="user_results_container">
                    <h2>Photo of {{$landmark_name}}</h2>
                    (photo ID #: {{$photo->id}})
                    <br>
                    <br>
                    <a href='/photos/edit/{{$photo->id}}'>Edit</a> |
                    <a href='/photos/confirm-delete/{{$photo->id}}'>Delete</a>
                    <br><br>
                    <div class="image">
                        <img style='width:100%' src={{$photo->filepath}}>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

@stop