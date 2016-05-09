@extends('layouts.master')


@section('title')
       No Peeking Wishlist 
@stop

@section('content')
	<div class="row"> <a href="/wishlist">Home</a> | <a href='/logout'>Logout</a> </div>
        <h1>Create a wishlist</h1>

	    <form method='POST' action='wishlist/create'>
            {{ csrf_field() }}
            <div class="errors">
            {{$errors->first('paragraph') }} <br>
            </div>
            Item Name:  
            <input type='text' name='item' size='100' value='{{ old('item') }}'><br>
            Description (color, size, etc.):
            <input type='text' name='description' size='200' value='{{ old('description') }}'><br>
            Price (ex. 19.99):
            <input type='number' name='price' size='50' value='{{ old('price') }}'><br>
            Enter Purchase link (copy from browser):
            <input type='text' name='purchase_link' size='100' value='{{ old('purchase_link') }}'><br>
            Enter number of items wanted:
            <input type='text' name='number_wanted' size='10' value='{{ old('number_wanted') }}'><br>
            Which wishlist does this belong to?
            <input type='text' name='wishlist_name' size='50' value='{{ old('wishlist_name') }}'><br>

            <input type='submit' value='Enter' ><br>
@stop
