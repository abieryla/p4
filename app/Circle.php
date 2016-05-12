<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $fillable = ['name','circle_email', 'wishlist_id'];

   public function wishlist() {
        return $this->belongsTo('\App\Wishlist');
    }
}
