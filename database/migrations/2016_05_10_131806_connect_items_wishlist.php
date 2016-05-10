<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectItemsWishlist extends Migration
{
    public function up()
    {
	Schema::table('wishlist', function (Blueprint $table) {
		$table->integer('item_id')->unsigned();
		$table->foreign('item_id')->references('id')->on('item');
	});
    }
		

    public function down()
    {
	Schema::table('wishlist', function (Blueprint $table) {
		$table->dropForeign('wishlist_item_id_foreign');
		$table->dropColumn('item_id');
	});
    }
}
