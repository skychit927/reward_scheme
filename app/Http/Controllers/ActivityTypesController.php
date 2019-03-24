<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreUsersRequest;
// use App\Http\Requests\UpdateUsersRequest;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class ActivityTypesController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $premission = 'all';

        if (request()->ajax()) {
            $query = EventType::query();
            $query->where('sort', 'activity');
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                $query->onlyTrashed();

                $template = 'restoreTemplate';
            }
            $query->select([
                'event_types.id',
                'event_types.name',
                'event_types.sort',
                'event_types.updated_at'
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template, $premission) {
                $routeKey = 'admin.activity_types';
                return view($template, compact('row', 'routeKey', 'premission'));
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('sort', function ($row) {
                return $row->sort ? $row->sort : '';
            });
            $table->editColumn('updated_at', function ($row) {
                return $row->updated_at ? Carbon::parse($row->updated_at)->format('Y/m/d H:i') : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('pages.activity_types.index', compact('premission'));
    }

    public function create()
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }
        return view('pages.activity_types.create');
    }

    public function store(Request $request)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }
        $request['sort'] = 'activity';
        $activity_type = EventType::create($request->all());
        return redirect()->route('admin.activity_types.index');
    }

    public function edit($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }
        $activity_type = EventType::where('sort', 'activity')->findOrFail($id);
        return view('pages.activity_types.edit', compact('activity_type'));
    }

    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $activity_type = EventType::where('sort', 'activity')->findOrFail($id);
        $activity_type->update($request->all());
        return redirect()->route('admin.activity_types.index');
    }

    public function show($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $activity_type = EventType::where('sort', 'activity')->findOrFail($id);
        return view('pages.activity_types.show', compact('activity_type'));
    }

    public function destroy($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $activity_type = EventType::where('sort', 'activity')->findOrFail($id);
        $activity_type->delete();

        return redirect()->route('admin.activity_types.index');
    }

    public function massDestroy(Request $request)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = EventType::whereIn('id', $request->input('ids'))
                ->where('sort', 'activity')
                ->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    public function restore($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }
        $activity_type = EventType::where('sort', 'activity')->onlyTrashed()->findOrFail($id);
        $activity_type->restore();

        return redirect()->route('admin.activity_types.index');
    }

    public function perma_del($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }
        $activity_type = EventType::where('sort', 'activity')->onlyTrashed()->findOrFail($id);
        $activity_type->forceDelete();

        return redirect()->route('admin.activity_types.index');
    }

}
