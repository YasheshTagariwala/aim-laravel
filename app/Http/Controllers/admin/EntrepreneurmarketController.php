<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class EntrepreneurmarketController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('ent_market')->where('delete_status','0')->paginate(10);
        return view('admin.entrepreneur_market.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entrepreneur_market.create');
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


        DB::table('ent_market')->insert([
        ['name' => $request->name, 'description' => $request->description, 'product_img' => $certificatePath, 'market' => $request->market, 'market_size' => $request->market_size, 'growth_rate' => $request->growth_rate ]
        ]);
        return redirect('/admin/entrepreneur_market');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('ent_market')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.entrepreneur_market.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('ent_market')->where('id',$id)->get();
        return view('admin.entrepreneur_market.edit',compact('mydetails'));
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

        DB::table('ent_market')->where('id',$request->id)->update([
    'name' => $request->name, 'description' => $request->description, 'product_img' => $certificatePath, 'market' => $request->market, 'market_size' => $request->market_size, 'growth_rate' => $request->growth_rate 
        ]);
        return redirect('/admin/entrepreneur_market');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('ent_market')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/entrepreneur_market');
    }
}
