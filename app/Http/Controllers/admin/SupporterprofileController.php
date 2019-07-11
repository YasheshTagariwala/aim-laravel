<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class SupporterprofileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('supporters')->where('delete_status','0')->paginate(10);
        return view('admin.supporter_profile.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $women_stages = DB::table('women_stage')->get();
        $categories = DB::table('categories')->where('groupid','1')->get();
        $area_interests = DB::table('categories')->where('groupid','3')->get();
        return view('admin.supporter_profile.create',compact('women_stages','categories','area_interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
        DB::table('supporters')->insert([
        ['expertise' => $request->expertise, 'category' => $request->category,'area_interest' => $request->area_interest, 'country_interest' => $request->country_interest,  'women_stage' => $request->women_stage, 'expectation' => $request->expectation  ]
        ]);
        return redirect('/admin/supporter_profile');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('supporters')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.supporter_profile.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('supporters')->where('id',$id)->get();
        return view('admin.supporter_profile.edit',compact('mydetails'));
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
        
        DB::table('supporters')->where('id',$request->id)->update([
    'expertise' => $request->expertise, 'category' => $request->category,'area_interest' => $request->area_interest, 'country_interest' => $request->country_interest,  'women_stage' => $request->women_stage, 'expectation' => $request->expectation
        ]);
        $mydetails = DB::table('supporters')->get();
        return view('admin.supporter_profile.index',compact('mydetails'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('supporters')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
       $mydetails = DB::table('supporters')->where('delete_status','0')->get();
       return view('admin.supporter_profile.index',compact('mydetails'));
    }
}
