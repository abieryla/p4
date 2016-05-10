<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistTable extends Migration
{
public function up() 
{
    Schema::create('wishlist', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();
        $table->string('wishlist_name');

    });
}
public function down()
{
    Schema::drop('wishlist');
}

}
