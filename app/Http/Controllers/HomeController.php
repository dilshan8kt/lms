<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index_admin(){
        $user = User::find(Auth::user()->id);
        $leave = DB::table('leaves')->where('status', 0)->count();
        $ucount = DB::table('users')->count();
        $acount = DB::table('user_role')->where('role_id', 1)->count();
        $notice = DB::table('notices')->latest()->get();
        $holiday = DB::table('holidays')->where('date', '>=', Carbon::now()->subDay())->orderBy('date', 'asc')->get();
        // dd($holiday);
        return view('home.admin-dashboard')
            ->with('user',$user)
            ->with('leave', $leave)
            ->with('ucount', $ucount)
            ->with('acount', $acount)
            ->with('notice', $notice)
            ->with('holiday', $holiday);
    }

    public function index_employee(){
        $user = User::find(Auth::user()->id);
        
        $leavebalance = DB::table('leave_categories')->get();

        $lbemployee = DB::table('leaves')
            ->select(DB::raw('SUM(days) as total,leave_type'))
            ->whereBetween('leave_start', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->where([
                ['status', '=', 1],
                ['emp_id', '=', Auth::user()->id]
            ])
            // ->count()
            // ->where([
            //     ['status', '=', 1],
            //     ['leave_type', '=', 'casual'],
            //     ['emp_id', '=', Auth::user()->id]
            // ]);
            ->groupBy('leave_type')
            ->get();
        // return $lbemployee;
        // dd($lbemployee);

        $notice = DB::table('notices')->latest()->get();
        return view('home.employee-dashboard')
            ->with('user',$user)
            ->with('notice', $notice)
            ->with('leavebalance',$leavebalance)
            ->with('lbemployee', $lbemployee)
            ;
    }
}
