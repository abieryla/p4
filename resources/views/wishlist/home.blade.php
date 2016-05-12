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
			       <div class="col-sm-2">
			           <a href='/wishlist/show/{{$wishlist->id}}' class="btn btn-info btn-sm">View wishlist</a>
			       </div>

			       <div class="col-sm-2">
			           <a href='/wishlist/add/{{$wishlist->id}}' class="btn btn-success btn-sm">Add item</a>
			       </div>

			       <div class="col-sm-2">
				   <a href='/wishlist/share/{{$wishlist->id}}' class="btn btn-primary btn-sm">Share wishlist</a>
			       </div>

			       <div class="col-sm-2">                  			       
                                   <a href='/wishlist/confirmdelete/{{$wishlist->id}}' class="btn btn-danger btn-sm">Delete wishlist</a>
			       </div>                             
			       </h6>
			    </div></br>
		@endforeach
	@endif

        <h1>My Circle Wishlists</h1>

	@if(sizeof($circles) == 0)
	
		<p>You are not currently connected to a Circle. You can only see wishlists that are shared with you. To allow your Circle to see your wishlists, 
		share them above and ask your Circle of friends to share with you!</p>

	@else 
		@foreach($circles as $circle)
			<div class="row">
			<?php $circle_wishlist = \App\Wishlist::find($circle->wishlist_id); ?>
			   <div class="col-sm-4">
				<h5>{{ $circle->name }} shared {{$circle_wishlist->wishlist_name }} with you </h5>
			   </div>
		  	   <div class="col-sm-2">
                                   <a href='/wishlist/showcircle/{{$circle->wishlist_id}}' class="btn btn-info btn-sm">View wishlist</a>
			   </div>
			</div>
		@endforeach
				
	@endif


@stop
