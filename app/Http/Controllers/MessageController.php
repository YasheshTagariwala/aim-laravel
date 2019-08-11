<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\UserDetails;
use Carbon\Carbon;
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
        $messages = Messages::where(function ($q){
            $q->where('msg_to',Session::get('userid'))->orWhere('created_by',Session::get('userid'));
        })->get()->groupBy('thread');
        $threads = [];
        foreach ($messages as $thr => $msg){
            $threads[$thr] = (object)[
                'thread' => $thr,
                'withUser' => $msg[0]->msg_to == Session::get('userid') ? $msg[0]->fromUser : $msg[0]->toUser,
                'msgList' => $msg
            ];
        }
        $extraUser = UserDetails::whereNotIn('id',Messages::where('created_by',Session::get('userid'))->pluck('msg_to'))
            ->whereNotIn('id',Messages::where('msg_to',Session::get('userid'))->pluck('created_by'))
            ->where('id','!=',Session::get('userid'))->where('delete_status',0)->get();
        return view("home.messages",compact("messages",'threads','extraUser'));
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
            ['subject' => $request->subject,'message' => $request->message,'msg_to' => $request->msg_to,'created_by' => $userid,'updated_by' => $userid]);
        return redirect('/notifications');
    }

    public function sendMessage(Request $request)
    {
        $userid = Session::get('userid');
        $msg_to = 0;
        $id = DB::table('messages')->insertGetId(
            ['subject' => $request->subject,'message' => $request->message,'msg_to' => $request->msg_to,'thread' => $request->thread,'created_by' => $userid,'updated_by' => $userid ,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        return response()->json(['status' => true],200);
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
