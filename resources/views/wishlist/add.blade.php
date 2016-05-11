@extends('layouts.master')


@section('title')
@stop

@section('content')
	<nav> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </nav>
        <h1>Add an item to your wishlist</h1>

	    <form method='POST' action='/wishlist/add'>
            {{ csrf_field() }}
            <div class="errors">
            {{$errors->first('paragraph') }} <br>
            </div>
            Item name: 
            <input type='text' name='item' size='50' value='{{ old('item') }}'><br>
	    Description (size, color, etc.):
            <input type='text' name='description' size='50' value='{{ old('description') }}'><br>
	    Price (ex. 9.99):
            <input type='number' name='price' size='50' value='{{ old('price') }}'><br>
	    Enter purchase link:
            <input type='text' name='purchase_link' size='50' value='{{ old('purchase_link') }}'><br>
	    Number requested:
            <input type='number' name='number_wanted' size='50' value='{{ old('number_wanted') }}'><br>


            <input type='submit' value='Enter' ><br>
@stop
