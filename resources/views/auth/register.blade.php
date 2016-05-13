@extends('layouts.master')


@section('title')
@stop

@section('content')

	<p>Already have an account? <a href='/login'>Login here.</a></p>
        <h1>Register for an account</h1>

	@if(count($errors) > 0)
		<ul><div class='errors'>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

	<form method='POST' action='/register'>
            {{ csrf_field() }}
	 
	    <div class='form-group'>
            	<label for='firstname'>First Name:</label></br> 
		<input type='text' name='firstname' id='firstname' value='{{ old('firstname') }}'>
	    </div>

	    <div clas='form-group'>
	    	<label for='lastname'>Last Name:</label></br>
	    	<input type='text' name='lastname' id='lastname' value='{{ old('lastname') }}'>
	    </div>

	    <div class='form-group'>
	    	<label for='email'>Email:</label></br>
	    	<input type='text' name='email' id='email' value='{{ old('email') }}'>
	    </div>

	    <div class='form-group'>
	    	<label for='password'>Password:</label></br>
	    	<input type='password' name='password' id='password' value='{{ old('password') }}'>
	    </div>

	    <div class='form-group'>
	    	<label for='password-confirmation'>Re-enter password:</label></br>
	    	<input type='password' name='password_confirmation' id='password-confirmation' value='{{ old('password_confirmation') }}'>
	    </div>

            <input type='submit' value='Enter' class='btn btn-primary'></br>
	
	@if(count($errors) > 0)
		<div class="errors">
                <p>Please correct errors above and try again</p>
		</div>
        @endif
	
        </form>	

@stop
