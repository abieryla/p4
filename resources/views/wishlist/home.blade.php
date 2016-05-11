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
		<div class="row">
		<ol>
		@foreach($wishlists as $wishlist)
			<li>
			    <h4>{{ $wishlist->wishlist_name}} <a href='/wishlist/add'>Add item</a></h4>
			</li></br>
		@endforeach
		</ol>
		</div>
	@endif

        <h1>My Circle Wishlists</h1>
		<p>You are not currently connected to a Circle. <a href='/wishlist/connect'>Connect to a Circle wishlist now!</a></p>
@stop
