@extends('layouts.master')

@section('title')
    Edit photo
@stop


@section('content')

    <div class="form_container">
        <h1>Edit photo</h1>

        @include('errors')

        <form method='POST' action='/photos/edit/{{$photo->id}}'>

            <input type='hidden' value='{{ csrf_token() }}' name='_token'>

            <input type='hidden' name='id' value='{{ $photo->id }}'>

            <div class='form-group'>
                <label>*Photo:</label>
                <input type="url"
                       id='filepath'
                       name='filepath'
                       value={{$photo->filepath}}>
                </input>
                <input type="text"
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