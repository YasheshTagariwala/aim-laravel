<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Entrepreneurs;
use App\Models\Investor;
use App\Models\ProjectDonations;
use App\Models\ProjectFunding;
use App\Models\Projects;
use App\Models\Supporter;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use DB;
use Session;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organization = DB::table('organizations')->where('created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('invited_by',Session::get('userid'))->get();
        $blogs = DB::table('blogs')->where('created_by',Session::get('userid'))->get();
        $orders = DB::table('orders')->where('created_by',Session::get('userid'))->get();
//        $projects = DB::table('projects')->get();
        $projects = Projects::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get();
        $user_invites = DB::table('user_invites')->where('created_by',Session::get('userid'))->get();
        $recentblogs = DB::table('blogs')->skip(0)->take(1)->get();

        $project_funding = ProjectFunding::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->whereBetween(DB::raw('DATE(created_at)'),[date('Y-m-d',strtotime("-7 days")),date('Y-m-d')])->get();

        $project_donations = ProjectDonations::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->whereBetween(DB::raw('DATE(created_at)'),[date('Y-m-d',strtotime("-7 days")),date('Y-m-d')])->get();

        $entrepreneurs = DB::table('projects')
        ->join('userdetails', 'projects.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','1')->get();
        $users = UserDetails::where('groupid','!=',2)->get();

        $appointments = Appointments::whereHas('withUser',function($query) {
            $query->where('groupid',3);
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->where('status',1)->get();
        $mentouring_hours = 0;
        foreach ($appointments as $appointment) {
            $d1= new \DateTime(date('Y-m-d')." ".$appointment->fromtime);
            $d2= new \DateTime(date('Y-m-d')." ".$appointment->totime);
            $interval= $d1->diff($d2);
            $mentouring_hours += ($interval->days * 24) + $interval->h;
        }

        $total_funds_invest = ProjectFunding::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get()->sum('amount');
        
        $total_funds_donate = ProjectDonations::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get()->sum('amount');

        $country = Entrepreneurs::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get()->groupBy('country')->count();

        $entrepreneurs_list = Entrepreneurs::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get();
        $investor = Investor::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get();
        $supporter = Supporter::whereHas('user',function($query) {
            $query->where('userid',Session::get('userid'));
            $query->orWhere('userid',NULL);
        })->get();
        //print_r($project_donations); exit();
        return view("dashboard.organization",compact("organization","blogs"
            ,"user_invites","projects","project_donations","project_funding","orders"
            ,"entrepreneurs","user_invites","recentblogs",'users','mentouring_hours'
            ,'total_funds_invest','total_funds_donate','country','entrepreneurs_list','investor','supporter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all()); exit();
         $org_logo = Input::file('org_logo');
         $org_file = Input::file('org_file');
         $userid = Session::get('userid');
      
        $certificatePath1 = '';
        $certificatePath = '';
       
             $category = implode(',', $request->org_categories) ;
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

        if($org_file)
         {
  
              $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
              $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile1 = $org_file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile1);
              $recfilename1 = $timestamp1."_123_".$recfilename1;
              $upload_success1 = Input::file('org_file')->move($destinationPath1, $recfilename1);
              $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

         }
         
         DB::table('organizations')->insert(['name' => $request->org_name,'description' => $request->org_desc,'country' => $request->country,'founded_date' => $request->founded_date,'org_logo' => $certificatePath,'categories' => $category,'org_file' => $certificatePath1,'file_title' => $request->org_file_title,'mission' => $request->org_msg,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/organization')->with('message', 'Organization Details Added Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $organization = DB::table('organizations')->where('id',$id)->get();
        //print_r($organization); exit();
        return view('organization.show',compact('organization'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //print_r($request->all()); exit();
         //$org_logo = Input::file('org_logo');
         $org_file = Input::file('org_file');
         $userid = Session::get('userid');
      
        $certificatePath1 = '';
        $certificatePath = $request->org_logo;
        $org_logo1 = $request->org_logo1;
       
        if($org_logo1)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $org_logo1->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('org_logo1')->move($destinationPath, $recfilename);
              $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        if($org_file)
         {
  
              $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
              $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile1 = $org_file->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile1);
              $recfilename1 = $timestamp1."_123_".$recfilename1;
              $upload_success1 = Input::file('org_file')->move($destinationPath1, $recfilename1);
              $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

         }
         
             $category = implode(',', $request->org_categories) ;
         DB::table('organizations')->where('id',$id)->update(['name' => $request->org_name,'description' => $request->org_desc,'country' => $request->country,'founded_date' => $request->founded_date,'org_logo' => $certificatePath,'categories' => $category,'org_file' => $certificatePath1,'file_title' => $request->org_file_title,'mission' => $request->org_msg,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/organization')->with('message', 'Organization Details Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
