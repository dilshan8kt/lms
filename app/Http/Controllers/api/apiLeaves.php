<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Leave;

class apiLeaves extends Controller
{
    public function getAll(){
        $leaves = Leave::all();
        return response()->json($leaves, 200);
    }
}
