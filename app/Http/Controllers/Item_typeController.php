<?php

namespace App\Http\Controllers;

use Session;
use App\Item_type;
use Illuminate\Http\Request;

class Item_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.item_type.index')->with('item_type', Item_type::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item_type.create');
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
            'name' => 'required|max:255',
        ]);

        $item_type = new Item_type;

        $item_type->name = $request->name;
        $item_type->save();

        Session::flash('success', "You successfully created a item type.");

        return redirect()->route('item_type.index');
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
        $item_type = Item_type::find($id);

        return view('admin.item_type.edit')->with('item_type', $item_type);
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
        $item_type = Item_type::find($id);

        $item_type->name = $request->name;

        $item_type->save();

        Session::flash('success', "You successfully updated a item type.");

        return redirect()->route('item_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item_type = Item_type::find($id);

        $item_type->delete();

        Session::flash('success', "You successfully deleted a item type.");

        return redirect()->back();
    }
}
