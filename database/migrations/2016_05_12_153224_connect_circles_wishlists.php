<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectCirclesWishlists extends Migration
{
    public function up()
     {
  	Schema::table('circles', function (Blueprint $table) {
  		$table->integer('wishlist_id')->unsigned();
  		$table->foreign('wishlist_id')->references('id')->on('wishlists');
  	});
      }
  		
      public function down()
      {
  	Schema::table('circles', function (Blueprint $table) {
  		$table->dropForeign('circles_wishlist_id_foreign');
  		$table->dropColumn('wishlst_id');
  	});
      }
}
