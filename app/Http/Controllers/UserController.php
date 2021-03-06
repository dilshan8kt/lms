<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\User;
use App\Role;

//report
use PdfReport;

class UserController extends Controller
{
    public function adduser(){
        return view('home.add-user');
    }

    public function edituser($id){
        $user = User::findOrFail($id);
        return view('home.edit-user')->with('user',$user);
    }

    public function viewusers(){
        $users = User::all();
        return view("home.view-users")->with('users',$users);
    }

    public function addnewuser(Request $request){

        $role_admin = Role::where('name', 'Admin')->first();
        $role_employee = Role::where('name', 'Employee')->first();

        $user = new User();
        $user->emp_code = $request->input('empno');
        $user->first_name = $request->input('fname');
        $user->middle_name = $request->input('mname');
        $user->last_name = $request->input('lname');
        $user->telephone_no = $request->input('phone');
        $user->email = $request->input('email');
        $user->username = $request->input('uname');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        if($request->input('role')==='Admin'){
            $user->roles()->attach($role_admin);
        }
        $user->roles()->attach($role_employee);

        //store user image to laravel storage
        $file = $request->file('image');        
        $filename = $request['empno'] . '-' . $request['fname'] . '.jpg';

        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }

        return redirect('view-user')->with('new-user','User Registerd Successfully');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        $user->roles()->detach();
        return redirect('view-user')->with('delete-user','Delete Successfully');
    }


    public function updateProfile(Request $request){
        $user = User::findOrFail($request->input('id'));
        $user->emp_code = $request->input('empno');
        $user->first_name = $request->input('fname');
        $user->middle_name = $request->input('mname');
        $user->last_name = $request->input('lname');
        $user->telephone_no = $request->input('phone');
        $user->email = $request->input('email');
        $user->username = $request->input('uname');
        $user->update();

         //store user image to laravel storage
         $file = $request->file('image');        
         $filename = $request['empno'] . '-' . $request['fname'] . '.jpg';
 
         if($file){
             Storage::disk('local')->put($filename, File::get($file));
         }
         
        return redirect()->back()->with('update-profile','User Update Successfully');
    }


    public function updateUser(Request $request){

        $user = User::findOrFail($request->input('id'));
        $user->emp_code = $request->input('empno');
        $user->first_name = $request->input('fname');
        $user->middle_name = $request->input('mname');
        $user->last_name = $request->input('lname');
        $user->telephone_no = $request->input('phone');
        $user->email = $request->input('email');
        $user->username = $request->input('uname');
        $user->update();

        $user->roles()->detach();
        if($request->input('role')==='Admin'){
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        $user->roles()->attach(Role::where('name', 'Employee')->first());


         //store user image to laravel storage
         $file = $request->file('image');        
         $filename = $request['empno'] . '-' . $request['fname'] . '.jpg';
 
         if($file){
             Storage::disk('local')->put($filename, File::get($file));
         }
         
        return redirect('view-user')->with('update-user','User Update Successfully');
    }

    public function getUserImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    public function getProfile(){
        $user = User::findOrFail(Auth::user()->id);
        if(Auth::user()->hasRole('Admin')){
            return view('home.profile')
                ->with('user',$user);
        }else{
            return view('home.profile-emp')
                ->with('user',$user);
        }
       
    }

    public function report(){
        // Report title
        $title = 'Registered User Report';

        // For displaying filters description on header
        $meta = [
            'Registered on To ',
            'Sort By'
        ];

        // Do some querying..
        $queryBuilder = User::select(['emp_code', 'first_name', 'middle_name', 'last_name'])
        ->orderBy('emp_code');


        // Set Column to be displayed
        $columns = [
            'EMP Code' => 'emp_code',
            'First Name' => 'first_name',
            'Middle Name' => 'middle_name',
            'Last Name' => 'last_name'
        ];

        return PdfReport::of($title, $meta, $queryBuilder, $columns)
            ->limit(20)
            ->stream(); // or download('filename here..') to download pdf
    }
}
