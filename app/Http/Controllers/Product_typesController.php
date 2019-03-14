<?php

namespace App\Http\Controllers;

use App\Event_type;
use Session;
use Illuminate\Http\Request;

class Product_typesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_type = Event_type::where('sort', 'product')->get();

        return view('admin.product_type.index', compact('product_type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_type.create');
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

        $product_type = new Event_type;
        $product_type->name = $request->name;
        $product_type->sort = 'product';
        $product_type->save();

        Session::flash('success', "You successfully created a product type.");

        return redirect()->route('product_types.index');
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
        $product_type = Event_type::withTrashed()->findOrFail($id);

        return view('admin.product_type.edit', compact('product_type'));
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

        $product_type = Event_type::withTrashed()->findOrFail($id);

        $product_type->name = $request->name;

        $product_type->update();

        Session::flash('success', "You successfully updated a product type.");

        return redirect()->route('product_types.index');
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
        $product_type = Event_type::withTrashed()->findOrFail($id);

        $product_type->delete();

        Session::flash('success', "You successfully delete a product type.");

        return redirect()->route('product_types.index');
    }

    public function trashed()
    {
        $product_type = Event_type::onlyTrashed()->where('sort', 'product')->get();

        return view('admin.product_type.trashed', compact('product_type'));

    }

    public function restore($id)
    {
        $product_type = Event_type::withTrashed()->where('id', $id);

        $product_type->restore();

        Session::flash('success', "You successfully restore a product type.");

        return redirect()->route('product_types.trashed');
    }
}
