<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = DB::table('messages')->where('msg_to',Session::get('userid'))->orWhere('created_by',Session::get('userid'))->get();
        return view("home.messages",compact("messages"));
    }

    public function enquiry()
    {
        $messages = DB::table('messages')->where('created_by',Session::get('userid'))->get();
        return view("home.enquiry",compact("messages"));
    }

    public function notifications()
    {
        $messages = DB::table('messages')->where('msg_to',Session::get('userid'))->get();
        return view("home.notifications",compact("messages"));
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
         $userid = Session::get('userid');
         $msg_to = 0;
        $id = DB::table('messages')->insertGetId(
        ['subject' => $request->subject,'message' => $request->message,'msg_to' => $msg_to,'created_by' => $userid,'updated_by' => $userid]);
        return redirect('/notifications');
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
