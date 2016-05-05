@extends('layouts.master')


@section('title')
        No Peeking Wish List   
@stop

@section('content')

	<p>Already have an account? <a href='/login'>Login here.</a></p>
        <h1>Register for an account</h1>

	<form method='POST' action='/wishlist'>
            {{ csrf_field() }}
	    <div class="errors">
            {{$errors->first('paragraph') }} <br>	    
	    </div>
            First Name: 
	    <input type='text' name='first' size='25' value='{{ old('first') }}'><br>
	    Last Name:
	    <input type='text' name='last' size='25' value='{{ old('last') }}'><br>
	    Email:
	    <input type='text' name='email' size='50' value='{{ old('email') }}'><br>
	    Password:
	    <input type='password' name='pswd1' size='50' value='{{ old('pswd1') }}'><br>
	    Re-enter password again:
	    <input type='password' name='pswd2' size='50' value='{{ old('pswd2') }}'><br>
	    Enter CIRCLE passcode (if applicable):
	    <input type='password' name='passcode' size='50' value='{{ old('passcode') }}'><br>

            <input type='submit' value='Enter' ><br>
	
	@if(count($errors) > 0)
		<div class="errors">
                <p>Please correct errors above and try again</p>
		</div>
        @endif
	
        </form>	

@stop
