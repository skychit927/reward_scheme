<?php

namespace App\Http\Controllers;

use Session;
use App\Item_type;
use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.inventory.index')->with('inventory', Inventory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.inventory.create')->with('item_type', Item_type::all());
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
            'item_name' => 'required|max:255',
            'item_pic' => 'required|image',
            'stock' => 'required|numeric',
            'needed_sticker' => 'required|numeric',
            'item_type_id' => 'required'

        ]);

        $item_pic = $request->item_pic;
        $item_pic_new_name = time().$item_pic->getClientOriginalName();
        $item_pic->move('uploads/inventory', $item_pic_new_name);

        $inventory = Inventory::create([
            'item_name' => $request->item_name,
            'item_pic' => 'uploads/inventory/'.$item_pic_new_name,
            'stock' => $request->stock,
            'needed_sticker' => $request->needed_sticker,
            'item_type_id' => $request->item_type_id,
            'slug' => str_slug($request->item_name),
        ]);

        Session::flash('success', "You successfully created a new item .");



        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);

        $inventory->delete();

        Session::flash('success', "You successfully deleted a item.");

        return redirect()->back();
    }

    public function trashed()
    {
        $inventory = Inventory::onlyTrashed()->get();

        return view('admin.inventory.trashed')->with('inventory', $inventory);
    }
}
