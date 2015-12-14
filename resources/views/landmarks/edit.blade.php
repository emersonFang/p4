@extends('layouts.master')

@section('title')
    Edit Landmark
@stop


@section('content')

    <div class="form_container">
    <h1>Edit</h1>

    @include('errors')

    <form method='POST' action='/landmarks/edit'>

        <input type='hidden' value='{{ csrf_token() }}' name='_token'>

        <input type='hidden' name='id' value='{{ $landmark->id }}'>

        <div class='form-group'>
            <label>* Landmark's Name:</label>
            <input
                    type='text'
                    id='name'
                    name='name'
                    value='{{$landmark->name}}'
                    >
        </div>

        <div class='form-group'>
            <label>* Landmark's Description:</label>
            <input
                    type='text'
                    id='description'
                    name='description'
                    value='{{$landmark->description}}'
                    >
        </div>

        <div class='form-group'>
            <label>* Landmark's Location:</label>
            <input
                    type='text'
                    id='location'
                    name='location'
                    value='{{$landmark->location}}'
                    >
        </div>

        <div class='form-group'>
            <label for='tags'>Tags</label>
            <br>
            @foreach($tags_for_checkbox as $tag_id => $tag)
                <?php $checked = (in_array($tag['tag'],$tags_for_this_landmark)) ? 'CHECKED' : '' ?>
                <input {{ $checked }} type='checkbox' name='tags[]' value='{{$tag_id}}'> {{ $tag['tag'] }}<br>
            @endforeach
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    </div>
@stop