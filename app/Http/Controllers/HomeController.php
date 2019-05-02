<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list_temp = DB::select(
            DB::raw(
                "SELECT u.id, u.NAME AS 'name', c.NAME AS 'classroom', COALESCE(SUM(e.sticker_amount), 0) AS 'sticker'
                FROM users u
                LEFT JOIN classrooms c ON c.id = u.classroom_id
                LEFT JOIN transitions t ON t.student_id = u.id
                LEFT JOIN transition_event te ON te.transition_id = t.id
                LEFT JOIN `events` e ON e.id = te.event_id
                LEFT JOIN event_types et ON et.id = e.event_type_id
                WHERE u.role = 'student' AND (et.sort = 'activity' OR et.sort IS NULL )
                GROUP BY u.id
                ORDER BY sticker desc"
            )
        );

        $user = \Auth::user();
        $userInfo = null;
        $sicker = 0;
        if ($user->role == 'student') {
            $sicker = $user->stickerplus;
            foreach ($user_list_temp as $key => $array_user) {
                if($user->id == $array_user->id){
                    $userInfo = $array_user;
                    $userInfo->rank = $key + 1;
                    break;
                }
            }
        }

        $user_list = array_slice($user_list_temp, 0, 10);
        $nowUser = $user;

        $prize_list = DB::select(
            DB::raw(
                "SELECT e.NAME AS 'name', e.sticker_amount AS 'sticker', COALESCE(SUM(te.qty), 0) AS 'redeem_time'
                FROM `transition_event` te
                LEFT JOIN `events` e ON te.event_id = e.id
                LEFT JOIN transitions t ON t.id = te.transition_id
                LEFT JOIN event_types et ON et.id = e.event_type_id
                WHERE et.sort = 'prize'
                GROUP BY e.id
                ORDER BY redeem_time desc
                LIMIT 10"
            )
        );

        return view('home', compact('nowUser', 'sicker', 'user_list', 'prize_list', 'userInfo'));
    }
}
