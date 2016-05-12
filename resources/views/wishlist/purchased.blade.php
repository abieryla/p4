@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Did you purchase this item?</h1>

	<p><a href='/wishlist/update/{{$wishlist->id}}'>Yes, I did! </a></p>
	<p><a href='/wishlist'>No, get me out of here!</a></p>
@stop
