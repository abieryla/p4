<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{

    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
    
            $table->increments('id');
            $table->timestamps();
            $table->string('item');
            $table->string('description');
            $table->decimal('price', 10,2);
            $table->string('purchase_link');
            $table->integer('number_wanted');
            $table->string('wishlist_name');
    
        });
    }
    public function down()
    {
        Schema::drop('item');
    }
}
