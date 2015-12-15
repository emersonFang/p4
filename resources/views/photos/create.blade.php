@extends('layouts.master')

@section('title')
    Create Photo
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
        <h1>Add a new photo of</h1>
        <h2>{{$landmark->name}}</h2>

        @include('errors')

        <br>

        <form method='POST' action='/photos/{{$landmark->id}}/create'>

            <input type='hidden' value='{{ csrf_token() }}' name='_token'>

            <div class='form-group'>
                <label>*Photo URL:</label>
                <input type="url"
                        id='filepath'
                        name='filepath'
                        style='width:700px'
                        value='http://www.nationsonline.org/gallery/Monuments/Sphinx_und_Chephren-Pyramid.jpg'>
                </input>
                <br>
                <label>*Photo Description</label>
                <input type="text"
                       id='photo_description'
                       name='photo_description'
                       value='generic photo'>
                </input>

            </div>

            <button type="submit" class="btn btn-primary">Add Photo</button>
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