<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;

class InviteController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->input('row_count')); exit();
        $count = $request->row_count;
        for ($i=1; $i <= $count; $i++) { 

        $name = $request->input('name'.$i);
        $email = $request->input('email'.$i);
        $groupid = $request->input('groupid'.$i);
        $userid = Session::get('userid');

        $id = DB::table('user_invites')->insertGetId(
        ['name' => $name, 'email' => $email, 'groupid' => $groupid, 'invited_by' => $userid,'created_by' => $userid,'updated_by' => $userid]
        );

        $usergroup = DB::table('usergroup')->where('id',$groupid)->get();
        
        $subject = "You were Invited to Join AIM (Africa Innovation Market)";
        $messagecontent = "";
        $toemailids= $email;
        $content=$messagecontent;
        $replyto = 'iperamuna@gmail.com';

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
        


            Mail::send('home.reminder', $data, function ($m) use ($data, $toemailids)  {
            $m->from('noreply@africainnovationmarket.org', 'Africa Innovation Market');
            $m->replyTo($data['replytoemail'], $name = null);
            $m->bcc('indunil@siyalude.biz');
            $m->to($toemailids, '')->subject($data['subject']);
        });
            
        }
        return redirect('/');
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
