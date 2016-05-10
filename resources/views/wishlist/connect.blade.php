@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Connect to a Circle wishlist</h1>

	    <form method='POST' action='/wishlist/connect'>
            {{ csrf_field() }}
            <div class="errors">
            {{$errors->first('paragraph') }} <br>
            </div>
            Enter the email associated with the Circle wishlist:  
            <input type='text' name='email' size='100' value='{{ old('email') }}'><br>
            Enter the wishlist name:
            <input type='text' name='description' size='100' value='{{ old('wishlist_name') }}'><br>

            <input type='submit' value='Enter' ><br>
@stop
