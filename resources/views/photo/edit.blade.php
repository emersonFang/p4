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
                <label>* photo:</label>
                <textarea
                        id='photo'
                        name='photo'
                        rows="4" cols="50"
                        >{{$photo->photo}}
                </textarea>
                <br>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
@stop