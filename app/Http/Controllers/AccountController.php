<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $userid = Session::get('userid');
         $userdetails = DB::table('userdetails')->where('id',$userid)->get();
        return view("home.account",compact("userdetails"));
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
         $userdetails = DB::table('userdetails')->where('id',$userid)->get();
         $password = $userdetails[0]->password;
        if($request->savefor == '1'){

            DB::table('userdetails')->where('id',$userid)->update(
            ['username' => $request->username,'email' => $request->email,'firstname' => $request->firstname,'lastname' => $request->lastname,'updated_by' => $userid]);

        return redirect('/account');
        }
        else if($request->savefor == '2'){
         //print_r(md5($request->cur_password)); exit();
            if($password == md5($request->cur_password)){
            DB::table('userdetails')->where('id',$userid)->update(
            ['password' => md5($request->password),'updated_by' => $userid]);
            }

        return redirect('/account');
        }
        else if($request->savefor == '3'){
            DB::table('userdetails')->where('id',$userid)->update(
            ['is_hide' => $request->hide_pfl,'updated_by' => $userid]);

        return redirect('/account');
        }
        else if($request->savefor == '4'){
            if($password == md5($request->password)){
            DB::table('userdetails')->where('id',$userid)->update(
            ['delete_status' =>'1','updated_by' => $userid]);
            }

        return redirect('/logout');
        }
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
