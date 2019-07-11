<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ContactController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $mydetails = DB::table('contacts')->where('delete_status','0')->paginate(10);
        return view('admin.contacts.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       DB::table('contacts')->insert([
    ['name' => $request->name, 'email' => $request->email, 'subject' => $request->subject, 'message' => $request->message]
        ]);
        return redirect('/admin/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mydetail = DB::table('contacts')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.contacts.show',compact('mydetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mydetails = DB::table('contacts')->where('id',$id)->get();
        return view('admin.contacts.edit',compact('mydetails'));
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
        DB::table('contacts')->where('id',$request->id)->update(['name' => $request->name, 'email' => $request->email, 'subject' => $request->subject, 'message' => $request->message ]);
        return redirect('/admin/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       DB::table('contacts')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/contacts');
    }
}
