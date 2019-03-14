<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_type;
use Session;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Event::
        join('event_types', 'events.event_types_id', 'event_types.id')
        ->join('years', 'events.years_id', 'years.id')
        ->where('event_types.sort', 'product')
        ->select('events.*', 'event_types.name as event_type_name', 'years.name as year_name')
        ->get();

        // echo($product);

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $choose_year = Year::withTrashed()->where('choose', 1)->first();
        $product_type = Event_type::all()->where('sort', 'product');
        return view('admin.product.create', compact('choose_year', 'product_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $this->validate($request, [
                'name' => 'required|max:255',
                'pic' => 'image',
                'type' => 'required',
                'sticker' => 'required|numeric',
                'date' => 'required'
            ]);


            $choose_year = Year::where('choose', 1)->first();

            $pic = $request->pic;
            if(($pic)!=null){
                $pic = time().$pic->getClientOriginalName();
                $pic->move('uploads/product', $pic);
                $pic = 'uploads/product/'.$pic;
            }else{
                $pic = null;
            }

            Event::create([
                'years_id' => $choose_year->id,
                'name' => $request->name,
                'pic' => $pic,
                'event_types_id' => $request->type,
                'sticker' => $request->sticker,
                'date' => $request->date,
            ]);

            Session::flash('success', "You successfully created a new item .");

            return redirect()->route('products.index');
        }
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
        $product = Event::findOrFail($id);
        $choose_year = Year::withTrashed()->where('choose', 1)->first();
        $product_type = Event_type::all()->where('sort', 'product');
        return view('admin.product.edit', compact('product', 'choose_year', 'product_type'));
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
            'name' => 'required|max:255',
            'pic' => 'image',
            'type' => 'required',
            'sticker' => 'required|numeric',
            'date' => 'required'
        ]);

        $product = Event::findOrFail($id);
        $choose_year = Year::where('choose', 1)->first();

        $pic = $request->pic;
        if(($pic)!=null){
            $pic = time().$pic->getClientOriginalName();
            $pic->move('uploads/product', $pic);
            $pic = 'uploads/product/'.$pic;
            $product->pic = $pic;
        }

        $product->years_id = $choose_year->id;
        $product->name = $request->name;
        $product->event_types_id= $request->type;
        $product->sticker = $request->sticker;
        $product->date = $request->date;
        $product-> update();



        Session::flash('success', "You successfully created a new item .");

        return redirect()->route('products.index');
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
        $product = Event::withTrashed()->findOrFail($id);

        $product->delete();

        Session::flash('success', "You successfully delete a product type.");

        return redirect()->route('products.index');
    }

    public function trashed()
    {
        $product = Event::onlyTrashed()
        ->join('event_types', 'events.event_types_id', 'event_types.id')
        ->join('years', 'events.years_id', 'years.id')
        ->where('event_types.sort', 'product')
        ->select('events.*', 'event_types.name as event_type_name', 'years.name as year_name')
        ->get();

        return view('admin.product.trashed', compact('product'));

    }

    public function restore($id)
    {
        $product = Event::withTrashed()->where('id', $id);

        $product->restore();

        Session::flash('success', "You successfully restore a product type.");

        return redirect()->route('products.trashed');
    }
}
