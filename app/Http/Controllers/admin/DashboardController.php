<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class DashboardController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('admin_login') == 1 ){
        $mydetails = DB::table('userdetails')->where('delete_status','0')->get();
        $temp_users = DB::table('temp_users')->where('delete_status','0')->where('approve_status','0')->get();
        $userlogs = DB::table('userlogs')->paginate(10);
        return view('admin.welcome',compact('mydetails','temp_users','userlogs'));
        }
        else{
            return redirect('/admin/login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all()); exit();
         $userid = Session::get('userid');

         DB::table('supporters')->insert(['expertise' => $request->expertise,'category' => $request->category,'country_interest' => $request->country,'area_interest' => $request->area_interest,'women_stage' => $request->women_stage,'expectation' => $request->expect,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
