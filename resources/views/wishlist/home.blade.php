@extends('layouts.master')

@section('title')
@stop

@section('content')
	<div class="row"><a href="/wishlist">Home</a> | <a href='/logout'>Logout</a></div>

        <h1>My Wishlists</h1>

	@if(sizeof($wishlists) == 0)
		You do not currently have any wishlists setup. <a href='/wishlist/create'>Create a wishlist now!</a>
	@else
		<a href='/wishlist/create'>Create another wishlist?</a></br>
		@foreach($wishlists as $wishlist)
			    <div class="row">
			       <h4>
		    	       <div class="col-sm-2">
			           {{ $wishlist->wishlist_name}}
			       </div>
     			       </h4>
	      		       <h6>
			       <div class="col-sm-1">
			           <a href='/wishlist/add/{{$wishlist->id}}' class="btn btn-success btn-sm">Add item</a>
			       </form>
			       </div>
			       <div class="col-sm-1">                  			       
                                   <a href='/wishlist/confirmdelete/{{$wishlist->id}}' class="btn btn-warning btn-sm">Delete wishlist</a>
			       </div>                             
			       </h6>
			    </div></br>
		@endforeach
	@endif

        <h1>My Circle Wishlists</h1>
		<p>You are not currently connected to a Circle. <a href='/wishlist/connect'>Connect to a Circle wishlist now!</a></p>
@stop
