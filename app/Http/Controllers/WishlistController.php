<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller {

	public function postWishlist(){
		return view('wishlist.home');
	}

##	public function getWishlist(Request $request){
##	 	$wishlist = \App\Wishlist::where('user_id', '=', \Auth::id())->orderBy('id','DESC')->get();
##		return view('wishlist.home')->with('wishlist',$wishlist);
##	}

	public function getWishlist(){
		return view('wishlist.home');
	}

	public function getCreate() {
		return view('wishlist.create');
	}
	
	public function postCreate(Request $request) {

		$this->validate($request, ['wishlist_name' => required]);

		$data = $request->only('wishlist_name');
		$data['user_id'] = \Auth::id();

		$wishlist = new \App\Wishlist($data);
		$wishlist->save();

		return redirect('/wishlist');
	}

	public function getAdd() {
		return view('wishlist.add');
	}
	
	public function postAdd() {
		return view('wishlist.add');
	}


	public function getConnect() {
		return view('wishlist.connect');
	}

	public function postConnect() {
		return view('wishlist.home');
	}
}

