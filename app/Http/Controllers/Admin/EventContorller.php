<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use App\Event;
class EventContorller extends Controller {

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
		return view('admin.event.create')->with('event',event::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'eventTimeA' => 'required',
            'eventTimeB' => 'required',
            'eventTimeC' => 'required',
            'eventTimeD' => 'required',
            'eventTimeE' => 'required',
            'eventImgLink' => 'required|max:4',
        ]);

        $event = new Event;
        $event->eventTimeA = Input::get('eventTimeA');
        $event->eventTimeB = Input::get('eventTimeB');
        $event->eventTimeC = Input::get('eventTimeC');
        $event->eventTimeD = Input::get('eventTimeD');
        $event->eventTimeE = Input::get('eventTimeE');
        $event->eventImgLink = Input::get('eventImgLink');	

        if ($event->save()) {
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
        return view('admin.event.edit')->with('event',Event::find($id));

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
            'eventTimeA' => 'required',
            'eventTimeB' => 'required',
            'eventTimeC' => 'required',
            'eventTimeD' => 'required',
            'eventTimeE' => 'required',
            'eventImgLink' => 'required|max:4',
        ]);
	
		$event = Event::find($id);
        $event->eventTimeA = Input::get('eventTimeA');
        $event->eventTimeB = Input::get('eventTimeB');
        $event->eventTimeC = Input::get('eventTimeC');
        $event->eventTimeD = Input::get('eventTimeD');
        $event->eventTimeE = Input::get('eventTimeE');
        $event->eventImgLink = Input::get('eventImgLink');	
        if ($event->save()) {
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
		$event = Event::find($id);
        $event->delete();

        return Redirect::to('admin');
	}

}
