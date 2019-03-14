<?php

namespace App\Http\Controllers;

use App\Year;
use Session;
use Illuminate\Http\Request;

class YearsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = Year::all();

        $choose_year = Year::withTrashed()->where('choose', 1)->first();

        return view('admin.year.index', compact('choose_year', 'year'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.year.create');
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
            'name' => 'required|max:4',
        ]);

        $year = new Year;
        $year->name = $request->name;
        $year->save();

        Session::flash('success', "You successfully created a new year.");

        return redirect()->route('years.index');
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
        $year = Year::withTrashed()->findOrFail($id);

        return view('admin.year.edit', compact($year));
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
            'name' => 'required|max:4',
        ]);

        $year = Year::withTrashed()->findOrFail($id);

        $year->name = $request->name;

        $year->update();

        Session::flash('success', "You successfully updated a year.");

        return redirect()->route('years.index');
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

    public function choose($id)
    {
        Year::withTrashed()->update(['choose' => 0]);

        $choose_year = Year::FindOrFail($id);

        $choose_year->choose = 1 ;

        $choose_year->save();

        Session::flash('success', "You successfully choose a year.");

        return redirect()->route('years.index');
    }

    public function delete($id)
    {
        $year = Year::findOrFail($id);

        $year->delete();

        Session::flash('success', "You successfully delete a year.");

        return redirect()->route('years.index');
    }

    public function trashed()
    {
        $year = Year::onlyTrashed();

        return view('admin.year.trashed', compact('year'));

    }

    public function restore($id)
    {
        $year = Year::withTrashed()->where('id', $id);

        $year->restore();

        Session::flash('success', "You successfully restore a year.");

        return redirect()->route('years.trashed');
    }

}

