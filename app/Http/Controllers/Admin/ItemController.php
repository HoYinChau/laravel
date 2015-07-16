<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class ItemController extends Controller {

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
		return view('admin.item.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'activeSkillName' => 'required|max:20',
            'activeSkill' => 'required|max:255',
            'passiveSkillName' => 'required|max:20',
            'passiveSkill' => 'required|max:255',
			'imgLink'=>'required|max:4',
        ]);

        $items = new Item;
        $items->name = Input::get('name');
		$items->activeSkillName = Input::get('activeSkillName');
        $items->activeSkill = Input::get('activeSkill');
        $items->passiveSkillName = Input::get('passiveSkillName');
        $items->passiveSkill = Input::get('passiveSkill');
        $items->imgLink = Input::get('imgLink');

        if ($items->save()) {
            return Redirect::to('admin');
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
		return view('admin.item.edit')->with('item',Item::find($id));
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
            'name' => 'required|max:20',
            'activeSkillName' => 'required|max:20',
            'activeSkill' => 'required|max:255',
            'passiveSkillName' => 'required|max:20',
            'passiveSkill' => 'required|max:255',
			'imgLink'=>'required|max:4',
        ]);

        $items =Item::find($id);
        $items->name = Input::get('name');
		$items->activeSkillName = Input::get('activeSkillName');
        $items->activeSkill = Input::get('activeSkill');
        $items->passiveSkillName = Input::get('passiveSkillName');
        $items->passiveSkill = Input::get('passiveSkill');
		$items->imgLink = Input::get('imgLink');
		
        if ($items->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('Something Error!!');
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
        $items = Item::find($id);
        $items->delete();

        return Redirect::to('admin');
    }

}
