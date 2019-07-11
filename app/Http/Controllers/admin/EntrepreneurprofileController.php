<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class EntrepreneurprofileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('entrepreneurs')->where('delete_status','0')->paginate(10);
        return view('admin.entrepreneur_profile.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $women_stages = DB::table('women_stage')->get();
        return view('admin.entrepreneur_profile.create',compact('women_stages'));
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


        DB::table('entrepreneurs')->insert([
        ['name' => $request->name, 'city' => $request->city, 'state' => $request->state, 'country' => $request->country, 'zipcode' => $request->zipcode, 'gender' => $request->gender, 'women_stage' => $request->womenstage, 'logo' => $certificatePath, 'website' => $request->website, 'fb_url' => $request->fburl, 'tw_url' => $request->twurl, 'linked_url' => $request->linkedurl, 'blog_url' => $request->blogurl, 'gp_url' => $request->gpurl ]
        ]);
        return redirect('/admin/entrepreneur_profile');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('entrepreneurs')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.entrepreneur_profile.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('entrepreneurs')->where('id',$id)->get();
        return view('admin.entrepreneur_profile.edit',compact('mydetails'));
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

        DB::table('entrepreneurs')->where('id',$request->id)->update([
    'name' => $request->name, 'city' => $request->city, 'state' => $request->state, 'country' => $request->country, 'zipcode' => $request->zipcode, 'gender' => $request->gender, 'women_stage' => $request->womenstage, 'logo' => $certificatePath, 'website' => $request->website, 'fb_url' => $request->fburl, 'tw_url' => $request->twurl, 'linked_url' => $request->linkedurl, 'blog_url' => $request->blogurl, 'gp_url' => $request->gpurl 
        ]);
        return redirect('/admin/entrepreneur_profile');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('entrepreneurs')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/entrepreneur_profile');
    }

    public function maketop($id)
    {
    
       DB::table('entrepreneurs')->where('id',$id)->
       update([ 'is_top' => '1' ]);

        return redirect('/admin/entrepreneur_profile');
    }
    public function make_top($id)
    {
    
       DB::table('entrepreneurs')->where('id',$id)->
       update([ 'is_top' => '0' ]);

        return redirect('/admin/entrepreneur_profile');
    }

    public function makefeature($id)
    {
       
       DB::table('entrepreneurs')->where('id',$id)->
       update([ 'is_featured' => '1' ]);
        return redirect('/admin/entrepreneur_profile');
    }
    public function make_feature($id)
    {
       
       DB::table('entrepreneurs')->where('id',$id)->
       update([ 'is_featured' => '0' ]);

        return redirect('/admin/entrepreneur_profile');
    }
}
