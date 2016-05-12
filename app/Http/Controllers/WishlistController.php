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
		$circles = \App\Circle::where('circle_email', '=', \Auth::user()->email)->orderBy('id', 'DESC')->get();
		return view('wishlist.home')
			->with('circles', $circles)
			->with('wishlists', $wishlists);
	}

	public function getShow($id){
		$wishlist = \App\Wishlist::find($id);
		$items = \App\Item::where('wishlist_id', '=', $id)->orderBy('id', 'DESC')->get();
		return view('wishlist.show')
			->with('items', $items)
			->with('wishlist', $wishlist);
	}

	public function getShowCircle($id){
		$wishlist = \App\Wishlist::find($id);
		$items = \App\Item::where('wishlist_id', '=', $id)->orderBy('id', 'DESC')->get();
		return view('wishlist.showcircle')
			->with('items', $items)
			->with('wishlist', $wishlist);
	}


	public function getConfirmDelete($id = null) {
		$wishlist = \App\Wishlist::find($id);

		return view('wishlist.confirmdelete')->with('wishlist', $wishlist);

	}

	public function getDelete($id = null) {
		$wishlist = \App\Wishlist::find($id);
		$items = \App\Item::where('wishlist_id', '=', $wishlist->id)->get();
		$circles = \App\Circle::where('wishlist_id', '=', $wishlist->id)->get();


		if($items != null) {
			foreach($items as $item) {
				$item->delete();
			}
		}

		if($circles != null) {
			foreach($circles as $circle) {
				$circle->delete();
			}
		}

		
		$wishlist->delete();	

		return redirect('/wishlist');
	}	

	public function getDeleteItem($id) {
		$item = \App\Item::find($id);

		$item->delete();

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


	public function getEdit($id) {

		$item = \App\Item::find($id);

		return view('wishlist.edit')->with('item', $item);;
	}

	public function postEdit(Request $request) {

		$this->validate($request, [
			'item' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
			'purchase_link' => 'required|url',
			'number_wanted' => 'required|integer']);

		$item = \App\Item::find($request->id);

		$item->item = $request->item;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->purchase_link = $request->purchase_link;
		$item->number_wanted = $request->number_wanted;

		$item->save();

		return redirect('/wishlist');
	}


	

	public function getAdd($id) {
		
		$wishlist = \App\Wishlist::find($id);
		
		return view('wishlist.add')->with('wishlist', $wishlist);
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

	public function getShare($id) {

		$wishlist = \App\Wishlist::find($id);
		return view('wishlist.share')->with('wishlist', $wishlist);
	}


	public function postShare(Request $request) {

		$this->validate($request, [
		'name' => 'required',
		'circle_email' => 'required']);
	                                                                                              
		$wishlist_id = $request->id; 
	                                                                                              
		$data = $request->only('name','circle_email');
		$data['wishlist_id'] = $wishlist_id;

		$circle = new \App\Circle($data);
		$circle->save();
	                                                                                              
		return redirect('/wishlist');



	}


}

