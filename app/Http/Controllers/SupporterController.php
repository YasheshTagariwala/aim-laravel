<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Availability;
use App\Models\BusinessPlan;
use App\Models\BusinessPlanFeedback;
use App\Models\Entrepreneurs;
use App\Models\ProjectDonations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;
use DB;

class SupporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supporter = DB::table('supporters')->where('created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('invited_by',Session::get('userid'))->get();
        $project_fundings = ProjectDonations::where('created_by',Session::get('userid'))->get();
//        $project_fundings = DB::table('project_donations')
//            ->join('projects', 'project_donations.project_from', '=', 'projects.created_by')
//            ->select('project_donations.*', 'projects.*')->where('project_donations.created_by',Session::get('userid'))->get();
        $blogs = DB::table('blogs')->where('created_by',Session::get('userid'))->get();
        $orders = DB::table('orders')->where('created_by',Session::get('userid'))->get();
        $recentblogs = DB::table('blogs')->skip(0)->take(1)->get();
        $recentmsgs = DB::table('messages')->where('created_by',Session::get('userid'))->orWhere('created_by','0')->skip(0)->take(5)->get();
        $countries = DB::table('countries')->get();
        $appoinments = Appointments::where('with_user',Session::get('userid'))->get();
        $availablity = DB::table('availablity')->where('created_by',Session::get('userid'))->get();
        $appoinments = DB::table('appoinments')->get();
        $availablity = DB::table('availablity')->get();
        $organizations = DB::table('organizations')
        ->join('userdetails', 'organizations.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','2')->get();
        //print_r($organizations); exit();
        $entrepreneurs = Entrepreneurs::where('delete_status',0)->get();
        return view("dashboard.supporter",compact("supporter","blogs","user_invites","project_fundings","recentblogs","recentmsgs","organizations","orders","countries","availablity","appoinments","entrepreneurs"));
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

        $plogo = $request->profile_img;
        if($plogo)
        {

            $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
            $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
            $namefile1 = $plogo->getClientOriginalName();
            $recfilename1 = preg_replace('/\s+/', '', $namefile1);
            $recfilename1 = $timestamp1."_123_".$recfilename1;
            $upload_success1 = Input::file('profile_img')->move($destinationPath1, $recfilename1);
            $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

        }

        $video = $request->profile_video;
        $video_path = "";
        if($video) {
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
            $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
            $namefile = $video->getClientOriginalName();
            $recfilename = preg_replace('/\s+/', '', $namefile);
            $recfilename = $timestamp."_123_".$recfilename;
            $upload_success = $video->move($destinationPath, $recfilename);
            $video_path = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);
        }
        $youtube_link = "";
        if($request->profile_youtube_link) {
            $youtube_link = $request->profile_youtube_link;
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
        }

         DB::table('supporters')->insert(['expertise' => $request->expertise
             ,'category' => $request->category,'country_interest' => $country,'area_interest' => $request->area_interest,'women_stage' => $request->women_stage
             ,'expectation' => $request->expect,'created_by' => $userid,'updated_by' => $userid
            ,'image' => $certificatePath1, 'video_link' => $video_path,'youtube_link' => $youtube_link,]);
         return redirect('/supporter')->with('message', 'Supporter Details Added Successfully');
    }

    public function appoinment(Request $request)
    {
        //print_r($request->all()); exit();
         $userid = Session::get('userid');

         DB::table('appoinments')->insert(['fromdate' => $request->fdate,'todate' => $request->tdate,'fromtime' => $request->ftime,'totime' => $request->ttime,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/supporter')->with('message', 'Supporter Details Added Successfully');
    }

    public function availablity(Request $request)
    {
//        print_r($request->all()); exit();
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
        return redirect('/supporter')->with('message', 'Supporter Details Added Successfully');
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

        $plogo = $request->profile_img;
        if($plogo)
        {

            $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
            $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
            $namefile1 = $plogo->getClientOriginalName();
            $recfilename1 = preg_replace('/\s+/', '', $namefile1);
            $recfilename1 = $timestamp1."_123_".$recfilename1;
            $upload_success1 = Input::file('profile_img')->move($destinationPath1, $recfilename1);
            $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

        }else {
            $certificatePath1 = $request->profile_img_done;
        }

        $video = $request->profile_video;
        $video_path = "";
        if($video) {
            $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
            $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
            $namefile = $video->getClientOriginalName();
            $recfilename = preg_replace('/\s+/', '', $namefile);
            $recfilename = $timestamp."_123_".$recfilename;
            $upload_success = $video->move($destinationPath, $recfilename);
            $video_path = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);
        }else {
            $video_path = $request->profile_video_done;
        }
        $youtube_link = "";
        if($request->profile_youtube_link) {
            $youtube_link = $request->profile_youtube_link;
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
        }else {
            $youtube_link = $request->profile_youtube_link_done;
        }

         DB::table('supporters')->where('id',$id)->update(['expertise' => $request->expertise
             ,'category' => $request->category,'country_interest' => $country
             ,'area_interest' => $request->area_interest,'women_stage' => $request->women_stage
             ,'image' => $certificatePath1, 'video_link' => $video_path,'youtube_link' => $youtube_link
             ,'expectation' => $request->expect,'created_by' => $userid,'updated_by' => $userid]);
         return redirect('/supporter')->with('message', 'Supporter Details Added Successfully');
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
        $type = 'supporter';
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
        $type = 'supporter';
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

    public function appointmentStatus(Request $request){
        Appointments::where('id',$request->id)->update(['status' => $request->status]);
        return response()->json(['status' => true],200);
    }
}
