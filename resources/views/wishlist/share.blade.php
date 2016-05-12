@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Share {{$wishlist->wishlist_name}} wishlist</h1>


            <form method='POST' action='/wishlist/share/{{ $wishlist->id }}'>
               {{ csrf_field() }}
   
               Enter your name as you want it to appear:
               <input type='text' name='name' size='50' value='{{ old('name') }}'><br>
               <div class='errors'>{{ $errors->first('name') }}</div></br>
   
               Email address of person you want to share with:
               <input type='text' name='circle_email' size='50' value='{{ old('circle_email') }}'><br>
               <div class='errors'>{{ $errors->first('circle_email') }}</div></br>
   
       	       <input type='hidden' name='wishlist_id' value='{{ $wishlist->id }}'>
   	   
               <input type='submit' value='Share wishlist' class='btn btn-primary'><br> 

            </form>	


@stop
