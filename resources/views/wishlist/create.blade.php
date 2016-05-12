@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Create a wishlist</h1>

	    <form method='POST' action='/wishlist/create'>
            {{ csrf_field() }}
            <div class="errors">
            {{$errors->first('wishlist_name') }} <br>
            </div>
            Wishlist name: 
            <input type='text' name='wishlist_name' size='50' value='{{ old('wishlist_name') }}'><br>

            <input type='submit' value='Enter' class='btn btn-primary'><br>
@stop
