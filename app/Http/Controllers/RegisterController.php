<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;
use DB;
use Session;
use Mail;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function redirectToProvider($provider)
    {
        if($provider != 'twitter'){
            return Socialite::driver($provider)->stateless()->redirect();
        }
        else{            
            return Socialite::driver($provider)->redirect();
        }
    }
    
    public function handleProviderCallback($provider)
    {
        //print_r($secret); exit();
        if($provider == 'twitter'){
//        $token = '';
//        $secret = '';

            $token = Config::get('services.twitter.access_token');
            $secret = Config::get('services.twitter.access_secret');
            $user = Socialite::driver($provider)->userFromTokenAndSecret($token, $secret);
        $user->getId();
        $dname = $user->getNickname();
        $uname = $user->getName();
        $email = $user->getEmail().$dname.$uname.'@twitter.com';
        $fname = $dname;
        $lname = $uname;
        }
        else{  
        //print_r($provider); exit();          
            $user = Socialite::driver($provider)->stateless()->user();
        $user->getId();
        $dname = $user->getNickname();
        $uname = $user->getName();
        $email = $user->getEmail();
        $names = explode(" ", $uname);
        $fname = $names[0];
        $lname = $names[1];
        }
        //print_r($user); exit();
        // All Providers

        //$moble = $user->getPhone();
        $user->getAvatar();
        //print_r($moble); exit();
        $email_check = DB::table('userdetails')->where('email',$email)->where('provider',$provider)->get();

        if(count($email_check) > 0){
            Session::put('login_by',$email_check[0]->email);
            Session::put('userid',$email_check[0]->id);
            Session::put('firstname',$email_check[0]->firstname);
            Session::put('lastname',$email_check[0]->lastname);
            Session::put('useremail',$email_check[0]->email);
            Session::put('username',$email_check[0]->username);
            Session::put('groupid',$email_check[0]->groupid);
            Session::put('provider',$email_check[0]->provider);
            Session::put('is_login','1');

            return redirect('/');

        }
        else{
        $usergroup = DB::table('usergroup')->where('view_status','0')->get();
        return view('home.s-register',compact('dname','uname','email','usergroup','fname','lname','provider'));
        }
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $provider = 0;
        $provider = $request->provider;
        $email_check = DB::table('userdetails')->where('email',$request->email)->where('provider',$provider)->get();
        //print_r(count($email_check)); exit();

        if(count($email_check) < 1){
        $password = md5($request->password);

        $invites = DB::table('user_invites')->where('email',$request->email)->where('groupid',$request->grbid)->where('invite_status','0')->get();
        //print_r($request->all()); exit();

        if(count($invites) > 0){


            $id = DB::table('userdetails')->insertGetId( ['firstname' => $request->first_name,
                                                          'lastname' => $request->last_name,
                                                          'username' => $request->username,
                                                          'email' => $request->email,
                                                          'gender' => $request->gender,
                                                          'password' => $password,
                                                          'userid' => $invites[0]->invited_by,
                                                          'groupid' => $request->grbid,
                                                          'provider' => $provider]
                                                     );

            Session::put('login_by',$request->email);
            Session::put('userid',$id);
            Session::put('firstname',$request->first_name);
            Session::put('lastname',$request->last_name);
            Session::put('useremail',$request->email);
            Session::put('username',$request->username);
            Session::put('groupid',$request->grbid);
            Session::put('provider',$provider);
            Session::put('is_login','1');

             DB::table('user_invites')->where('email',$request->email)->where('groupid',$request->grbid)->update(
        ['invite_status' => '1']
        );

        return redirect('/');
        }
        else{

        $name = $request->username;
        $email = $request->email;
        $usergroup = DB::table('usergroup')->where('id',$request->grbid)->get();
        $subject = $name." Requested to join AIM as a ".$usergroup[0]->name;
        $messagecontent = "";
        $toemailids= 'indunil@siyalude.biz';
        $content=$messagecontent;
        $replyto = 'aim@acropolisinfotech.com';
        $url_admin = '/admin/temp_user';

        $messagecontent = '<div style="width:100%px;text-align:center;margin: 0;">';
        $messagecontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
        $messagecontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
        $messagecontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
        $messagecontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr>';
        $messagecontent .='<tr><td style="padding:15px; "><p><b>Hi Admin, </b></p>';
        $messagecontent .='<p>&nbsp;&nbsp;'.$name.' requested to join Africa Innovation Market (AIM) as '.$usergroup[0]->name.'.</p><p>&nbsp;&nbsp;You may approve/reject by '.$usergroup[0]->name.',&nbsp;<a href="'.url($url_admin).'">click to view admin panel</a> to the AIM</p>';
        $messagecontent .='<center><a href="'.url($url_admin).'" style="background: #619fef; text-align: center; border-color: #ef6262; padding: 8px 30px !important; text-transform: uppercase; font-size:18px; font-weight: bold; color:#ffffff; text-decoration:none;">To Approve / Reject</a></center>';
        $messagecontent .='<br><p style="font-size:10px; text-align:left;"><em>This is an automatically generated message. Please do not reply to this address.</em></p></td></tr></tbody></table></td></tbody></table></div>'; 

        $data = array( 'replytoemail' => $replyto, 'subject' => $subject, 'content' => $messagecontent);

        $id = DB::table('userdetails')->insertGetId([   'firstname' => $request->first_name,
                                                        'lastname' => $request->last_name,
                                                        'username' => $request->username,
                                                        'email' => $request->email,
                                                        'gender' => $request->gender,
                                                        'password' => $password,
                                                        'groupid' => $request->grbid,
                                                        'provider' => $provider] );

            Session::put('login_by',$request->email);
            Session::put('userid',$id);
            Session::put('firstname',$request->first_name);
            Session::put('lastname',$request->last_name);
            Session::put('useremail',$request->email);
            Session::put('username',$request->username);
            Session::put('groupid',$request->grbid);
            Session::put('provider',$provider);
            Session::put('is_login','1');
        Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
            $m->from(config('mail.from.address'), config('mail.from.name'));
            $m->replyTo($data['replytoemail'], $name = null);
            $m->bcc('indunil@siyalude.biz');
            $m->to($toemailids, '')->subject($data['subject']);
        });

            $msgcontent = '<div style="width:100%px;text-align:center;margin: 0;">';
            $msgcontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
            $msgcontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
            $msgcontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
            $msgcontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr></tbody></table>';
            $msgcontent .='<p><b>Dear '.$request->first_name.' '.$request->last_name.', </b></p>';
            $msgcontent .='<p>Thank you for registering with AIM! ';
            $msgcontent .='<p>Your registration with AIM is successful. ';
            $msgcontent .='<p>Please login to your account using <a href="'.url('/login').'">'.url('/login').'</a></p> <br><br>';
            $msgcontent .='<p>Your registration with AIM is successful. <br>

                <br>You may contact us at aim@acropolisinfotech.com. Please add this address to your email program so future emails are not filtered by your SPAM settings. If you prefer, you may contact us at aim@acroplisinfotech.com.<br><br>
                Your privacy is extremely important to us. Rest assured that we value your personal information and will not share it with any third parties in accordance with our Privacy Policy, which is located at: http://africaninnovationmarket.org/privacy-policy<br><br>
                Once again, thank you for choosing AIM. We look forward to helping you start and scale up your business.<br>
                Sincerely,<br><b>AIM Team</b>
                </p>';


        $toemailid= $email;
        $data = array( 'replytoemail' => 'aim@acropolisinfotech.com', 'subject' => 'User Welcome From AIM', 'content' => $msgcontent);

        Mail::send('home.reminder', $data, function ($m) use ($data, $toemailid)  {
            $m->from(config('mail.from.address'), config('mail.from.name'));
            $m->replyTo($data['replytoemail'], $name = null);
            $m->bcc('indunil@siyalude.biz');
            $m->to($toemailid, '')->subject($data['subject']);
        });

        return redirect('/reg-note');
        }
        }
        else{
           return view('home.reg-already',compact('email_check')); 
        }
    }

    public function reg_note()
    {
        return view('home.reg-note');
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



    public function entrepreneur()
    {
            Session::put('loggroupid','1');
        return view('auth.ent-register');
    }

    public function organization()
    {
            Session::put('loggroupid','3');
        return view('auth.org-register');
    }
    
    public function supporter()
    {
            Session::put('loggroupid','4');
        return view('auth.sup-register');
    }
    
    public function investor()
    {
            Session::put('loggroupid','2');
        return view('auth.inv-register');
    }
}
