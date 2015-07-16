<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\Event;
use App\AllDayEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
class AdminHomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 	public function index()
	{
		//
		return view('adminIndex');	
}

	public function showAll()
	{
		//
		return view('admin.item.showAll')->with('item',item::all());	
}
	public function showEvent()
	{
		//
		return view('admin.event.showAll')->with('events',event::paginate(5));	
}
	public function showAllEvent()
	{
		//
		return view('admin.allEvent.showAll')->with('allDayEvent',allDayEvent::paginate(5));
}



	public function logout()
	{
		//
		Auth::logout(); // logout user
		return Redirect::to('/')->with('events',event::all())
									->with('allDayEvent',allDayEvent::all()); //redirect back to login
		
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
