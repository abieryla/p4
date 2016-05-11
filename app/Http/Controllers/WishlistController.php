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

	public function getConfirmDelete($id = null) {
		$wishlist = \App\Wishlist::find($id);

		$items_to_remove = \App\Item::find($wishlist_id);


		return view('wishlist.confirmdelete')->with('wishlist', $wishlist);

	}

	public function getDelete($id = null) {
		$wishlist = \App\Wishlist::find($id);

		$wishlist->delete();

		\Session::flash('message', $wishlist->wishlist_name.' was deleted.');
		return redirect('/wishlist');
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

	public function getAdd($id) {
		
		$wishlist = \App\Wishlist::find($id);
		
		return view('wishlist.add');
	}

	
	public function postAdd(Request $request) {

		$this->validate($request, [
			'item' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
			'purchase_link' => 'required|url',
			'number_wanted' => 'required|integer']);

		$wishlist_id = $request->id; 

		$data = $request->only('item','description','price','purchase_link','number_wanted');
		$data['wishlist_id'] = $wishlist_id;
		$item = new \App\Item($data);
		$item->save();

		return redirect('/wishlist');
	}




	public function getConnect() {
		return view('wishlist.connect');
	}

	public function postConnect() {
		return view('wishlist.home');
	}
}

