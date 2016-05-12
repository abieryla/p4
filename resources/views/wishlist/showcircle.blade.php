@extends('layouts.master')

@section('title')
@stop

@section('content')
	<div class="row"><a href="/wishlist">Home</a> | <a href='/logout'>Logout</a></div>

        <h1>{{$wishlist->wishlist_name}}</h1>

	@if(sizeof($items) == 0)
		 There are no items in this wishlist.
	@else
		<div class="row">
		   <h4>
		   <div class="col-sm-2">
		       Item             
		   </div>
		                                                                      
		   <div class="col-sm-2">
		       Description           
		   </div>
		                                                                      
		   <div class="col-sm-1">
		       Price              
		   </div>
		                                                                      
		   <div class="col-sm-2">                  			       
			Purchase Link
		   </div>                             
		 
		   <div class="col-sm-1">
			Item wanted
		   </div>

		   <div class="col-sm-1">
			Items still needed
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

			       <div class="col-sm-1">
			           $ {{ $item->price }}
			       </div>

			       <div class="col-sm-2">                  			       
                                   <a href='{{ $item->purchase_link}}'>click here to purchase</a>
			       </div>                             
			     
  			       <div class="col-sm-1">
                                    <span class="badge alert-success">{{ $item->number_wanted }}</span>
                               </div>

			       <div class="col-sm-1">
                                   <span class="badge alert-danger">{{ $item->number_remaining }}</span>
                               </div>

			       <div class="col-sm-2">         	   				
                                   <a href='/wishlist/purchased/{{$item->id}}' class="btn btn-warning btn-xs">Did you purchase this?</a>
                        	</div>

			       </h6>
			    </div></br>
		@endforeach
	@endif

@stop
