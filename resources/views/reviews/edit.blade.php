@extends('layouts.master')

@section('title')
    Edit Review
@stop


@section('content')

    <div class="form_container">
        <h1>Edit</h1>

        @include('errors')

        <form method='POST' action='/reviews/edit/{{$review->id}}'>

            <input type='hidden' value='{{ csrf_token() }}' name='_token'>

            <input type='hidden' name='id' value='{{ $review->id }}'>

            <div class='form-group'>
                <label>* Review:</label>
                <textarea
                        id='review'
                        name='review'
                        rows="4" cols="50"
                        placeholder="This landmark isn't so great after all.  I changed my mind."
                        >
                </textarea>
                <br>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
@stop