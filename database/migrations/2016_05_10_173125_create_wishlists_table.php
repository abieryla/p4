<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistsTable extends Migration
{
	public function up() 
	{
	    Schema::create('wishlists', function (Blueprint $table) {
	        $table->increments('id');
	        $table->timestamps();
	        $table->string('wishlist_name');
	
	    });
	}

	public function down()
	{
	    Schema::drop('wishlists');
	}
}
