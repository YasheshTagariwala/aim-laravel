<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class EntrepreneurcompanyController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('ent_company')->where('delete_status','0')->paginate(10);
        return view('admin.entrepreneur_company.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $categories = DB::table('categories')->where('groupid','1')->get();
      return view('admin.entrepreneur_company.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $file = Input::file('file');
        if($file)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('file')->move($destinationPath, $recfilename);
              $certificatePath_file = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        $project_img = Input::file('project_img');
        if($project_img)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $project_img->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('project_img')->move($destinationPath, $recfilename);
              $certificatePath_img = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }


        DB::table('ent_company')->insert([
        ['overview' => $request->overview, 'category' => $request->category, 'p_yr_revenue' => $request->p_yr_revenue, 'c_yr_revenue' => $request->c_yr_revenue, 'n_yr_revenue' => $request->n_yr_revenue, 'founded_date' => $request->founded_date, 'no_employees' => $request->no_employees, 'filepath' => $certificatePath_file, 'filetitle' => $request->filetitle, 'fileurl' => $request->fileurl, 'project_img' => $certificatePath_img  ]
        ]);
        return redirect('/admin/entrepreneur_company');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('ent_company')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.entrepreneur_company.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('ent_company')->where('id',$id)->get();
        return view('admin.entrepreneur_company.edit',compact('mydetails'));
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
        
        $file = Input::file('file');
        if($file)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('file')->move($destinationPath, $recfilename);
              $certificatePath_file = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        $project_img = Input::file('project_img');
        if($project_img)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $project_img->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('project_img')->move($destinationPath, $recfilename);
              $certificatePath_img = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }


        DB::table('ent_company')->where('id',$request->id)->update([
    'overview' => $request->overview, 'category' => $request->category, 'p_yr_revenue' => $request->p_yr_revenue, 'c_yr_revenue' => $request->c_yr_revenue, 'n_yr_revenue' => $request->n_yr_revenue, 'founded_date' => $request->founded_date, 'no_employees' => $request->no_employees, 'filepath' => $certificatePath_file, 'filetitle' => $request->filetitle, 'fileurl' => $request->fileurl, 'project_img' => $certificatePath_img
        ]);
        return redirect('/admin/entrepreneur_company');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('ent_company')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/entrepreneur_company');
    }
}
