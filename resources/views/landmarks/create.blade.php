@extends('layouts.master')

@section('title')
    Create Landmark
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
        <h1>Add a new landmark</h1>

        @include('errors')

        <form method='POST' action='/landmarks/create'>

            <input type='hidden' value='{{ csrf_token() }}' name='_token'>

            <div class='form-group'>
                <label>*Landmark's Name:</label>
                <input
                        type='text'
                        id='name'
                        name='name'
                        value='{{ old('name','Golden Gate Bridge') }}'
                        >
            </div>

            <div class='form-group'>
                <label for='description'>*Landmark's Description:</label>
                <input
                        type='text'
                        id='description'
                        name='description'
                        value='{{ old('description','The prettiest bridge ever!') }}'
                        >
            </div>

            <div class='form-group'>
                <label for='location'>* Landmark's Location:</label>
                <input
                        type='text'
                        id='location'
                        name='location'
                        value='{{ old('location','San Francisco') }}'
                        >
            </div>

            <div class='form-group'>
                <label for='filepath'>*URL for a photo of the landmark:</label>
                <input
                        type='text'
                        id='filepath'
                        name='filepath'
                        value='{{ old('filepath','https://upload.wikimedia.org/wikipedia/commons/0/0c/GoldenGateBridge-001.jpg') }}'
                        >
            </div>

            <div class='form-group'>
                <label for='photo_description'>*Short Description of Landmark Photo:</label>
                <input
                        type='text'
                        id='photo_description'
                        name='photo_description'
                        value='{{ old('photo_description','Golden Gate Bridge Pic') }}'
                        >
            </div>

            <div class='form-group'>
                <label for='tags'>Tags</label>
                <br>
                @foreach($tags_for_checkbox as $tag_id => $tag)
                    <input type='checkbox' tag='tags[]' value='{{$tag_id}}'> {{ $tag['tag'] }}<br>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Add landmark</button>
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