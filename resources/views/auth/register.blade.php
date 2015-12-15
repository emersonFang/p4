<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 12/12/2015
 * Time: 6:07 PM
 */
?>

@extends('layouts.master')

@section('content')

    <p class="centered_text">Already have an account? <a href='/login'>Login here...</a></p>

    <h1>Register</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="centered_text">
        <div class="align_left">
        <form method='POST' action='/register'>
            {!! csrf_field() !!}

            <div class='form-group'>
                <label for='name'>Name</label>
                <input type='text' name='name' id='name' value='{{ old('name') }}'>
            </div>

            <div class='form-group'>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value='{{ old('email') }}'>
            </div>

            <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' name='password' id='password'>
            </div>

            <div class='form-group'>
                <label for='password_confirmation'>Confirm Password</label>
                <input type='password' name='password_confirmation' id='password_confirmation'>
            </div>

            <button type='submit' class='btn btn-primary'>Register</button>

        </form>
        </div>
    </div>

@stop
