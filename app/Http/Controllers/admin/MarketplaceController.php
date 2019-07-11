<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class MarketplaceController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('marketplace_settings')->where('delete_status','0')->paginate(10);
        return view('admin.marketplace_settings.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.marketplace_settings.create');
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

        $org_banner = Input::file('org_banner');
        if($org_banner)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_banner->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_banner')->move($destinationPath, $recfilename);
              $certificatePath_banner = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }


        DB::table('marketplace_settings')->insert([
        ['storename' => $request->storename, 'org_id' => $request->org_id, 'store_slug' => $request->store_slug, 'description' => $request->description, 'buyer_msg' => $request->buyer_msg, 'phone' => $request->phone, 'email' => $request->email, 'addressline1' => $request->addressline1, 'addressline2' => $request->addressline2,
         'country' => $request->country, 'state' => $request->state, 'city' => $request->city,  'zipcode' => $request->zipcode, 'logopath' => $certificatePath_logo, 'bannerpath' => $certificatePath_banner,
         'fb_link' => $request->fb_link, 'gp_link' => $request->gp_link, 'tw_link' => $request->tw_link, 'linked_link' => $request->linked_link, 'yt_link' => $request->yt_link, 'insta_link' => $request->insta_link ]
        ]);
        return redirect('/admin/marketplace_settings');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('marketplace_settings')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.marketplace_settings.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('marketplace_settings')->where('id',$id)->get();
        return view('admin.marketplace_settings.edit',compact('mydetails'));
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

        $org_banner = Input::file('org_banner');
        if($org_banner)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_banner->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_banner')->move($destinationPath, $recfilename);
              $certificatePath_banner = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        DB::table('marketplace_settings')->where('id',$request->id)->update([
    'storename' => $request->storename, 'org_id' => $request->org_id, 'store_slug' => $request->store_slug, 'description' => $request->description, 'buyer_msg' => $request->buyer_msg, 'phone' => $request->phone, 'email' => $request->email, 'addressline1' => $request->addressline1, 'addressline2' => $request->addressline2,
         'country' => $request->country, 'state' => $request->state, 'city' => $request->city,  'zipcode' => $request->zipcode, 'logopath' => $certificatePath_logo, 'bannerpath' => $certificatePath_banner,
         'fb_link' => $request->fb_link, 'gp_link' => $request->gp_link, 'tw_link' => $request->tw_link, 'linked_link' => $request->linked_link, 'yt_link' => $request->yt_link, 'insta_link' => $request->insta_link  
        ]);
        $mydetails = DB::table('marketplace_settings')->get();
        return view('admin.marketplace_settings.index',compact('mydetails'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('marketplace_settings')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
       $mydetails = DB::table('marketplace_settings')->where('delete_status','0')->get();
       return view('admin.marketplace_settings.index',compact('mydetails'));
    }
}
