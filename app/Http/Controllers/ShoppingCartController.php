<?php

namespace App\Http\Controllers;

use App\Transition;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShoppingCartController extends Controller
{
    public function getShopingCartList(){
        $user = \Auth::user();
        if ($user->role != 'admin') {
            return abort(401);
        }

        if (request()->ajax()) {
            $query = Transition::query();
            $query->with('student');
            $query->with('prize');
            $query->where('status', 'P');

            $template = 'prizeRequestTemplate';
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                return view($template, compact('row'));
            });
            $table->editColumn('student.name', function ($row) {
                return $row->student ? $row->student->name : '';
            });
            $table->editColumn('prize.name', function ($row) {
                if(count($row->prize) == 0) {
                    return '';
                }
                $tampArr = $row->prize->pluck('name');

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $tampArr->toArray() ) . '</span>';
            });

            $table->editColumn('updated_at', function ($row) {
                return $row->updated_at ? Carbon::parse($row->updated_at)->format('Y/m/d H:i') : '';
            });

            $table->rawColumns(['actions', 'prize.name']);

            return $table->make(true);
        }
        return view('pages.shopping_cart.index');
    }

    public function accept($id){
        $query = Transition::find($id)->update([
            'status' => 'S',
            'handler_id' => \Auth::user()->id
        ]);
        return redirect()->route('admin.shopping.show');
    }

    public function deline($id){
        $query = Transition::find($id)->update([
            'status' => 'F',
            'handler_id' => \Auth::user()->id
        ]);
        return redirect()->route('admin.shopping.show');
    }
}
