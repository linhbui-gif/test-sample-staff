<?php

namespace App\Http\Controllers;

use App\Models\TestSample;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $current = Carbon::now();
        $data['from_date'] = $request->from_date??'';
        $data['to_date'] = $request->to_date??'';
        $data['email'] = $request->email??'';
        $sql = DB::table('tblmstaff')->select(['StaffID','Name','Email','Entry_Date']);
        if (!empty($request->from_date))
        $sql = $sql->whereRaw("DATEDIFF('" . Carbon::now() . "',Entry_Date)  > ".$request->from_date);
        if (!empty($request->to_date))
        $sql = $sql->whereRaw("DATEDIFF('" . Carbon::now() . "',Entry_Date)  < ".$request->to_date);

        $data['tblStaff'] = $sql->get();
        
        return view('index')->with($data);
    }
}
