<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrganizationController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       $gid = 2;
       $mydetails = DB::table('userdetails')->where('groupid',$gid)->where('delete_status','0')->paginate(10);
       return view('admin.organization.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $checks = DB::table('userdetails')->get();

        foreach ($checks as $check) 
        {
            if($check->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($check->username == $request->username)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }
        
        $gid = 2;
        $password = md5($request->password);
        DB::table('userdetails')->insert([
    ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'username' => $request->username, 'password' => $password, 'email' => $request->email, 'phone' => $request->phone, 'groupid' => $gid ]
        ]);
        return redirect('/admin/organization');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gid = 2;
        $mydetail = DB::table('userdetails')->where('id',$id)->where('groupid',$gid)->where('delete_status','0')->get();
        return view('admin.organization.show',compact('mydetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mydetails = DB::table('userdetails')->where('id',$id)->get();
        return view('admin.organization.edit',compact('mydetails'));
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
        $checks = DB::table('userdetails')->where('id','!=',$request->id)->get();

        foreach ($checks as $check) 
        {
            if($check->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($check->username == $request->username)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }
        $gid = 2;
        DB::table('userdetails')->where('id',$request->id)->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'username' => $request->username, 'email' => $request->email, 'phone' => $request->phone ]);
        return redirect('/admin/organization');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $gid = 2;
       DB::table('userdetails')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/organization');
    }

    public function hide($id)
    {
       $gid = 2;
       DB::table('userdetails')->where('id',$id)->
       update([ 'is_hide' => '1' ]);
        return redirect('/admin/organization');
    }
    public function unhide($id)
    {
       $gid = 2;
       DB::table('userdetails')->where('id',$id)->
       update([ 'is_hide' => '0' ]);
        return redirect('/admin/organization');
    }

}
