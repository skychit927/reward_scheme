<?php

namespace App\Http\Controllers;

use App\EventType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Requests\StoreUsersRequest;
// use App\Http\Requests\UpdateUsersRequest;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class PrizeTypesController extends Controller
{
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
            $query = EventType::query();
            $query->where('sort', 'prize');
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
                $routeKey = 'admin.prize_types';
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

        return view('pages.prize_types.index', compact('premission'));
    }

    public function create()
    {
        $user = \Auth::user();
        if ($user->role != 'admin') {
            return abort(401);
        }
        return view('pages.prize_types.create');
    }

    public function store(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $request['sort'] = 'prize';
        $prize_type = EventType::create($request->all());
        return redirect()->route('admin.prize_types.index');
    }

    public function edit($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $prize_type = EventType::where('sort', 'prize')->findOrFail($id);
        return view('pages.prize_types.edit', compact('prize_type'));
    }

    public function update(Request $request, $id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $prize_type = EventType::where('sort', 'prize')->findOrFail($id);
        $prize_type->update($request->all());
        return redirect()->route('admin.prize_types.index');
    }

    public function show($id)
    {
        $user = \Auth::user();
        if ($user->role != 'admin' && $user->role != 'teacher') {
            return abort(401);
        }

        $prize_type = EventType::where('sort', 'prize')->findOrFail($id);
        return view('pages.prize_types.show', compact('prize_type'));
    }

    public function destroy($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $prize_type = EventType::where('sort', 'prize')->findOrFail($id);
        $prize_type->delete();

        return redirect()->route('admin.prize_types.index');
    }

    public function massDestroy(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = EventType::whereIn('id', $request->input('ids'))
                ->where('sort', 'prize')
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
        $prize_type = EventType::where('sort', 'prize')->onlyTrashed()->findOrFail($id);
        $prize_type->restore();

        return redirect()->route('admin.prize_types.index');
    }

    public function perma_del($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $prize_type = EventType::where('sort', 'prize')->onlyTrashed()->findOrFail($id);
        $prize_type->forceDelete();

        return redirect()->route('admin.prize_types.index');
    }

}
