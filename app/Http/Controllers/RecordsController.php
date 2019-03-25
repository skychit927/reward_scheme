<?php

namespace App\Http\Controllers;

use App\Transition;
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
}
