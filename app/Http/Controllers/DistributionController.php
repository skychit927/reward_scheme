<?php

namespace App\Http\Controllers;

use App\Transition;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DistributionController extends Controller
{
    public function Distribution(){
        $user = \Auth::user();
        if ($user->role != 'teacher') {
            return abort(401);
        }

        $activitys = \App\Event::select(
            DB::raw('CONCAT(name, " | Date: ", date ," | Sticker Amount: ", sticker_amount) AS name'),
            'id'
        )
        ->whereHas('event_type', function ($query) {
            $query->where('sort', 'activity');
        })
        ->get()
        ->pluck('name', 'id')
        ->prepend(trans('global.app_please_select'), '');

        if (request()->ajax()) {
            $query = User::query();
            $query->with('classroom');
            $query->where('role', 'student');

            $template = 'distributionActionTemplate';

            $query->select([
                'users.id',
                'users.name',
                'users.classroom_id',
                'users.classNo'
            ]);
            $table = Datatables::of($query);


            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template, $activitys) {

                return view($template, compact('row', 'activitys'));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('classroom.name', function ($row) {
                return $row->classroom ? $row->classroom->name : 'Not Applicable';
            });
            $table->editColumn('classNo', function ($row) {
                return $row->classNo ? $row->classNo : 'Not Applicable';
            });

            $table->rawColumns(['actions']);
            return $table->make(true);
        }
        return view('pages.distribution.list');

    }

    public function AddActivity(Request $request){
        $user = \Auth::user();
        if ($user->role != 'teacher') {
            return abort(401);
        }

        $transition = new Transition;
        $transition->student_id = $request->input('student_id');
        $transition->handler_id = $user->id;
        $transition->status = 'S';
        $transition->save();

        $transition->event()->attach($request->input('event_id'), ['qty' => 1]);
        return view('pages.distribution.list');
    }
}
