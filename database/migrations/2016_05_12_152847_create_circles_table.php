<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCirclesTable extends Migration
{
    public function up()
    {
        Schema::create('circles', function (Blueprint $table) {
    
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('circle_email');
    
        });
    }
    public function down()
    {
        Schema::drop('circles');
    }
}
