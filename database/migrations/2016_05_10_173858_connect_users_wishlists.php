<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersWishlists extends Migration
{
        public function up()
        {                                                                 }}
            Schema::table('wishlist', function (Blueprint $table) {

                $table->integer('user_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('users');

            });
        }

        public function down()
        {
            Schema::table('wishlist', function (Blueprint $table) {

                $table->dropForeign('wishlist_user_id_foreign');

                $table->dropColumn('user_id');
            });
