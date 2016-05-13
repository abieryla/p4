@extends('layouts.master')


@section('title')
@stop

@section('content')

	<p> Need to register for an account? <a href='/register'>Register here.</a> </p>
        <h1>Login</h1>

	<form method='POST' action='/login'>
            {{ csrf_field() }}

	    <div class="errors">
	        {{$errors->first('password') }} <br>	    
	    </div>

	    <div class='form-group'>
	    	<label for='email'>Email:</label></br>
	    	<input type='text' name='email' id='email'  value='{{ old('email') }}'>
	    </div>

	    <div class='form-group'>
	   	<label form='password'>Password:</label></br>
	    	<input type='password' name='password' id='password' value='{{ old('password') }}'>
	    </div>

            <input type='submit' value='Enter' class='btn btn-primary'><br>
	
	@if(count($errors) > 0)
		<div class="errors">
                <p>Email and password do not match. Please try again.</p>
		</div>
        @endif
	
        </form>	

@stop
