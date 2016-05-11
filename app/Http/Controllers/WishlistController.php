<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller {

	public function postWishlist(){
		return view('wishlist.home');
	}


	public function getWishlist(){
		$wishlists = \App\Wishlist::where('user_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();
		return view('wishlist.home')->with('wishlists', $wishlists);
	}

	public function getCreate() {
		return view('wishlist.create');
	}
	
	public function postCreate(Request $request) {

		$this->validate($request, ['wishlist_name' => 'required']);

		$data = $request->only('wishlist_name');
		$data['user_id'] = \Auth::id();

		$wishlist = new \App\Wishlist($data);
		$wishlist->save();

		return redirect('/wishlist');
	}

	public function getAdd() {
		return view('wishlist.add');
	}
	
	public function postAdd(Request $request) {

		$this->validate($request, [
			'item' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
			'purchase_link' => 'required|url',
			'number_wanted' => 'required|integer']);

		$data = $request->only('item','description','price','purchase_link','number_wanted');
		$data['wishlist_id'] = \App\Wishlist::id();

		$item = new \App\Item($data);
		$item->save();

		return view('wishlist.add');
	}




	public function getConnect() {
		return view('wishlist.connect');
	}

	public function postConnect() {
		return view('wishlist.home');
	}
}

