<?php

namespace App\Http\Controllers;

use App\Event;
use App\Event_type;
use App\Year;
use Session;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Event::
        join('event_types', 'events.event_types_id', 'event_types.id')
        ->join('years', 'events.years_id', 'years.id')
        ->where('event_types.sort', 'activity')
        ->select('events.*', 'event_types.name as event_type_name', 'years.name as year_name')
        ->get();

        // echo($activity);

        return view('admin.activity.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $choose_year = Year::withTrashed()->where('choose', 1)->first();
        $activity_type = Event_type::all()->where('sort', 'activity');
        return view('admin.activity.create', compact('choose_year', 'activity_type'));
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
            'pic' => 'image',
            'type' => 'required',
            'sticker' => 'required|numeric',
            'date' => 'required'
        ]);


        $choose_year = Year::where('choose', 1)->first();

        $pic = $request->pic;
        if(($pic)!=null){
            $pic = time().$pic->getClientOriginalName();
            $pic->move('uploads/activity', $pic);
            $pic = 'uploads/activity/'.$pic;
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

        return redirect()->route('activities.index');
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
        $activity = Event::findOrFail($id);
        $choose_year = Year::withTrashed()->where('choose', 1)->first();
        $activity_type = Event_type::all()->where('sort', 'activity');
        return view('admin.activity.edit', compact('activity', 'choose_year', 'activity_type'));
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

        $activity = Event::findOrFail($id);
        $choose_year = Year::where('choose', 1)->first();

        $pic = $request->pic;
        if(($pic)!=null){
            $pic = time().$pic->getClientOriginalName();
            $pic->move('uploads/activity', $pic);
            $pic = 'uploads/activity/'.$pic;
            $activity->pic = $pic;
        }

        $activity->years_id = $choose_year->id;
        $activity->name = $request->name;
        $activity->event_types_id= $request->type;
        $activity->sticker = $request->sticker;
        $activity->date = $request->date;
        $activity-> update();



        Session::flash('success', "You successfully created a new item .");

        return redirect()->route('activities.index');
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
        $activity = Event::withTrashed()->findOrFail($id);

        $activity->delete();

        Session::flash('success', "You successfully delete a activity type.");

        return redirect()->route('activities.index');
    }

    public function trashed()
    {
        $activity = Event::onlyTrashed()
        ->join('event_types', 'events.event_types_id', 'event_types.id')
        ->join('years', 'events.years_id', 'years.id')
        ->where('event_types.sort', 'activity')
        ->select('events.*', 'event_types.name as event_type_name', 'years.name as year_name')
        ->get();

        return view('admin.activity.trashed', compact('activity'));

    }

    public function restore($id)
    {
        $activity = Event::withTrashed()->where('id', $id);

        $activity->restore();

        Session::flash('success', "You successfully restore a activity type.");

        return redirect()->route('activities.trashed');
    }
}
