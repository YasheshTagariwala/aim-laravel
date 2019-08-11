<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Availability;
use App\Models\BusinessPlan;
use App\Models\BusinessPlanFeedback;
use App\Models\Entrepreneurs;
use App\Models\ProjectDonations;
use App\Models\ProjectFunding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;
use DB;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investor = DB::table('investors')->where('created_by',Session::get('userid'))->get();
        $project_fundings = ProjectFunding::where('created_by',Session::get('userid'))->get();
//        $project_fundings = DB::table('project_donations')
//            ->join('projects', 'project_donations.project_from', '=', 'projects.created_by')
//            ->select('project_donations.*', 'projects.*')->where('project_donations.created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('invited_by',Session::get('userid'))->get();
        $blogs = DB::table('blogs')->where('created_by',Session::get('userid'))->get();
        $orders = DB::table('orders')->where('created_by',Session::get('userid'))->get();
        $recentblogs = DB::table('blogs')->skip(0)->take(1)->get();
        $recentmsgs = DB::table('messages')->where('created_by',Session::get('userid'))->orWhere('created_by','0')->skip(0)->take(5)->get();
        $countries = DB::table('countries')->get();
        $appoinments = Appointments::where('with_user',Session::get('userid'))->get();
        $availablity = DB::table('availablity')->where('created_by',Session::get('userid'))->get();
        $organizations = DB::table('organizations')
        ->join('userdetails', 'organizations.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','2')->get();
        $entrepreneurs = Entrepreneurs::where('delete_status',0)->get();
        return view("dashboard.investor",compact("investor","blogs","user_invites","project_fundings","recentblogs","recentmsgs","organizations","orders","countries", "entrepreneurs",'availablity','appoinments'));
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
         $userid = Session::get('userid');
         if(!empty($request->country)){
         $country = implode(",", $request->country);
            }else{
         $country = '';
            }

         DB::table('investors')->insert(['expertise' => $request->expertise,'category' => $request->category,'country_interest' => $country,'roi' => $request->roi,'capital_invesment' => $request->capital_invesment,'women_stage' => $request->women_stage,'expectation' => $request->expect,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/investor')->with('message', 'Investor Details Added Successfully');
    }

    public function availablity(Request $request)
    {
        if(date('Y-m-d',strtotime($request->fdate)) > date('Y-m-d',strtotime($request->tdate))){
            return redirect()->back()->with('message', 'Err: To Date Should Be Greater');
        } else if(date('H:i:s',strtotime($request->ftime)) > date('H:i:s',strtotime($request->ttime))){
            return redirect()->back()->with('message', 'Err: To Time Should Be Greater');
        } else {
            $dif = ((strtotime($request->ttime) - strtotime($request->ftime)) / (60 * 60));
            if($dif <= 0){
                return redirect()->back()->with('message', 'Err: Minimum 1 hour of Diff required');
            }
        }

        $availability = new Availability();
        $availability->fromdate = date('Y-m-d',strtotime($request->fdate));
        $availability->todate = date('Y-m-d',strtotime($request->tdate));
        $availability->fromtime = date('H:i:s',strtotime($request->ftime));
        $availability->totime = date('H:i:s',strtotime($request->ttime));
        $availability->created_by = Session::get('userid');
        $availability->updated_by = Session::get('userid');
        $availability->save();

//         $userid = Session::get('userid');
//
//         DB::table('availablity')->insert(['fromdate' => $request->fdate,'todate' => $request->tdate,'fromtime' => $request->ftime,'totime' => $request->ttime,'created_by' => $userid,'updated_by' => $userid]);
        return redirect('/investor')->with('message', 'Investor Details Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
         $userid = Session::get('userid');
         if(!empty($request->country)){
         $country = implode(",", $request->country);
            }else{
         $country = '';
            }

         DB::table('investors')->where('id',$id)->update(['expertise' => $request->expertise,'category' => $request->category,'country_interest' => $country,'roi' => $request->roi,'capital_invesment' => $request->capital_invesment,'women_stage' => $request->women_stage,'expectation' => $request->expect,'updated_by' => $userid]);
         return redirect('/investor')->with('message', 'Investor Details Added Successfully');
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


    public function entrepreneurList() {
        $entrepreneurs = Entrepreneurs::where('delete_status',0)->get();
        return view('supporter.ent-list',compact('entrepreneurs'));
    }

    public function entrepreneurShow($id = 0) {
        $type = 'investor';
        $entrepreneur = Entrepreneurs::findorfail($id);
        if($entrepreneur) {
            $project = DB::table('projects')->where('created_by',$entrepreneur->created_by)->first();
            $business_plans = DB::table('ent_businessplan')->where('created_by',$entrepreneur->created_by)->get();
            $company = \App\Models\EntrepreneurCompanies::where('created_by',$entrepreneur->created_by)->first();
            $funding_info = \App\Models\EntrepreneurFundingsInformation::where('created_by',$entrepreneur->created_by)->first();
            $women_stages = DB::table('women_stage')->where('id',$entrepreneur->women_stage)->first();
        }
        return view('supporter.ent-show',compact('entrepreneur','project','business_plans','company','funding_info','women_stages','type'));
    }

    public function feedback($id = 0){
        $type = 'investor';
        $plan_detail = BusinessPlan::find($id);
        if(!$plan_detail){
            return redirect()->back()->with('message', 'Plan not found.');
        }
        $feedbackList = BusinessPlanFeedback::where('business_plan_id',$plan_detail->id)->where('delete_status',0)->where('userid',Session::get('userid'))->get();
        return view('supporter.plan-feedback',compact('plan_detail','feedbackList','type'));
    }

    public function feedbackAdd(Request $request){
        if($request->fedback_id == '') {
            $bpf = new BusinessPlanFeedback();
            $bpf->userid = Session::get('userid');
        } else {
            $bpf = BusinessPlanFeedback::find($request->fedback_id);
        }
        $bpf->business_plan_id = $request->business_plan_id;
        $bpf->feedback = $request->description;
        $bpf->save();
        return redirect()->back()->with('message', 'Feedback Added');
    }

    public function feedbackDelete(Request $request){
        BusinessPlanFeedback::where('id',$request->id)->delete();
        return response()->json(['status' => true],200);
    }

    public function availability(){
        $type = 'investor';
        $availableList = Availability::where('created_by',Session::get('userid'))->get();
        return view('appointment.availability',compact('type','availableList'));
    }

    public function availabilityStore(Request $request){
        if(date('Y-m-d',strtotime($request->fromDate)) > date('Y-m-d',strtotime($request->toDate))){
            return redirect()->back()->with('message', 'Err: To Date Should Be Greater');
        } else if(date('H:i:s',strtotime($request->fromTime)) > date('H:i:s',strtotime($request->toTime))){
            return redirect()->back()->with('message', 'Err: To Time Should Be Greater');
        } else {
            $dif = ((strtotime($request->toTime) - strtotime($request->fromTime)) / (60 * 60));
            if($dif <= 0){
                return redirect()->back()->with('message', 'Err: Minimum 1 hour of Diff required');
            }
        }

        $availability = new Availability();
        $availability->fromdate = date('Y-m-d',strtotime($request->fromDate));
        $availability->todate = date('Y-m-d',strtotime($request->toDate));
        $availability->fromtime = date('H:i:s',strtotime($request->fromTime));
        $availability->totime = date('H:i:s',strtotime($request->toTime));
        $availability->created_by = Session::get('userid');
        $availability->updated_by = Session::get('userid');
        $availability->save();
        return redirect()->back()->with('message', 'Availability Added success');
    }

    public function appointmentStatus(Request $request){
        Appointments::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['status' => true],200);
    }
}
