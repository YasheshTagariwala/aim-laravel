<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // echo "hi";

        $mydetails = DB::table('mydetails')->paginate(10);
        //print_r($mydetails); exit();
        return view('new.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->username);
        DB::table('mydetails')->insert([
    ['username' => $request->username, 'email' => $request->email]
        ]);
        return redirect('/new');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mydetails = DB::table('mydetails')->where('id',$id)->get();
        print_r($mydetails); exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mydetails = DB::table('mydetails')->where('id',$id)->get();
    
        return view('new.edit',compact('mydetails'));
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
        //print_r($request->all());
        DB::table('mydetails')->where('id',$request->id)->update(['username' => $request->username, 'email' => $request->email]);
        return redirect('/new');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mydetails = DB::table('mydetails')->where('id',$id)->delete();
        return redirect('/new');
    }
}
