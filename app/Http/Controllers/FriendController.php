<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Friend;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Paginator;
use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Validation\ValidationException;
class FriendController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$friend = friend::paginate(10);
	$friend->setPath('friend');

		return view('friend')->with('friend',$friend);
		//
	}
	    public function searchID(Request $request)
{
	$v = Validator::make($request->all(), [
        'search' => 'required|integer|',
    ]);
	
	$val = Input::get('search');
    $friend = friend::where(function($query) use ($val)
{
    $query->where('captain_id', '=', $val);
    $query->orwhere('captain_2_id', '=', $val);
})->paginate(10);
if ($v->fails())
{
	return Redirect::back()->withErrors(['ID must be a integer']);
}else{
	 return view('friend')->with('friend',$friend);
}
   
}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				

    return view('addFriend')->with('item',item::all() );
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pad_id' => 'required|integer|digits:9',
            'captain_id' => 'required|max:4',
            'captain_2_id' => 'required|max:4',
            'need_id' => 'required|max:4',
			'text'=>'required|max:50',
			'g-recaptcha-response' => 'required|recaptcha',
        ]);
		
		$friend = new Friend;
        $friend->pad_id = Input::get('pad_id');
        $friend->captain_id = Input::get('captain_id');
        $friend->captainImgLink = Input::get('captain_id');
        $friend->captain_2_id = Input::get('captain_2_id');
        $friend->captain_2_idImgLink = Input::get('captain_2_id');
        $friend->need_id = Input::get('need_id');
        $friend->need_idImgLink = Input::get('need_id');
        $friend->text = Input::get('text');
if ($friend->save()) {
            return Redirect::to('friend')->with('friend',friend::all());
        } else {
            return Redirect::back()->withInput()->withErrors('Something Error!!');
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
