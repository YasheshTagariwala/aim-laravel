<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('campaign.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $userid = Session::get('userid');
        $id = DB::table('campaigns')->insertGetId(
        ['title' => $request->title,'goal' => $request->goal,'about' => $request->content,'terms' => $request->terms,'startdate' => $request->startdate,'todate' => $request->todate,'created_by' => $userid,'updated_by' => $userid]);
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
        $campaign = DB::table('campaigns')->where('id',$id)->get();
        return view('campaign.edit',compact('campaign'));
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
         $userid = Session::get('userid');
        DB::table('campaigns')->where('id',$id)->update(
        ['title' => $request->title,'goal' => $request->goal,'about' => $request->content,'terms' => $request->terms,'startdate' => $request->startdate,'todate' => $request->todate,'updated_by' => $userid]);
        return redirect('/');
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
