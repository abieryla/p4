@extends('layouts.master')

@section('title')
@stop

@section('content')
	<nav> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </nav>
        <h1>Add an item to your wishlist</h1>

	    <form method='POST' action='/wishlist/add/{{ $wishlist->id }}' role="form">
               {{ csrf_field() }}

		<div class='form-group'>
               		<label for='name'>Item name:</label></br>
               		<input type='text' name='item' id='name' value='{{ old('item') }}'>
               		<div class='errors'>{{ $errors->first('item') }}</div></br>
		</div>

		<div class='form-group'>
	       		<label for='description'>Description (size, color, etc.):</label></br>
               		<input type='text' name='description' id='description' value='{{ old('description') }}'>
	       		<div class='errors'>{{ $errors->first('description') }}</div></br>
		</div>

		<div class='form-group'>
	       		<label for='price'>Price (ex. 9.99):</label></br>
               		<input type='number' name='price'  value='{{ old('price') }}'>
	       		<div class='errors'>{{ $errors->first('price') }}</div></br>
		</div>

		<div class='form-group'>
	       		<label for='purchase_link'>Enter purchase link:</label></br>
               		<input type='text' name='purchase_link' id='purchase_link' value='{{ old('purchase_link') }}'>
	       		<div class='errors'>{{ $errors->first('purchase_link') }}</div>
		</div>

		<div class='form-group'>
	       		<label for='number_wanted'>Number requested:</label></br>
               		<input type='number' name='number_wanted' id='number_wanted' value='{{ old('number_wanted') }}'>
	       		<div class='errors'>{{ $errors->first('number_wanted') }}</div></br>
		</div>

	       	<input type='hidden' value='{{$wishlist->id}}' name='wishlist_id'>

	       	<div class='form-required'>
	           	All fields are required
	       	</div>	

               	<input type='submit' value='Add Item' class='btn btn-primary'><br>

	       	<div class='errors'>
	           	@if(count($errors) > 0)
	           		Please fix above errors and try again.
			@endif
	       	</div>

	    </form>
@stop
