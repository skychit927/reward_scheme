<?php

namespace App\Http\Controllers;

use App\Classroom;
Use App\Year;
use Session;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = Classroom::all();

        // $year = Year::withTrashed()->get();

        return view('admin.classroom.index', compact('classroom'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $choose_year = Year::withTrashed()->where('choose', 1)->first();

         return view('admin.classroom.create', compact('choose_year'));
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
            'name' => 'required',
        ]);

        $classroom = new Classroom;

        $choose_year = Year::where('choose', 1)->first();

        $classroom->name = $request->name;

        $classroom->years_id = $choose_year->id;

        $classroom->save();

        return redirect()->route('classrooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = Classroom::withTrashed()->findOrFail($id);

        $choose_year = Year::where('choose', 1)->first();

        return view('admin.classroom.edit', compact('classroom', 'choose_year'));
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

        $classroom = Classroom::withTrashed()->findOrFail($id);

        $choose_year = Year::withTrashed()->where('choose', 1)->first();

        $classroom->name = $request->name;

        $classroom->years_id = $choose_year->id;

        $classroom->update();

        Session::flash('success', 'You successfully updated a classroom.');

        return redirect()->route('classrooms.index');
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
        $classroom = Classroom::findOrFail($id);

        $classroom->delete();

        Session::flash('success', "You successfully delete a classroom.");

        return redirect()->route('classrooms.index');

    }

    public function trashed()
    {
        $classroom = Classroom::onlyTrashed();

        return view('admin.classroom.trashed', compact('classroom'));
    }

    public function restore($id)
    {
        $classroom = Classroom::withTrashed()->where('id', $id);

        $classroom->restore();

        Session::flash('success', "You successfully restore a room.");

        return redirect()->route('classrooms.trashed');
    }



}
