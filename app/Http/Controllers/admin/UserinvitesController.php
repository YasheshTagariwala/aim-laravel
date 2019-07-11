<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;

class UserinvitesController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mydetails = DB::table('user_invites')->where('delete_status','0')->paginate(10);
        return view('admin.user_invites.index',compact('mydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_invites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $checks = DB::table('user_invites')->get();
         //print_r($request->all()); exit();
        foreach ($checks as $check) 
        {
            if($check->email == $request->email)
               {
                return redirect()->back()->with('message', 'Email already registered.');;
               }
            if($check->name == $request->name)
               {
                return redirect()->back()->with('message', 'Username already registered.');;
               }

        }

        $name = $request->name;
        $email = $request->email;
        $usergroup = DB::table('usergroup')->where('id',$request->groupid)->get();
        $subject = "You were Invited to Join AIM (Africa Innovation Market)";
        $messagecontent = "";
        $toemailids= $email;
        $content=$messagecontent;
        $replyto = 'yogeshnaveen111@gmail.com';

        $messagecontent = '<div style="width:100%px;text-align:center;margin: 0;">';
        $messagecontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
        $messagecontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
        $messagecontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
        $messagecontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr>';
        $messagecontent .='<tr><td style="padding:15px; "><p><b>Hi '.$name.', </b></p>';
        $messagecontent .='<p>&nbsp;&nbsp;Welcome To Africa Innovation Market (AIM).</p><p>&nbsp;&nbsp;We are invited you to join AIM as a '.$usergroup[0]->name.',&nbsp;<a href="'.url($usergroup[0]->reg_url).'">Click Here to Register in AIM.</a></p>';
        $messagecontent .='<center><a href="'.url($usergroup[0]->reg_url).'" style="background: #619fef; text-align: center; border-color: #ef6262; padding: 8px 30px !important; text-transform: uppercase; font-size:18px; font-weight: bold; color:#ffffff; text-decoration:none;">Register</a></center>';
        $messagecontent .='<br><p style="font-size:10px; text-align:left;"><em>This is an automatically generated message. Please do not reply to this address.</em></p></td></tr></tbody></table></td></tbody></table></div>'; 

        $data = array( 'replytoemail' => $replyto, 'subject' => $subject, 'content' => $messagecontent);
        //echo $messagecontent; exit();
        DB::table('user_invites')->insert([
    ['name' => $request->name, 'email' => $request->email, 'groupid' => $request->groupid, 'invited_by' => '0' ]
        ]);

        Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
        $m->from('aim@crizpal.com', 'Africa Innovation Market');
        $m->replyTo($data['replytoemail'], $name = null);
        $m->bcc('praveenperfeitoo@gmail.com', 'yogeshwaran111@zoho.com');
        $m->to($toemailids, '')->subject($data['subject']);
        });

        return redirect('/admin/user_invites');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $mydetail = DB::table('user_invites')->where('id',$id)->where('delete_status','0')->get();
        return view('admin.user_invites.show',compact('mydetail'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $mydetails = DB::table('user_invites')->where('id',$id)->get();
        return view('admin.user_invites.edit',compact('mydetails'));
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
        $checks = DB::table('user_invites')->where('id','!=',$request->id)->get();

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
        
        DB::table('user_invites')->where('id',$request->id)->update(['name' => $request->name, 'email' => $request->email, 'groupid' => $request->groupid ]);

        return redirect('/admin/user_invites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
      DB::table('user_invites')->where('id',$id)->
       update([ 'delete_status' => '1' ]);

        return redirect('/admin/user_invites');
    }
}
