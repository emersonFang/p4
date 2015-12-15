<?php
/**
 * Created by PhpStorm.
 * User: Emerson
 * Date: 12/12/2015
 * Time: 6:05 PM
 */
?>

@extends('layouts.master')

@section('content')

    <p class="centered_text">Don't have an account? <a href='/register'>Register here...</a></p>

    <h1>Login</h1>

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="centered_text">
        <div class="align_left">
        <form method='POST' action='/login'>

            {!! csrf_field() !!}

            <div class='form-group'>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value='{{ old('email') }}'>
            </div>

            <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' name='password' id='password' value='{{ old('password') }}'>
            </div>

            <div class='form-group'>
                <input type='checkbox' name='remember' id='remember'>
                <label for='remember' class='checkboxLabel'>Remember me</label>
            </div>

            <button type='submit' class='btn btn-primary'>Login</button>
        </form>
        </div>
    </div>
@stop