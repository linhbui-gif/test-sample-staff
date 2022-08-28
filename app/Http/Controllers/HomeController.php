<?php

namespace App\Http\Controllers;

use App\Models\TestSample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $data['tblStaff'] = DB::table('tblmstaff')->select(['StaffID','Name','Email','Entry_Date'])->get();
        return view('index')->with($data);
    }
}
