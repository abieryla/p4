<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectItemsWishlists extends Migration
{
    public function up()
    {
	Schema::table('items', function (Blueprint $table) {
		$table->integer('wishlist_id')->unsigned();
		$table->foreign('wishlist_id')->references('id')->on('wishlists');
	});
    }
		
    public function down()
    {
	Schema::table('items', function (Blueprint $table) {
		$table->dropForeign('items_wishlist_id_foreign');
		$table->dropColumn('wishlst_id');
	});
    }
}
