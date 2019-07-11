<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class InvestorprofileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('investors')->where('delete_status','0')->paginate(10);
        return view('admin.investor_profile.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $women_stages = DB::table('women_stage')->get();
        $categories = DB::table('categories')->where('groupid','3')->get();
        return view('admin.investor_profile.create',compact('women_stages'),compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        DB::table('investors')->insert([
        ['expertise' => $request->expertise, 'capital_invesment' => $request->capital_investment, 'category' => $request->category, 'country_interest' => $request->country_interest, 'roi' => $request->roi, 'women_stage' => $request->women_stage, 'expectation' => $request->expectation ]
        ]);
        return redirect('/admin/investor_profile');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('investors')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.investor_profile.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('investors')->where('id',$id)->get();
        return view('admin.investor_profile.edit',compact('mydetails'));
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
        

        DB::table('investors')->where('id',$request->id)->update([
    'expertise' => $request->expertise, 'capital_invesment' => $request->capital_investment, 'category' => $request->category, 'country_interest' => $request->country_interest, 'roi' => $request->roi, 'women_stage' => $request->women_stage, 'expectation' => $request->expectation
        ]);
        $mydetails = DB::table('investors')->get();
        return view('admin.investor_profile.index',compact('mydetails'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('investors')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
       $mydetails = DB::table('investors')->where('delete_status','0')->get();
       return view('admin.investor_profile.index',compact('mydetails'));
    }
}
