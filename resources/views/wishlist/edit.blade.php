@extends('layouts.master')

@section('title')
@stop

@section('content')
	<nav> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </nav>
        <h1>Add an item to your wishlist</h1>

	    <form method='POST' action='/wishlist/edit/{{ $item->id }}'>
            {{ csrf_field() }}

            Item name: 
            <input type='text' name='item' size='50' value='{{ $item->item }}'><br>
	    <div class='errors'>{{ $errors->first('item') }}</div></br>

	    Description (size, color, etc.):
            <input type='text' name='description' size='50' value='{{ $item->description }}'><br>
	    <div class='errors'>{{ $errors->first('description') }}</div></br>

	    Price (ex. 9.99):
            <input type='number' name='price' size='50' value='{{ $item->price }}'><br>
	    <div class='errors'>{{ $errors->first('price') }}</div></br>

	    Enter purchase link:
            <input type='text' name='purchase_link' size='50' value='{{ $item->purchase_link }}'><br>
	    <div class='errors'>{{ $errors->first('purchase_link') }}</div>

	    Number requested:
            <input type='number' name='number_wanted' size='50' value='{{ $item->number_wanted }}'><br>
	    <div class='errors'>{{ $errors->first('number_wanted') }}</div></br>

	    <input type='hidden' value='$item->wishlist_id' name='wishlist_id'>

	    <div class='form-required'>
		All fields are required
	    </div>
            <input type='submit' value='Edit Item' class='btn btn-primary'><br>

	    <div class='errors'>
		@if(count($errors) > 0)
			Please fix above errors and try again.
		@endif

	    </form>
@stop
