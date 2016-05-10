<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectItemsWishlists extends Migration
{
    public function up()
    {
	Schema::table('wishlists', function (Blueprint $table) {
		$table->integer('item_id')->unsigned();
		$table->foreign('item_id')->references('id')->on('items');
	});
    }
		
    public function down()
    {
	Schema::table('wishlists', function (Blueprint $table) {
		$table->dropForeign('wishlists_item_id_foreign');
		$table->dropColumn('item_id');
	});
    }
}
