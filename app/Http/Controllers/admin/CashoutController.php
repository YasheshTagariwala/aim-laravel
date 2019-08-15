<?php

namespace App\Http\Controllers\admin;

use App\Models\CashOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CashoutController extends Controller
{
    
    public function index()
    {   
        $cashout_requests = CashOut::paginate(10);
        return view('admin.cashout.index',compact('cashout_requests'));
    }

    public function updateStatus($id,$type) {
        $cashout = CashOut::where('id',$id)->first();
        $cashout->status = $type;
        $cashout->save();

        return redirect()->back();
    }
}
