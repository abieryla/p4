@extends('layouts.master')


@section('title')
       No Peeking Wishlist 
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>My Wishlists</h1>
	@if(sizeof($wishlist) == 0)
		You do not currently have any wishlists setup. <a href='/wishlist/create'>Create a wishlist now!</a>
	@endif
        <h1>My Circle Wishlists</h1>
@stop
