@extends('layouts.master')

@section('title')
    Create Review
@stop


{{--
This `head` section will be yielded right before the closing </head> tag.
Use it to add specific things that *this* View needs in the head,
such as a page specific styesheets.
--}}
@section('head')
    {{-- <link href="/css/books/create.css" type='text/css' rel='stylesheet'> --}}
@stop



@section('content')

    <div class="form_container">
        <h1>Add a new review</h1>

        @include('errors')

        <form method='POST' action='/reviews/{{$landmark->id}}/create'>

            <input type='hidden' value='{{ csrf_token() }}' name='_token'>

            <div class='form-group'>
                <label>*Review:</label>
                <textarea
                        id='review'
                        name='review'
                        rows="4" cols="50"
                        placeholder="The best landmark ever!!"
                        >The best-est landmark ever!!
                </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add review</button>
        </form>
    </div>
@stop


{{--
This `body` section will be yielded right before the closing </body> tag.
Use it to add specific things that *this* View needs at the end of the body,
such as a page specific JavaScript files.
--}}
@section('body')
    {{-- <script src="/js/books/create.js"></script> --}}
@stop