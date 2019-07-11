<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class EntrepreneurfundingController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('ent_funding')->where('delete_status','0')->paginate(10);
        return view('admin.entrepreneur_funding.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.entrepreneur_funding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     

        DB::table('ent_funding')->insert([
        ['goal' => $request->goal, 'fund_for' => $request->fund_for, 'fund_type' => $request->fund_type, 'fund_pvt' => $request->fund_pvt, 'pre_money' => $request->pre_money, 'interest' => $request->interest, 'prev_fund' => $request->prev_fund, 'fund_commitment' => $request->fund_commitment ]
        ]);
        return redirect('/admin/entrepreneur_funding');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('ent_funding')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.entrepreneur_funding.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('ent_funding')->where('id',$id)->get();
        return view('admin.entrepreneur_funding.edit',compact('mydetails'));
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
        
        
        DB::table('ent_funding')->where('id',$request->id)->update([
    'goal' => $request->goal, 'fund_for' => $request->fund_for, 'fund_type' => $request->fund_type, 'fund_pvt' => $request->fund_pvt, 'pre_money' => $request->pre_money, 'interest' => $request->interest, 'prev_fund' => $request->prev_fund, 'fund_commitment' => $request->fund_commitment
        ]);
        return redirect('/admin/entrepreneur_funding');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('ent_funding')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/entrepreneur_funding');
    }
}
