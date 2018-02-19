<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
use Carbon\Carbon;

class HolidayController extends Controller
{
    public function view(){
        $holiday = Holiday::all();
        return view('home.holiday')
            ->with('holiday', $holiday);
    }

    public function addHoliday(Request $request){
        $holiday = new Holiday();

        $date = Carbon::parse($request->input('date'));

        $holiday->date = $date;
        $holiday->reason = $request->input('reason');
        $holiday->description = $request->input('description');
        $holiday->save();
        return redirect()->back()->with('add-holiday','Success!!');
    }

    public function holiEdit($id){
        $holiday = Holiday::findOrFail($id);
        return view('home.edit-holiday')->with('holiday',$holiday);
    }

    public function editHoliday(Request $request){
        // return $request;
        $holiday = Holiday::findOrFail($request->input('id'));
        $date = Carbon::parse($request->input('date'));
        $holiday->date = $date;
        $holiday->reason = $request->input('reason');
        $holiday->description = $request->input('description');
        $holiday->update();
        return redirect('holiday')->with('holiday-update','Holiday Details Updated');
    }

    public function holidayDelete($id){
        $holiday = Holiday::findOrFail($id);
        $holiday->delete();
        return redirect()->back()->with('holiday-delete','Delete Successfully');
    }

    public function view_emp(){
        $holiday = Holiday::all();
        return view('home.employee-view-holiday')
            ->with('holiday', $holiday);
    }
}
