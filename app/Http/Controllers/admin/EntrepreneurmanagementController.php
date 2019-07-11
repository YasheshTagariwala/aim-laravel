<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class EntrepreneurmanagementController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('ent_mgmnt_team')->where('delete_status','0')->paginate(10);
        return view('admin.entrepreneur_management.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entrepreneur_management.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
         $org_logo = Input::file('org_logo');
        if($org_logo)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_logo->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_logo')->move($destinationPath, $recfilename);
              $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }


        DB::table('ent_mgmnt_team')->insert([
        ['name' => $request->name, 'position' => $request->position, 'email' => $request->email, 'description' => $request->description, 'photograph' => $certificatePath, 'linked_url' => $request->linkedurl, 'fb_url' => $request->fburl, 'tw_url' => $request->twurl ]
        ]);
        return redirect('/admin/entrepreneur_management');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('ent_mgmnt_team')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.entrepreneur_management.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('ent_mgmnt_team')->where('id',$id)->get();
        return view('admin.entrepreneur_management.edit',compact('mydetails'));
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
        
         $org_logo = Input::file('org_logo');
        if($org_logo)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_logo->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_logo')->move($destinationPath, $recfilename);
              $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        DB::table('ent_mgmnt_team')->where('id',$request->id)->update([
    'name' => $request->name, 'position' => $request->position, 'email' => $request->email, 'description' => $request->description, 'photograph' => $certificatePath, 'linked_url' => $request->linkedurl, 'fb_url' => $request->fburl, 'tw_url' => $request->twurl 
        ]);
        return redirect('/admin/entrepreneur_management');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('ent_mgmnt_team')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/entrepreneur_management');
    }
}
