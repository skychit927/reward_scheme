<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        if ($user->role != 'admin') {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = User::query();
            $query->with('classroom');
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'users.id',
                'users.name',
                'users.classroom_id',
                'users.classNo',
                'users.role',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $routeKey = 'admin.users';
                $premission = 'all';
                return view($template, compact('row', 'routeKey', 'premission'));
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
            $table->editColumn('role', function ($row) {
                $role_label = '';
                if($row->role === 'admin'){
                    $role_label = 'Admin';
                } else if($row->role === 'teacher'){
                    $role_label = 'Teacher';
                } else if($row->role === 'student'){
                    $role_label = 'Student';
                }
                return $row->role ? $role_label : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('pages.users.index');
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $roles = [
            'admin' => 'Admin',
            'teacher' => 'Teacher',
            'student' => 'Student'
        ];
        $classrooms = \App\Classroom::select('classrooms.name', 'classrooms.id')
            ->join('years AS y', 'classrooms.year_id', '=', 'y.id')
            ->where('y.choose', 1)
            ->get()
            ->pluck('name', 'id')
            ->prepend('Not Applicable', '');

        return view('pages.users.create', compact('roles', 'classrooms'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $user = User::create($request->all());
        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $roles = [
            'admin' => 'Admin',
            'teacher' => 'Teacher',
            'student' => 'Student'
        ];
        $classrooms = \App\Classroom::select('classrooms.name', 'classrooms.id')
            ->join('years AS y', 'classrooms.year_id', '=', 'y.id')
            ->where('y.choose', 1)
            ->get()
            ->pluck('name', 'id')
            ->prepend('Not Applicable', '');

        return view('pages.users.edit', compact('user', 'roles', 'classrooms'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        // dd($request->all());
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $user = User::with('classroom')->findOrFail($id);
        return view('pages.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (\Auth::user()->role != 'admin') {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
