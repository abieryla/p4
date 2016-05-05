@extends('layouts.master')


@section('title')
        No Peeking Wish List   
@stop

@section('content')

	<p> Need to register for an account? <a href='/register'>Register here.</a> </p>
        <h1>Login</h1>

	<form method='POST' action='/wishlist'>
            {{ csrf_field() }}
	    <div class="errors">
            {{$errors->first('paragraph') }} <br>	    
	    </div>
	    Email:
	    <input type='text' name='email' size='50' value='{{ old('email') }}'><br>
	    Password:
	    <input type='password' name='pswd1' size='50' value='{{ old('pswd1') }}'><br>
	    CIRCLE passcode (if applicable):
	    <input type='password' name='passcode' size='50' value='{{ old('passcode') }}'><br>

            <input type='submit' value='Enter' ><br>
	
	@if(count($errors) > 0)
		<div class="errors">
                <p>Please correct errors above and try again</p>
		</div>
        @endif
	
        </form>	

@stop
