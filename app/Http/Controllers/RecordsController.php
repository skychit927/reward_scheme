<?php

namespace App\Http\Controllers;

use App\Transition;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class RecordsController extends Controller
{
    public function activityRecord(){
        if (request()->ajax()) {
            $query = Transition::query();
            $query->with('student');
            $query->with('handler');
            $query->with('activity');


            $template = 'actionsTemplate';

            $query->select([
                'transitions.id',
                'transitions.student_id',
                'transitions.handler_id',
                'transitions.status',
                'transitions.created_at',
                'transitions.updated_at',
            ]);
            $query->where('status', '<>', 'P');
            $query->whereHas('event.event_type', function($query){
                $query->where('sort', 'activity');
            });

            $user = \Auth::user();
            if($user->role == 'student'){
                $query->where('student_id', $user->id);
            }


            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            $table->editColumn('student.name', function ($row) {
                return $row->student ? $row->student->name : '';
            });
            $table->editColumn('handler.name', function ($row) {
                return $row->handler ? $row->handler->name : '';
            });
            $table->editColumn('activity.name', function ($row) {
                if(count($row->activity) == 0) {
                    return '';
                }

                $tampArr = $row->activity->pluck('name');
                // for ($i = 0; $i < sizeof($tampArr); $i++) {
                //     $tampArr[$i] = $tampArr[$i] . ' × ' . $row->event->pluck('pivot.qty')[$i];
                // }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $tampArr->toArray() ) . '</span>';
            });

            $table->editColumn('total_amount', function ($row) {
                if(count($row->activity) == 0) {
                    return '';
                }

                $sum = 0;
                foreach ($row->activity as $item) {
                    $sum += (int)$item['sticker_amount'] * (int)$item['pivot']['qty'];
                }
                return $sum;
            });

            $table->editColumn('status', function ($row) {
                $statusString = '';
                if($row->status == 'R'){
                    $statusString = 'Processing';
                } else if($row->status == 'S'){
                    $statusString = 'Success';
                } else if($row->status == 'C'){
                    $statusString = 'Canncel';
                } else if($row->status == 'F'){
                    $statusString = 'Fail';
                }

                return $row->status ? $statusString : '';
            });

            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? Carbon::parse($row->created_at)->format('Y/m/d H:i') : '';
            });

            $table->editColumn('updated_at', function ($row) {
                return $row->updated_at ? Carbon::parse($row->updated_at)->format('Y/m/d H:i') : '';
            });

            $table->rawColumns(['activity.name']);
            return $table->make(true);

        }

        return view('pages.record.activity_record');
    }

    public function prizeRecord(){
        if (request()->ajax()) {
            $query = Transition::query();
            $query->with('student');
            $query->with('handler');
            $query->with('prize');

            $template = 'actionsTemplate';

            $query->select([
                'transitions.id',
                'transitions.student_id',
                'transitions.handler_id',
                'transitions.status',
                'transitions.created_at',
                'transitions.updated_at',
            ]);
            $query->where('status', '<>', 'P');
            $query->whereHas('event.event_type', function($query){
                $query->where('sort', 'prize');
            });

            $user = \Auth::user();
            if($user->role == 'student'){
                $query->where('student_id', $user->id);
            }

            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            $table->editColumn('student.name', function ($row) {
                return $row->student ? $row->student->name : '';
            });
            $table->editColumn('handler.name', function ($row) {
                return $row->handler ? $row->handler->name : '';
            });
            $table->editColumn('prize.name', function ($row) {
                if(count($row->prize) == 0) {
                    return '';
                }

                $tampArr = $row->prize->pluck('name');
                for ($i = 0; $i < sizeof($tampArr); $i++) {
                    $tampArr[$i] = $tampArr[$i] . ' × ' . $row->prize->pluck('pivot.qty')[$i];
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $tampArr->toArray() ) . '</span>';
            });

            $table->editColumn('total_amount', function ($row) {
                if(count($row->prize) == 0) {
                    return '';
                }

                $sum = 0;
                foreach ($row->prize as $item) {
                    $sum += (int)$item['sticker_amount'] * (int)$item['pivot']['qty'];
                }
                return $sum;
            });

            $table->editColumn('status', function ($row) {
                $statusString = '';
                if($row->status == 'R'){
                    $statusString = 'Processing';
                } else if($row->status == 'S'){
                    $statusString = 'Success';
                } else if($row->status == 'C'){
                    $statusString = 'Canncel';
                } else if($row->status == 'F'){
                    $statusString = 'Fail';
                }

                return $row->status ? $statusString : '';
            });

            $table->editColumn('created_at', function ($row) {
                return $row->created_at ? Carbon::parse($row->created_at)->format('Y/m/d H:i') : '';
            });

            $table->editColumn('updated_at', function ($row) {
                return $row->updated_at ? Carbon::parse($row->updated_at)->format('Y/m/d H:i') : '';
            });

            $table->rawColumns(['prize.name']);
            return $table->make(true);

        }

        return view('pages.record.prize_record');
    }

    public function StickerRecord(){
        $user = \Auth::user();
        if($user->role == 'student'){
            return abort(401);
        }

        if (request()->ajax()) {
            $query = User::query();
            $query->with(['transition' => function($query){
                $query->whereIn('status', ['S', 'P']);
                $query->with('event.event_type');
            }]);

            $query->where('role', 'student');

            $table = Datatables::of($query);
            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->editColumn('sticker_amount', function ($row) {
                if(count($row->transition) == 0) {
                    return 0;
                }

                $sum = 0;
                foreach ($row->transition as $item) {
                    foreach ($item['event'] as $event) {
                        if($event['event_type']['sort'] == 'activity'){
                            $sum += $event['sticker_amount'] * $event['pivot']['qty'];
                        } else if ($event['event_type']['sort'] == 'prize'){
                            $sum -= $event['sticker_amount'] * $event['pivot']['qty'];
                        }
                    }
                }
                return $sum;
            });

            // $table->rawColumns(['prize.name']);
            return $table->make(true);

        }

        return view('pages.record.sticker_record');
    }
}
