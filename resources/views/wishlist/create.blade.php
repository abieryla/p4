@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Create a wishlist</h1>

	    <form method='POST' action='/wishlist/create'>
            	{{ csrf_field() }}

            	<div class="errors">
            		{{$errors->first('wishlist_name') }} </br>
            	</div>

		<div class='form-group'>
            		<label for='wishlist_name'>Wishlist name:</label></br>
            		<input type='text' name='wishlist_name' id='wishlist_name' value='{{ old('wishlist_name') }}'>
		</div>

           	<input type='submit' value='Create wishlist' class='btn btn-primary'><br>

	    </form>
@stop
