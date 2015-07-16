<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\AllDayEvent;

class AllDayEventContorller extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('admin.allEvent.create')->with('allDayEvent',allDayEvent::paginate(5));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'allEventName' => 'required|max:50',
            'allDayEventTime' => 'required',
            'allDayEventTimeEnd' => 'required',
            'allEventImgLink' => 'required|max:4',
        ]);

        $allDayEvent = new allDayEvent;
        $allDayEvent->allEventName = Input::get('allEventName');
        $allDayEvent->allDayEventTime = Input::get('allDayEventTime');
        $allDayEvent->allDayEventTimeEnd = Input::get('allDayEventTimeEnd');
        $allDayEvent->allEventImgLink = Input::get('allEventImgLink');

        if ($allDayEvent->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('Something Error');
        }

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
		return view('admin.allEvent.edit')->with('allDayEvent',allDayEvent::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
        $this->validate($request, [
            'allEventName' => 'required|max:50',
            'allDayEventTime' => 'required',
            'allDayEventTimeEnd' => 'required',
            'allEventImgLink' => 'required|max:4',
        ]);
	
		$allDayEvent = allDayEvent::find($id);
        $allDayEvent->allEventName = Input::get('allEventName');
        $allDayEvent->allDayEventTime = Input::get('allDayEventTime');
        $allDayEvent->allDayEventTimeEnd = Input::get('allDayEventTimeEnd');
        $allDayEvent->allEventImgLink = Input::get('allEventImgLink');
        if ($allDayEvent->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('Something Error');
        }
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
