<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class EntrepreneurbusinessplanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('ent_businessplan')->where('delete_status','0')->paginate(10);
        return view('admin.entrepreneur_businessplan.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entrepreneur_businessplan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        DB::table('ent_businessplan')->insert([
        ['idea' => $request->idea, 'women_model' => $request->women_model, 'customer' => $request->customer, 'market' => $request->market, 'industry' => $request->industry, 'product' => $request->product, 'campaign' => $request->campaign, 'budget' => $request->budget, 'team' => $request->team, 'pitch' => $request->pitch ]
        ]);
        return redirect('/admin/entrepreneur_businessplan');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('ent_businessplan')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.entrepreneur_businessplan.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('ent_businessplan')->where('id',$id)->get();
        return view('admin.entrepreneur_businessplan.edit',compact('mydetails'));
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
        
        
        DB::table('ent_businessplan')->where('id',$request->id)->update([
    'idea' => $request->idea, 'women_model' => $request->women_model, 'customer' => $request->customer, 'market' => $request->market, 'industry' => $request->industry, 'product' => $request->product, 'campaign' => $request->campaign, 'budget' => $request->budget, 'team' => $request->team, 'pitch' => $request->pitch 
        ]);
        return redirect('/admin/entrepreneur_businessplan');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('ent_businessplan')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/entrepreneur_businessplan');
    }
}
