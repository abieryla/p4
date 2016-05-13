<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WishlistController extends Controller {

	/**
	*	Home page for a logged in user, displays My Wishlists and My Circle Wishlists
	* 	User is allowed to view wishlists, add item, share wishlist and delete wishlist
	*	under My wishlists. User is allowed to view wishlist under the My Circle Wishlist
	**/

	public function getWishlist(){
		$wishlists = \App\Wishlist::where('user_id', '=', \Auth::id())->orderBy('id', 'DESC')->get();
		$circles = \App\Circle::where('circle_email', '=', \Auth::user()->email)->orderBy('id', 'DESC')->get();
		return view('wishlist.home')
			->with('circles', $circles)
			->with('wishlists', $wishlists);
	}


	/**
	*	Called when user clicking on "view wishlist" under My Wishlists
	*	Will display contents of that wishlist but not "number of items still needed"
	*	Allows owner of wishlist to edit or delete items
	**/

	public function getShow($id){
		$wishlist = \App\Wishlist::find($id);
		$items = \App\Item::where('wishlist_id', '=', $id)->orderBy('id', 'DESC')->get();
		return view('wishlist.show')
			->with('items', $items)
			->with('wishlist', $wishlist);
	}


	/**
	*	Called when user clicks on "view wishlist" under My Circle Wishlist
	*	Will display contents of the shared wishlist including "number of items still needed"
	*	Allows user to update if purchased
	**/

	public function getShowCircle($id){
		$wishlist = \App\Wishlist::find($id);
		$items = \App\Item::where('wishlist_id', '=', $id)->orderBy('id', 'DESC')->get();
		return view('wishlist.showcircle')
			->with('items', $items)
			->with('wishlist', $wishlist);
	}


	/**
	*	Called when user click on "delete wishlist" and a confirm delete page will be displayed
	**/

	public function getConfirmDelete($id) {
		$wishlist = \App\Wishlist::find($id);

		return view('wishlist.confirmdelete')->with('wishlist', $wishlist);

	}


	/**
	*	Called when user confirm they would like to delete a wishlist.
	*	function will delete all FK items and circles first and then delete the wishlist.
	*	Will redirect to home page
	**/

	public function getDelete($id) {
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
	
		\Session::flash('message', 'Your wishlist was deleted');

		return redirect('/wishlist');
	}	


	/**
	*	Called when a user clicks on "delete item"
	*	Redirects to home page
	**/

	public function getDeleteItem($id) {
		$item = \App\Item::find($id);

		$item->delete();

		return redirect('/wishlist');
	}



	/**
	*	Called when user clicks on "create wishlist"
	*	A form will be displayed for the user to fill out
	**/

	public function getCreate() {
		return view('wishlist.create');
	}
	

	/** 
	*	Called when user submits the form on the create wishlist page
	*	Wishlist is added to the wishlist table
	* 	Redirect to home page
	**/

	public function postCreate(Request $request) {

		$this->validate($request, ['wishlist_name' => 'required']);

		$data = $request->only('wishlist_name');
		$data['user_id'] = \Auth::id();

		$wishlist = new \App\Wishlist($data);
		$wishlist->save();

		return redirect('/wishlist');
	}


	/** 	
	*	Called when user click on "edit item"
	*	Form (filled with currently item info) is displayed for user to edit
	**/

	public function getEdit($id) {

		$item = \App\Item::find($id);

		return view('wishlist.edit')->with('item', $item);;
	}


	/**
	*	Called when user hits submit on the edit item page
	*	Item is updated in the database
	*	Redirect to home page
	**/

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
		$item->number_remaining = $request->number_wanted;

		$item->save();
		
		\Session::flash('message', 'Your item was updated');

		return redirect('/wishlist');
	}

	/**
	*	Called when user clicks on "add item"
	*	Form displayed to add an item
	**/
	

	public function getAdd($id) {
		
		$wishlist = \App\Wishlist::find($id);
		
		return view('wishlist.add')->with('wishlist', $wishlist);
	}


	/**	
	*	Called when user submits form on add an item page
	*	item is saved in the Items table with the wishlist_id FK
	*	Redirect to home page
	**/
	
	public function postAdd(Request $request) {

		$this->validate($request, [
			'item' => 'required',
			'description' => 'required',
			'price' => 'required|numeric',
			'purchase_link' => 'required|url',
			'number_wanted' => 'required|integer']);

		$wishlist_id = $request->id; 

		$data = $request->only('item','description','price','purchase_link','number_wanted');
		$data['number_remaining'] = $request->number_wanted;
		$data['wishlist_id'] = $wishlist_id;
		$item = new \App\Item($data);
		$item->save();				
	
		\Session::flash('message', 'Your item was added');

		return redirect('/wishlist');
	}

	/**
	*	Called when user clicks on "share wishlist" under the My Wishlsts section
	*	A form is displayed for a user to share that wishlist
	**/

	public function getShare($id) {

		$wishlist = \App\Wishlist::find($id);
		return view('wishlist.share')->with('wishlist', $wishlist);
	}


	/**
	*	Called when a user hits submit on the share wishlist page
	*	Information will be saved in the circles table with wishlist_id FK
	*	Error checks that this wishlist was already shared to the email address
	*	Redirect to home page
	**/

	public function postShare(Request $request) {

		$this->validate($request, [
		'name' => 'required',
		'circle_email' => 'required']);
	                                                                                              
		$wishlist_id = $request->id; 
		$circles = \App\Circle::where('circle_email', '=', $request->circle_email)->get();
	
		if($circles != null) {
			foreach($circles as $circle) {
				if(($circle->wishlist_id) == ($wishlist_id)) {
					\Session::flash('message', 'You have already shared this wishlist with '. $circle->circle_email);
					return redirect('/wishlist');
					
				}
			}
		}
	                                                                                             
		$data = $request->only('name','circle_email');
		$data['wishlist_id'] = $wishlist_id;

		$circle = new \App\Circle($data);
		$circle->save();

		\Session::flash('message', 'Your wislist was shared');

		return redirect('/wishlist');

	}


	/** 	
	*	Called when a user clicks on "did you purchase this?" when viewing items
	*	in a shared circle wishlist. A confirmation page will be displayed
	*	Error checks - If the number_remaining is zero there is no option to update
	**/

	public function getPurchased($id) {

		$item = \App\Item::find($id);

		return view('wishlist.purchased')->with('item', $item);
		
	}

	/** 
	*	Called when a user confirms they have purchased and item from a wishlist.
	*	The number_remaining in the circle table will be updated (-1).
	*	Redirect to home page
	**/


	public function getUpdate($id) {

		$item = \App\Item::find($id);
		$updated_num = (($item->number_remaining) - 1);

		$item->number_remaining = $updated_num;

		$item->save();

		return redirect('/wishlist');
	}	


}

