<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{    
    protected $fillable = ['item','description','price','purchase_link','number_wanted','number_remaining', 'wishlist_id'];

   public function wishlist() {
	return $this->belongsTo('\App\Wishlist');
    }
}
