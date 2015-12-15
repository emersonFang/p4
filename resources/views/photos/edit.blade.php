@extends('layouts.master')

@section('title')
    Edit photo
@stop


@section('content')

    <div class="form_container">
        <h1>Edit photo</h1>

        <div class="container">
            <img style='width:30%' src={{$photo->filepath}}>
        </div>

        @include('errors')
        <br>
        <form method='POST' action='/photos/edit/{{$photo->id}}'>

            <input type='hidden' value='{{ csrf_token() }}' name='_token'>

            <input type='hidden' name='id' value='{{ $photo->id }}'>

            <div class='form-group'>
                <label>*Photo URL:</label>
                <input type="url"
                       style="width: 700px;"
                       id='filepath'
                       name='filepath'
                       value={{$photo->filepath}}>
                </input>
                <br>
                <label>*Photo Description</label>
                <input type="text"
                       style="width: 300px;"
                       id='photo_description'
                       name='photo_description'
                       value={{$photo->photo_description}}>
                </input>
                <br>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
@stop