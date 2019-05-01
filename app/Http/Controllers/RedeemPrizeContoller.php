<?php

namespace App\Http\Controllers;

use App\Transition;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RedeemPrizeContoller extends Controller
{
    public function RedeemPrize(){
        $user = \Auth::user();
        if ($user->role != 'student') {
            return abort(401);
        }


        if (request()->ajax()) {
            $query = Event::query();
            $query->with('event_type');
            $query->with('year');
            $query->whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            });
            $query->whereHas('year', function ($query) {
                $query->where('choose', 1);
            });

            $template = 'reedemPrizeTemplate';

            $query->select([
                'events.id',
                'events.name',
                'events.event_type_id',
                'events.sticker_amount',
                'events.image_url',
                'events.detail',
                'events.date',
                'events.year_id',
                'events.updated_at'
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                return view($template, compact('row'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('event_type.name', function ($row) {
                return $row->event_type ? $row->event_type->name : '';
            });
            $table->editColumn('sticker_amount', function ($row) {
                return $row->sticker_amount ? $row->sticker_amount : '';
            });
            $table->editColumn('image_url', function ($row) {
                if($row->image_url) {
                    return '<a href="'. asset(env('UPLOAD_PATH').'/' . $row->image_url) .
                           '" target="_blank"><img src="'. asset(env('UPLOAD_PATH').
                           '/thumb/' .
                           $row->image_url) .'"/>';
                };
            });
            // $table->editColumn('detail', function ($row) {
            //     return $row->detail ? $row->detail : '';
            // });
            // $table->editColumn('date', function ($row) {
            //     return $row->date ? $row->date : 'Not Applicable';
            // });
            $table->editColumn('year.name', function ($row) {
                return $row->year ? $row->year->name : '';
            });
            $table->editColumn('updated_at', function ($row) {
                return $row->updated_at ? Carbon::parse($row->updated_at)->format('Y/m/d H:i') : '';
            });

            $table->rawColumns(['actions','massDelete', 'image_url']);

            return $table->make(true);
        }

        return view('pages.reedeem_prize.list');

    }

    public function add($id)
    {
        $user = \Auth::user();
        if ($user->role != 'student') {
            return abort(401);
        }

        $query = Event::query();
        $query->with('year');
        $query->whereHas('event_type', function ($query) {
            $query->where('sort', 'prize');
        });
        $query->whereHas('year', function ($query) {
            $query->where('choose', 1);
        });
        $prize = $query->findOrFail($id);



        return view('pages.reedeem_prize.add', compact('id', 'prize'));
    }


    public function AddCart(Request $request){
        $user = \Auth::user();
        if ($user->role != 'student') {
            return abort(401);
        }

        $transition = new Transition;
        $transition->student_id = $user->id;
        $transition->handler_id = null;
        $transition->status = 'P';
        $transition->save();

        $transition->event()->attach($request->input('event_id'), ['qty' => $request->input('qty')]);
        return view('pages.reedeem_prize.list');
    }
}
