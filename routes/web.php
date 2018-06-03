<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::redirect('','login',301);

Route::get('login', [
    'uses' => 'AccountController@login',
    'as' => 'login'
]);

Route::get('signout',[
    'uses' => 'AccountController@signout',
    'as' => 'signout'
]);

Route::post('signin', [
    'uses' => 'AccountController@signin',
    'as' => 'signin'
]);

Route::get('index-admin', [
    'uses' => 'HomeController@index_admin',
    'as' => 'index-admin',
    'middleware' => 'roles',
    'roles' => ['Admin']
])->middleware('auth');

Route::get('index-employee', [
    'uses' => 'HomeController@index_employee',
    'as' => 'index-employee',
    'middleware' => 'roles',
    'roles' => ['Employee']
])->middleware('auth');

Route::get('add-user', [
    'uses' => 'UserController@adduser',
    'as' => 'adduser',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('edit-user', [
    'uses' => 'UserController@edituser',
    'as' => 'edituser',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('view-user', [
    'uses' => 'UserController@viewusers',
    'as' => 'viewusers',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('add-user',[
    'uses' => 'UserController@addnewuser',
    'as' => 'add-user',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get("user-delete/{id}",[
    'uses' => 'UserController@deleteUser',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get("user-edit/{id}",[
    'uses' => 'UserController@edituser',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('edit-user',[
    'uses' => 'UserController@updateUser',
    'as' => 'edit-user',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('leave-category',[
    'uses' => 'LeaveController@viewCategory',
    'as' => 'leave-category',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('add-lcategory',[
    'uses' => 'LeaveController@addLcategory',
    'as' => 'add-lcategory',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('apply-leave',[
    'uses' => 'LeaveController@view',
    'as' => 'apply-leave',
    'middleware' => 'roles',
    'roles' => ['Employee']
]);

Route::get('my-leave',[
    'uses' => 'LeaveController@viewLeave',
    'as' => 'my-leave',
    'middleware' => 'roles',
    'roles' => ['Employee']
]);

Route::post('apply-leave',[
    'uses' => 'LeaveController@applyleave',
    'as' => 'apply-leave',
    'middleware' => 'roles',
    'roles' => ['Employee']
]);

Route::get('leave',[
    'uses' => 'LeaveController@leave',
    'as' => 'leave',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('leave-reject/{id}',[
    'uses' => 'LeaveController@rejected',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('leave-accept/{id}',[
    'uses' => 'LeaveController@accepted',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('leave-reject',[
    'uses' => 'LeaveController@rejectedpost',
    'as' => 'leave-reject',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('leave-accept',[
    'uses' => 'LeaveController@acceptedpost',
    'as' => 'leave-accept',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('holiday',[
    'uses' => 'HolidayController@view',
    'as' => 'holiday',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('notice',[
    'uses' => 'NoticeController@view',
    'as' => 'notice',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('add-holiday',[
    'uses' => 'HolidayController@addHoliday',
    'as' => 'add-holiday',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('add-notice',[
    'uses' => 'NoticeController@addNotice',
    'as' => 'add-notice',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::get('cat-edit/{id}',[
    'uses' => 'LeaveController@catEdit',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::get('holi-edit/{id}',[
    'uses' => 'HolidayController@holiEdit',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);



Route::post('edit-cat',[
    'uses' => 'LeaveController@editCat',
    'as' => 'edit-cat',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('cat-delete/{id}',[
    'uses' => 'LeaveController@catDelete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('edit-holiday',[
    'uses' => 'HolidayController@editHoliday',
    'as' => 'edit-holiday',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('holi-delete/{id}',[
    'uses' => 'HolidayController@holidayDelete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('noti-edit/{id}',[
    'uses' => 'NoticeController@notiEdit',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::post('edit-notice',[
    'uses' => 'NoticeController@editNotice',
    'as' => 'edit-notice',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('noti-delete/{id}',[
    'uses' => 'NoticeController@notiDelete',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('calender',[
    'uses' => 'CalenderController@view',
    'as' => 'calender',
    'middleware' => 'roles',
    'roles' => ['Employee']
]);

Route::get('emp-holiday',[
    'uses' => 'HolidayController@view_emp',
    'as' => 'emp-holiday',
    'middleware' => 'roles',
    'roles' => ['Employee']
]);

Route::get('leave-view/{id}/{emp}',[
    'uses' => 'LeaveController@leaveEmp',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);

Route::get('view-leave-details/{id}',[
    'uses' => 'LeaveController@empLeaveDetails',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);


Route::get('userimage/{filename}',[
    'uses' => 'UserController@getUserImage',
    'as' => 'image',
    'middleware' => 'roles',
    'roles' => ['Admin','Employee']
]);