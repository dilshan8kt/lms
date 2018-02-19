<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\LeaveCategory;
use App\Leave;
use Carbon\Carbon;
use App\User;

class LeaveController extends Controller
{
    public function viewCategory(){
        $lcategory = LeaveCategory::all();
        return view('home.leave-category')->with('lcategory',$lcategory);
    }

    public function addLcategory(Request $request){
        $lcategory = new LeaveCategory();
        $lcategory->name = $request->input('lcategory');
        $lcategory->days = $request->input('nodm');
        $lcategory->save();
        return redirect()->back()->with('add-leave-cat','Leave Category Successfully Inserted!!');
    }

    public function view(){
        $lcategory = LeaveCategory::all();
        return view('home.apply-leave')->with('lcategory',$lcategory);
    }

    public function viewLeave(){
        $leave = DB::table('leaves')->where('emp_id', Auth::user()->id)->get();
        // dd($leave);
        return view('home.my-leave')
            ->with('leave', $leave);
    }

    public function applyleave(Request $request){
        $split = explode(" - ", $request->daterange);

        $leavestart = Carbon::parse($split[0]);
        $leaveend = Carbon::parse($split[1]);

        $validdate = Carbon::now()->addMonths(3);
        $nowdate = Carbon::now()->subMonths(1);
        // dd($validdate);
        if($leavestart > $validdate || $leaveend > $validdate)
            //  dd('error');
             return redirect()->back()->with('error1','You only can apply leave 3 months forword');
        
        if($leavestart < $nowdate || $leaveend < $nowdate)
            return redirect()->back()->with('error2','You only can apply leave 1 month before');

        // dd('success');
        
        $days = $leaveend->diffInDays($leavestart) + 1;

        $leave = new Leave();
        $leave->emp_id = Auth::user()->id;
        $leave->emp_name = Auth::user()->first_name;
        $leave->leave_start = $leavestart;
        $leave->leave_end = $leaveend;
        $leave->days = $days;
        $leave->leave_type = $request->input('ltype');
        $leave->reason = $request->input('reason');

        $leave->save();
        return redirect()->back()->with('apply-leave','Leave Apply Successfully!!');
    }

    public function leave(){
        $leave = DB::table('leaves')->where('status', 0)->get();
        return view('home.leave')->with('leave', $leave);
        // dd($leave);
    }

    public function rejected($id){
        $leave = Leave::findOrFail($id);
        $leave->status = 2;
        $leave->approved_by = Auth::user()->first_name;
        $leave->update();
        return redirect('leave')->with('rejected','Leave Rejected!!');
    }

    public function accepted($id){
        $leave = Leave::findOrFail($id);
        $leave->status = 1;
        $leave->approved_by = Auth::user()->first_name;
        $leave->update();
        return redirect('leave')->with('accepted','Leave Accepted!!');
    }

    public function catEdit($id){
        $lcategory = LeaveCategory::findOrFail($id);
        return view('home.edit-lcategory')->with('lcategory',$lcategory);
    }

    public function editCat(Request $request){
        $lcategory = LeaveCategory::findOrFail($request->input('id'));
        $lcategory->name = $request->input('lcategory');
        $lcategory->days = $request->input('nodm');
        $lcategory->update();
        return redirect('leave-category')->with('cat-update','Leave Category Updated');
    }

    public function catDelete($id){
        $lcategory = LeaveCategory::findOrFail($id);
        $lcategory->delete();
        return redirect()->back()->with('delete-cat','Delete Successfully');
    }

    public function leaveEmp($id,$emp){
        // dd($id,$emp);
        $user = DB::table('users')
            ->where('id' , $emp)
            ->get()
            ->first();
        // dd($user);

        $leave = DB::table('leaves')
            ->select('reason','id','leave_type')
            ->where('id', $id)
            ->get()
            ->first();

        $leavebalance = DB::table('leave_categories')->get();

        $lbemployee = DB::table('leaves')
            ->select(DB::raw('SUM(days) as total,leave_type'))
            ->whereBetween('leave_start', [Carbon::now(), Carbon::now()->endOfMonth()])
            ->where([
                ['status', '=', 1],
                ['emp_id', '=', $emp]
            ])
            ->groupBy('leave_type')
            ->get();
       
            
        // dd($leave);
        return view('home.view-emp-leave')
            ->with('user',$user)
            ->with('leavebalance',$leavebalance)
            ->with('lbemployee', $lbemployee)
            ->with('leave', $leave);
    }


    public function rejectedpost(Request $request){
        $leave = Leave::findOrFail($request->input('id'));
        $leave->status = 2;
        $leave->approved_by = Auth::user()->first_name;
        $leave->update();
        return redirect('leave')->with('rejected','Leave Rejected!!');
    }

    public function acceptedpost(Request $request){
        $leave = Leave::findOrFail($request->input('id'));
        $leave->status = 1;
        $leave->approved_by = Auth::user()->first_name;
        $leave->update();
        return redirect('leave')->with('accepted','Leave Accepted!!');
    }

    public function empLeaveDetails($id){

        $user = DB::table('users')
            ->where('id' , $id)
            ->get()
            ->first();

        $leave = DB::table('leaves')
            ->select('leave_start','leave_end','days','leave_type','reason','approved_by')
            ->where([
                ['emp_id', $id],
                ['status', 1]
            ])
            ->get();
        // dd($leave);

        $leavebalance = DB::table('leave_categories')->get();
        // dd($leavebalance);

        $lbemployee = DB::table('leaves')
            ->select(DB::raw('SUM(days) as total,leave_type'))
            ->whereBetween('leave_start', [Carbon::now(), Carbon::now()->endOfMonth()])
            ->where([
                ['status', '=', 1],
                ['emp_id', '=', $id]
            ])
            ->groupBy('leave_type')
            ->get();
        // dd($lbemployee);

        return view('home.emp-leave-details')
            ->with('user',$user)
            ->with('leavebalance',$leavebalance)
            ->with('lbemployee', $lbemployee)
            ->with('leave', $leave);
    }
}
