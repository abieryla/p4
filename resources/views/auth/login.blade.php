@extends('layouts.master')


@section('title')
        No Peeking Wish List   
@stop

@section('content')

	<p> Need to register for an account? <a href='/register'>Register here.</a> </p>
        <h1>Login</h1>

	<form method='POST' action='/login'>
            {{ csrf_field() }}
	    <div class="errors">
            {{$errors->first('password') }} <br>	    
	    </div>
	    Email:
	    <input type='text' name='email' size='50' value='{{ old('email') }}'><br>
	    Password:
	    <input type='password' name='password' size='50' value='{{ old('password') }}'><br>
	    CIRCLE passcode (if applicable):
	    <input type='password' name='passcode' size='50' value='{{ old('passcode') }}'><br>

            <input type='submit' value='Enter' ><br>
	
	@if(count($errors) > 0)
		<div class="errors">
                <p>Email and password do not match. Please try again.</p>
		</div>
        @endif
	
        </form>	

@stop
