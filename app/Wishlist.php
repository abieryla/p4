<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $fillable = ['wishlist_name', 'user_id'];

    public function user() {
    	return $this->belongsTo('\App\User');
    }

    public function item() {
	return $this->hasMany('App\Item');
    }

    public function circle() {
	return $this->hasMany('App\Circle');
    }

}
