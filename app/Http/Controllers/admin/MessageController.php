<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('messages')->where('delete_status','0')->paginate(10);
        return view('admin.messages.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('userdetails')->where('delete_status','0')->get();
        return view('admin.messages.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::table('messages')->insert([
        ['subject' => $request->subject, 'message' => $request->message, 'msg_to' => $request->msg_to, 'created_by' => '0', 'updated_by' => '0' ]
        ]);
        return redirect('/admin/messages');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('messages')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.messages.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('messages')->where('id',$id)->get();
        $users = DB::table('userdetails')->where('delete_status','0')->get();
        return view('admin.messages.edit',compact('mydetails','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
      

      DB::table('messages')->insert([
    'subject' => $request->subject, 'message' => $request->message, 'msg_to' => $request->msg_to, 'created_by' => '0', 'updated_by' => '0'
        ]);
        return redirect('/admin/messages');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('messages')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/messages');
    }
}
