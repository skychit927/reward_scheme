<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\FileUploadTrait;
// use App\Http\Requests\StoreUsersRequest;
// use App\Http\Requests\UpdateUsersRequest;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class PrizesController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $premission = 'all';
        if($user->role == 'teacher'){
            $premission = 'readOnly';
        }

        if (request()->ajax()) {
            $query = Event::query();
            $query->with('event_type');
            $query->with('year');
            $query->whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            });
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                $query->onlyTrashed();

                $template = 'restoreTemplate';
            }
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
            $table->editColumn('actions', function ($row) use ($template, $premission) {
                $routeKey = 'admin.prizes';
                return view($template, compact('row', 'routeKey', 'premission'));
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
            $table->editColumn('detail', function ($row) {
                return $row->detail ? $row->detail : '';
            });
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

        return view('pages.prizes.index', compact('premission'));
    }

    public function create()
    {
        $user = \Auth::user();
        if ($user->role != 'admin') {
            return abort(401);
        }
        $prize_types = \App\EventType::where('sort', 'prize')
            ->get()
            ->pluck('name', 'id')
            ->prepend(trans('global.app_please_select'), '');

        $years = \App\Year::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        return view('pages.prizes.create', compact('prize_types', 'years'));
    }

    public function store(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $prize = Event::create($request->all());
        return redirect()->route('admin.prizes.index');
    }

    public function edit($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $prize = Event::whereHas('event_type', function ($query) {
            $query->where('sort', 'prize');
        })->findOrFail($id);

        $prize_types = \App\EventType::where('sort', 'prize')
            ->get()
            ->pluck('name', 'id')
            ->prepend(trans('global.app_please_select'), '');

        $years = \App\Year::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        return view('pages.prizes.edit', compact('prize', 'prize_types', 'years'));
    }

    public function update(Request $request, $id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $request = $this->saveFiles($request);
        $prize = Event::whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            })->findOrFail($id);
        $prize->update($request->all());
        return redirect()->route('admin.prizes.index');
    }

    public function show($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $prize = Event::whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            })
            ->with('event_type')
            ->with('year')
            ->findOrFail($id);
        return view('pages.prizes.show', compact('prize'));
    }

    public function destroy($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $prize = Event::whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            })->findOrFail($id);
        $prize->delete();

        return redirect()->route('admin.prizes.index');
    }

    public function massDestroy(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Event::whereIn('id', $request->input('ids'))
                ->whereHas('event_type', function ($query) {
                    $query->where('sort', 'prize');
                })
                ->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function restore($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $prize = Event::whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            })
            ->onlyTrashed()
            ->findOrFail($id);
        $prize->restore();

        return redirect()->route('admin.prizes.index');
    }

    public function perma_del($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $prize = Event::whereHas('event_type', function ($query) {
                $query->where('sort', 'prize');
            })
            ->onlyTrashed()
            ->findOrFail($id);
        $prize->forceDelete();

        return redirect()->route('admin.prizes.index');
    }

}
