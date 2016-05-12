@extends('layouts.master')

@section('title')
@stop

@section('content')
	<div class="row"><a href="/wishlist">Home</a> | <a href='/logout'>Logout</a></div>

        <h1>My Wishlist - {{$wishlist->wishlist_name}}</h1>

	@if(sizeof($items) == 0)
		You do not currently have any items in your wishlist.
	@else
		<div class="row">
		   <h4>
		   <div class="col-sm-2">
		       Item             
		   </div>
		                                                                      
		   <div class="col-sm-2">
		       Description           
		   </div>
		                                                                      
		   <div class="col-sm-2">
		       Price              
		   </div>
		                                                                      
		   <div class="col-sm-2">                  			       
			Purchase Link
		   </div>                             
		 
		   <div class="col-sm-2">
			Item Requested
		   </div>
	
		   </h4>
		</div>

		@foreach($items as $item)
			    <div class="row">
			       <h6>
		    	       <div class="col-sm-2">
			           {{ $item->item }}
			       </div>

			       <div class="col-sm-2">
			           {{ $item->description }}
			       </div>

			       <div class="col-sm-2">
			           $ {{ $item->price }}
			       </div>

			       <div class="col-sm-2">                  			       
                                   <a href='{{ $item->purchase_link}}'>click here to purchase</a>
			       </div>                             
			     
  			       <div class="col-sm-2">
                                    {{ $item->number_wanted }}
                               </div>

			       <div class="col-sm-2">         	   				
				   <a href='/wishlist/deleteitem/{{$item->id}}' class="btn btn-warning btn-xs">Delete item</a>
                        	</div>

			       </h6>
			    </div></br>
		@endforeach
	@endif

        <h1>My Circle Wishlists</h1>
		<p>You are not currently connected to a Circle. <a href='/wishlist/connect'>Connect to a Circle wishlist now!</a></p>
@stop
