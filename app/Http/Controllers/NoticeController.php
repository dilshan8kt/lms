<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NoticeController extends Controller
{
    public function view(){
        $notice = Notice::all();
        return view('home.notice')
            ->with('notice', $notice);
    }

    public function addNotice(Request $request){
        $notice = new Notice();

        $notice->subject = $request->input('subject');
        $notice->description = $request->input('description');
        $notice->save();
        return redirect()->back()->with('add-notice','Success!!');
    }

    public function notiEdit($id){
        $notice = Notice::findOrFail($id);
        return view('home.edit-notice')->with('notice',$notice);
    }

    public function editNotice(Request $request){
        $notice = Notice::findOrFail($request->input('id'));
        $notice->subject = $request->input('subject');
        $notice->description = $request->input('description');
        $notice->update();
        return redirect('notice')->with('notice-update','Notice Details Updated');
    }

    public function notiDelete($id){
        $notice = Notice::findOrFail($id);
        $notice->delete();
        return redirect()->back()->with('notice-delete','Delete Successfully');
    }
}
