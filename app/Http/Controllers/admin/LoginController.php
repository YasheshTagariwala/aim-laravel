<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class LoginController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
        
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
        $password = md5($request->password);
        //print_r($password); exit();

        $userid = DB::table('users')->where('user_pass',$password)->where('user_email',$request->email)->get();
        //print_r($request->all()); exit();
        if(count($userid) > 0){
            Session::put('admin_login','1');
            Session::put('admin_by',$request->user_login);
            Session::put('admin_name',$request->display_name);
            Session::put('admin_nicename',$request->user_nicename);
            Session::put('admin_userid',$userid[0]->ID);

        DB::table('userlogs')->insert(
        ['userid' => '0', 'status' => 'LOGIN']
        ); 


            return redirect('/admin');
        }
        else{

            Session::put('admin_login','0');
            return redirect('/admin/login')->with('message', 'Invalid Login Credentials');
        }


    }
    
    public function logout()
    {

            Session::put('admin_login','0');
            Session::put('admin_by','');
            Session::put('admin_name','');
            Session::put('admin_nicename','');
            Session::put('admin_userid','');

        DB::table('userlogs')->insert(
        ['userid' => '0', 'status' => 'LOGOUT']
        ); 


            return redirect('/admin/login');


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
