<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class OrganizationprofileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('organizations')->where('delete_status','0')->paginate(10);
        return view('admin.organization_profile.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = DB::table('categories')->where('groupid','1')->get();
      return view('admin.organization_profile.create',compact('categories'));
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
              $certificatePath_logo = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        $org_file = Input::file('org_file');
        if($org_file)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_file')->move($destinationPath, $recfilename);
              $certificatePath_file = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }


        DB::table('organizations')->insert([
        ['name' => $request->name, 'description' => $request->description, 'country' => $request->country,  'org_logo' => $certificatePath_logo, 'org_file' => $certificatePath_file, 'file_title' => $request->file_title, 'mission' => $request->mission, 'categories' => $request->categories ]
        ]);
        return redirect('/admin/organization_profile');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('organizations')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.organization_profile.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('organizations')->where('id',$id)->get();
        return view('admin.organization_profile.edit',compact('mydetails'));
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
              $certificatePath_logo = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        $org_file = Input::file('org_file');
        if($org_file)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_file')->move($destinationPath, $recfilename);
              $certificatePath_file = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        DB::table('organizations')->where('id',$request->id)->update([
    'name' => $request->name, 'description' => $request->description, 'country' => $request->country,  'org_logo' => $certificatePath_logo, 'org_file' => $certificatePath_file, 'file_title' => $request->file_title, 'mission' => $request->mission, 'categories' => $request->categories  
        ]);
        $mydetails = DB::table('organizations')->get();
        return view('admin.organization_profile.index',compact('mydetails'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('organizations')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
       $mydetails = DB::table('organizations')->where('delete_status','0')->get();
       return view('admin.organization_profile.index',compact('mydetails'));
    }
}
