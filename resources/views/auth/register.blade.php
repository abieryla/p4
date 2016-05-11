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
            First Name: 
	    <input type='text' name='firstname' size='25' value='{{ old('firstname') }}'><br>
	    Last Name:
	    <input type='text' name='lastname' size='25' value='{{ old('lastname') }}'><br>
	    Email:
	    <input type='text' name='email' size='50' value='{{ old('email') }}'><br>
	    Password:
	    <input type='password' name='password' size='50' value='{{ old('password') }}'><br>
	    Re-enter password again:
	    <input type='password' name='password_confirmation' size='50' value='{{ old('password_confirmation') }}'><br>

            <input type='submit' value='Enter' class='btn btn-primary'><br>
	
	@if(count($errors) > 0)
		<div class="errors">
                <p>Please correct errors above and try again</p>
		</div>
        @endif
	
        </form>	

@stop
