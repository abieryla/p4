@extends('layouts.master')


@section('title')
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Delete a wishlist</h1>

	<p>Do you want to delete {{$wishlist->wishlist_name}}?</p>
	<p><a href='/wishlist/delete/{{$wishlist->id}}'>Yes, delete {{$wishlist->wishlist_name}}</a></p>
	<p><a href='/wishlist'>No, don't delete {{$wishlist->wishlist_name}}</a></p>
@stop
