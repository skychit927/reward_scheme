<?php

namespace App\Http\Controllers;

use App\Event_type;
use Session;
use Illuminate\Http\Request;

class Activity_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity_type = Event_type::where('sort', 'activity')->get();

        return view('admin.activity_type.index', compact('activity_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activity_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $activity_type = new Event_type;
        $activity_type->name = $request->name;
        $activity_type->sort = 'activity';
        $activity_type->save();

        Session::flash('success', "You successfully created a activity type.");

        return redirect()->route('activity_types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity_type = Event_type::withTrashed()->findOrFail($id);

        return view('admin.activity_type.edit', compact('activity_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $activity_type = Event_type::withTrashed()->findOrFail($id);

        $activity_type->name = $request->name;

        $activity_type->update();

        Session::flash('success', "You successfully updated a activity type.");

        return redirect()->route('activity_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $activity_type = Event_type::withTrashed()->findOrFail($id);

        $activity_type->delete();

        Session::flash('success', "You successfully delete a activity type.");

        return redirect()->route('activity_types.index');
    }

    public function trashed()
    {
        $activity_type = Event_type::onlyTrashed()->where('sort', 'activity')->get();

        return view('admin.activity_type.trashed', compact('activity_type'));

    }

    public function restore($id)
    {
        $activity_type = Event_type::withTrashed()->where('id', $id);

        $activity_type->restore();

        Session::flash('success', "You successfully restore a activity type.");

        return redirect()->route('activity_types.trashed');
    }
}
