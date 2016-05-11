<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{    
    protected $fillable = ['item','description','price','purchase_link','number_wanted', 'wishlist_id'];

   public function item() {
	return $this->belongsTo('\App\Item');
    }
}
