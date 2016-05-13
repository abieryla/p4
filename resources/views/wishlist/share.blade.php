@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Share {{$wishlist->wishlist_name}} wishlist</h1>


            <form method='POST' action='/wishlist/share/{{ $wishlist->id }}'>
               {{ csrf_field() }}

		<div class='form-group'>   
               		<label for='name'>Enter your name as you want it to appear:</label></br>
               		<input type='text' name='name' id='name' value='{{ old('name') }}'>
               		<div class='errors'>{{ $errors->first('name') }}</div></br>
		</div>
		
  		<div class='form-group'> 
               		<label for='email'>Email address of person you want to share with:</label></br>
               		<input type='text' name='circle_email' id='email' value='{{ old('circle_email') }}'>
               		<div class='errors'>{{ $errors->first('circle_email') }}</div></br>
		</div>
   
       	       	<input type='hidden' name='wishlist_id' value='{{ $wishlist->id }}'>
   	   
               	<input type='submit' value='Share wishlist' class='btn btn-primary'><br> 

            </form>	


@stop
