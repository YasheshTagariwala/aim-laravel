<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use Session;

class TempuserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('temp_users')->where('delete_status','0')->paginate(10);
        return view('admin.temp_user.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.temp_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $checks = DB::table('temp_users')->get();
         //print_r($request->all()); exit();

        foreach ($checks as $check) 
        {
            if($check->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($check->username == $request->username)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }

        $checksuser = DB::table('userdetails')->get();

        foreach ($checksuser as $checkuser) 
        {
            if($checkuser->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($checkuser->username == $request->username)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }
        $password = md5($request->password);

        $name = $request->username;
        $email = $request->email;
        $usergroup = DB::table('usergroup')->where('id',$request->groupid)->get();
        $subject = $name." Requested to join AIM as a ".$usergroup[0]->name;
        $messagecontent = "";
        $toemailids= 'praveenperfeitoo@gmail.com';
        $content=$messagecontent;
        $replyto = 'yogeshnaveen111@gmail.com';
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
        echo $messagecontent; exit();
        
          

        DB::table('temp_users')->insert([
    ['firstname' => $request->firstname, 'lastname' => $request->lastname, 'username' => $request->username, 'password' => $password, 'email' => $request->email, 'phone' => $request->phone, 'groupid' => $request->groupid ]
        ]);

            Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
            $m->from('aim@crizpal.com', 'Africa Innovation Market');
            $m->replyTo($data['replytoemail'], $name = null);
            $m->bcc('praveenperfeitoo@gmail.com', 'yogeshnaveen111@gmail.com');
            $m->to($toemailids, '')->subject($data['subject']);
        });

        return redirect('/admin/temp_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mydetail = DB::table('temp_users')->where('id',$id)->where('delete_status','0')->get();
        
        return view('admin.temp_user.show',compact('mydetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('temp_users')->where('id',$id)->get();
        return view('admin.temp_user.edit',compact('mydetails'));
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
       $checks = DB::table('temp_users')->where('id','!=',$request->id)->get();

        foreach ($checks as $check) 
        {
            if($check->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($check->username == $request->username)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }

        $checksuser = DB::table('userdetails')->get();

        foreach ($checksuser as $checkuser) 
        {
            if($checkuser->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($checkuser->username == $request->username)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }
        DB::table('temp_users')->where('id',$request->id)->update(['firstname' => $request->firstname, 'lastname' => $request->lastname, 'username' => $request->username, 'email' => $request->email, 'phone' => $request->phone, 'groupid' => $request->groupid ]);
                
        return redirect('/admin/temp_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
      DB::table('temp_users')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
                
        return redirect('/admin/temp_user');
    }

    public function approve($id)
    {
        DB::table('temp_users')->where('id',$id)->
       update([ 'approve_status' => '1' ]);

       $update = DB::table('temp_users')->where('id',$id)->get();
        $name = $update[0]->username;
        $email = $update[0]->email;
        $usergroup = DB::table('usergroup')->where('id',$update[0]->groupid)->get();
        $subject = $name." Invited to Login AIM as a ".$usergroup[0]->name;
        $messagecontent = "";
        $toemailids= $email;
        $content=$messagecontent;
        $replyto = 'yogeshnaveen111@gmail.com';
        $url_admin = '/login';

        $messagecontent = '<div style="width:100%px;text-align:center;margin: 0;">';
        $messagecontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
        $messagecontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
        $messagecontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
        $messagecontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr>';
        $messagecontent .='<tr><td style="padding:15px; "><p><b>Hi '.$name.', </b></p>';
        $messagecontent .='<p>&nbsp;&nbsp;Your regstered details has been approved by admin from Africa Innovation Market (AIM) as '.$usergroup[0]->name.'.</p><p>&nbsp;&nbsp;You can login by ,&nbsp;<a href="'.url($url_admin).'">click here to AIM login page.</a></p>';
        $messagecontent .='<center><a href="'.url($url_admin).'" style="background: #619fef; text-align: center; border-color: #ef6262; padding: 8px 30px !important; text-transform: uppercase; font-size:18px; font-weight: bold; color:#ffffff; text-decoration:none;">LOGIN</a></center>';
        $messagecontent .='<br><p style="font-size:10px; text-align:left;"><em>This is an automatically generated message. Please do not reply to this address.</em></p></td></tr></tbody></table></td></tbody></table></div>'; 

        $data = array( 'replytoemail' => $replyto, 'subject' => $subject, 'content' => $messagecontent);
        //echo $messagecontent; exit();

        DB::table('userdetails')->insert([
    ['firstname' => $update[0]->firstname, 'lastname' => $update[0]->lastname, 'username' => $update[0]->username, 'password' => $update[0]->password, 'email' => $update[0]->email, 'groupid' => $update[0]->groupid, 'phone' => $update[0]->phone ]
        ]);

            Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
            $m->from('aim@crizpal.com', 'Africa Innovation Market');
            $m->replyTo($data['replytoemail'], $name = null);
            $m->bcc('praveenperfeitoo@gmail.com', 'yogeshnaveen111@gmail.com');
            $m->to($toemailids, '')->subject($data['subject']);
        });
            
        return redirect('/admin/temp_user');
    }
    public function reject($id)
    {
        DB::table('temp_users')->where('id',$id)->
       update([ 'approve_status' => '2' ]);
       return redirect('/admin/temp_user');
    }
}
