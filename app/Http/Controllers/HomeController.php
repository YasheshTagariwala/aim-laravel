<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurCompanies;
use App\Models\ProjectDonations;
use App\Models\ProjectFunding;
use App\Models\Subscriptions;
use App\Models\UserDetails;
use App\User;
use App\Models\MarketPlaceSettings;
use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get('is_login') == 1 ){
        $usergroup = DB::table('usergroup')->where('id',Session::get('groupid'))->get();
        //return view('dashboard.'.$usergroup[0]->url);
        return redirect('/'.$usergroup[0]->url);    
        }

        else{
        return view("home.index");
        }
    }

    public function home()
    {
        return view("home.index");
    }

    public function login()
    {
        return view("home.login");
    }


    public function register()
    {
        $usergroup = DB::table('usergroup')->where('view_status','0')->get();
        //print_r($usergroup); exit();
        return view("home.register",compact('usergroup'));
    }


    public function contact()
    {
        return view("home.contact");
    }


    public function calendar()
    {
        return view("home.full-cal");
    }

    public function startcampaign()
    {
        return view("home.start-campaign");
    }

    public function pricingcampaign()
    {
        return view("home.pricing-campaign");
    }

    public function campaignsupport()
    {
        return view("home.campaign-support");
    }

    public function orglist(Request $request)
    {
        $country = '';
        $category = '';
        $country = $request->country;
        $category = $request->category;

        $organizations = DB::table('organizations')->get();
        if($country != ''){
           $organizations =  $organizations->where('country',$country);
        }
        if($category != ''){
           $organizations =  $organizations->where('categories',$category);
        }
        //print_r($organizations); exit();
        return view('home.org-list',compact('organizations','country','category'));
    }

    public function whyaim()
    {
        return view("home.why-aim");
    }

    public function whataim()
    {
        return view("home.what-aim");
    }

    public function press()
    {
        return view("home.press");
    }

    public function instats()
    {

        $fTotalProjectFunding = ProjectFunding::sum('amount');
        $fTotalProjectDonations = ProjectDonations::sum('amount');
        $iTotalAfricanDiasporaBasedEnterpreneurs = EntrepreneurCompanies::where('category','LIKE','1%')->count();
        $iTotalSocialEntrepreneurBasedEnterpreneurs = EntrepreneurCompanies::where('category','LIKE','2%')->count();
        $iTotalWomenOwnedEnterpreneurs = EntrepreneurCompanies::where('category','LIKE','4%')->count();
        $iTotalYouthOwnedEnterpreneurs = EntrepreneurCompanies::where('category','LIKE','5%')->count();
        $iInvestors = UserDetails::where('groupid', '=', '4')->count();
        $iSupporters = UserDetails::where('groupid', '=', '3')->count();
        $iTotalMaleEntrepreneurs = UserDetails::where([['groupid', '=', '1'], ['gender', '=', 'male']])->count();
        $iTotalFemaleEntrepreneurs = UserDetails::where([['groupid', '=', '1'], ['gender', '=', 'female']])->count();

        return view("home.in-stats", [
                                            'investors' => $iInvestors,
                                            'supporters' => $iSupporters,
                                            'totalFunds' => $fTotalProjectFunding,
                                            'totalDonations' => $fTotalProjectDonations,
                                            'totalAfricanDiasporaBasedEnterpreneurs' => $iTotalAfricanDiasporaBasedEnterpreneurs,
                                            'totalSocialEntrepreneurBasedEnterpreneurs' => $iTotalSocialEntrepreneurBasedEnterpreneurs,
                                            'totalWomenOwnedEnterpreneurs' => $iTotalWomenOwnedEnterpreneurs,
                                            'totalYouthOwnedEnterpreneurs' => $iTotalYouthOwnedEnterpreneurs,
                                            'totalMaleEntrepreneurs' => $iTotalMaleEntrepreneurs,
                                            'totalFemaleEntrepreneurs' => $iTotalFemaleEntrepreneurs]);
    }

    public function blog()
    {
        $blogs = DB::table('blogs')->where('delete_status','0')->get();
        return view("home.blog",compact("blogs"));
    }

    public function faq()
    {
        return view("home.faq");
    }

    public function support()
    {
        return view("home.campaign-support");
    }

    public function termuse()
    {
        return view("home.term-use");
    }

    public function privacy()
    {
        return view("home.privacy");
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
        $password = md5($request->password);
        //print_r($request->all()); exit();

        $id = DB::table('users')->insertGetId(
        ['user_login' => $request->first_name.'_'.$request->last_name, 'user_pass' => $password, 'usergroup' => $request->category, 'user_email' => $request->email,'user_nicename' => $request->first_name.'_'.$request->last_name,'display_name' => $request->first_name.' '.$request->last_name,'user_activation_key' => '0']
        );
            Session::put('login_by',$request->email);
            Session::put('userid',$id);
            Session::put('userlogin',$request->first_name.'_'.$request->last_name);
            Session::put('useremail',$request->email);
            Session::put('username',$request->first_name.' '.$request->last_name);
            Session::put('groupid',$request->category);
            Session::put('is_login','1');
        return redirect('/');


    }

    public function save_contact(Request $request)
    {
        $id = DB::table('contacts')->insertGetId(
        ['name' => $request->name,'email' => $request->email,'subject' => $request->subject,'message' => $request->message]);

        $subject = "You have a new message from ".$request->name." in AIM";
        $messagecontent = "";
        $toemailids= $request->email;
        $replyto = $request->email;

        $messagecontent = '<div style="width:100%px;text-align:center;margin: 0;">';
        $messagecontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
        $messagecontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
        $messagecontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
        $messagecontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr>';
        $messagecontent .='<tr><td style="padding:15px; "><p><b>Hi Admin, </b></p>';
        $messagecontent .='<p>&nbsp;&nbsp;<b>Sender : </b>'.$request->name.'</p>';
        $messagecontent .='<p>&nbsp;&nbsp;<b>Subject : </b>'.$request->subject.'</p>';
        $messagecontent .='<p>&nbsp;&nbsp;<b>Message : </b>'.$request->message.'</p>';
        $messagecontent .='<p>&nbsp;&nbsp;<b>Reply To Email : </b>'.$request->email.'</p>';
        $messagecontent .='</td></tr></tbody></table></td></tbody></table></div>'; 
        //echo $messagecontent; exit();

        $data = array( 'replytoemail' => $replyto, 'subject' => $subject, 'content' => $messagecontent);
        
          
        Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
            $m->from('aim@acroplisinfotech.com', 'Africa Innovation Market');
            $m->replyTo($data['replytoemail'], $name = null);
            //$m->bcc('yogeshwaran@crizpal.com', '');
            $m->to($toemailids, '')->subject($data['subject']);
        });
        return redirect('/reg-note');
    }
    
    public function login_check(Request $request)
    {
        $password = md5($request->user_password);
//        print_r($request->all()); exit();

        $userlogin = DB::table('userdetails')->where('username',$request->username)->orWhere('email',$request->username)->get();
        if(count($userlogin) > 0 ){
        $userid = DB::table('userdetails')->where('password',$password)->where('email',$userlogin[0]->email)->get();
        if(count($userid) > 0){
            $oMarketPlace = MarketPlaceSettings::where('org_id', '=', $userid[0]->id)->first();
            Session::put('storelogo',$oMarketPlace ? $oMarketPlace->getLogoUrl() : "");
            Session::put('storename',$oMarketPlace ? $oMarketPlace->storename : "");
            Session::put('login_by',$request->username);
            Session::put('userid',$userid[0]->id);
            Session::put('firstname',$userid[0]->firstname);
            Session::put('lastname',$userid[0]->lastname);
            Session::put('useremail',$userid[0]->email);
            Session::put('username',$userid[0]->username);
            Session::put('groupid',$userid[0]->groupid);
            Session::put('provider',$userid[0]->provider);
            Session::put('is_login','1');


        DB::table('userlogs')->insert(
        ['userid' => $userid[0]->id, 'status' => 'LOGIN']
        ); 


            return redirect('/');
        }
        else{

            Session::put('is_login','0');
            return redirect('/login')->with('message', 'Invalid Login Credentials');
        }
        }
        else{

            Session::put('is_login','0');
            return redirect('/login')->with('message', 'Invalid Login Credentials');
        }


    }


    public function logout(Request $request)
    {


        DB::table('userlogs')->insert(
        ['userid' => Session::get('userid'), 'status' => 'LOGOUT']
        ); 
            Session::put('login_by','');
            Session::put('userid','');
            Session::put('firstname','');
            Session::put('lastname','');
            Session::put('useremail','');
            Session::put('username','');
            Session::put('is_login','0');
            Session::put('groupid','');
            Session::put('provider','');

            return redirect('/');
        
    }



    public function add_invite(Request $request)
    {
        if($request->ajax())
        {
            $userid = Session::get('userid');
            $count = $request->add_count; 
            $viewhtml = '';     
            $viewhtml .= '<div class="refer-col">';
            $viewhtml .= '<div class="col-md-4 col-sm-4 col-inputs">';
            $viewhtml .= '<input name="name'.$count.'" id="friend_name-0" value="" class="form-control" placeholder="Name" type="text">';
            $viewhtml .= '</div> ';     
            $viewhtml .= '<div class="col-md-4 col-sm-4 col-inputs">';
            $viewhtml .= '<input name="email'.$count.'" id="friend_email-0" value="" class="form-control" placeholder="Email" type="email">';
            $viewhtml .= '</div> ';     
            $viewhtml .= '<div class="col-md-4 col-sm-4 col-inputs">';
            $viewhtml .= '<select name="groupid'.$count.'" class="form-control">';
            $viewhtml .= '<option value="1">Entrepreneur</option> ';  
            $viewhtml .= '<option value="2">Organization</option> ';  
            $viewhtml .= '<option value="3">Supporter</option> ';  
            $viewhtml .= '</select>';
            $viewhtml .= '</div>';
            $viewhtml .= '</div>';

        }

        echo json_encode( $viewhtml );
    }


    public function subscribe(Request $request)
    {
        $oSubscription = Subscriptions::where('emailid', '=', $request->subscribe_email)->first();
        if($oSubscription){
            return response()->json(['status' => 2, 'message' => 'Thank you. You are allready subscribed with us.']);
        }else{
            $oSubscription = new Subscriptions();
            $oSubscription->emailid = $request->subscribe_email;
            $oSubscription->save();

            $subject = "You are subscribed to AIM (Africa Innovation Market)";
            $messagecontent = "";
            $toemailids= $request->subscribe_email;
            $content=$messagecontent;
            $replyto = 'aim@acroplisinfotech.com';

            $messagecontent = '<div style="width:100%px;text-align:center;margin: 0;">';
            $messagecontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
            $messagecontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
            $messagecontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
            $messagecontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr>';
            $messagecontent .='<p>&nbsp;&nbsp;Welcome To Africa Innovation Market (AIM).</p><p>&nbsp;&nbsp;You have subscribed to AIM </p>';
            $messagecontent .='<br><p style="font-size:10px; text-align:left;"><em>This is an automatically generated message. Please do not reply to this address.</em></p></td></tr></tbody></table></td></tbody></table></div>';

            $data = array( 'replytoemail' => $replyto, 'subject' => $subject, 'content' => $messagecontent);



            Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
                $m->from('aim@acroplisinfotech.com', 'Africa Innovation Market');
                $m->replyTo($data['replytoemail'], $name = null);
                $m->bcc('indunil@siyalude.biz');
                $m->to($toemailids, '')->subject($data['subject']);
            });

            return response()->json(['status' => 1, 'message' => 'Thank you for susbcribing with us.']);
        }
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
        //
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
