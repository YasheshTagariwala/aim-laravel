<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Availability;
use App\Models\BusinessPlan;
use App\Models\CashOut;
use App\Models\Orders;
use App\Models\ProjectDonations;
use App\Models\ProjectFunding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\entrepreneur;
use Session;
use DB;

class EntrepreneurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Session::get('userid');
        $entrepreneur = DB::table('entrepreneurs')->where('created_by',Session::get('userid'))->get();
        $ent_company = DB::table('ent_company')->where('created_by',Session::get('userid'))->get();
        $ent_market = DB::table('ent_market')->where('created_by',Session::get('userid'))->get();
        $ent_funding = DB::table('ent_funding')->where('created_by',Session::get('userid'))->get();
        $ent_mgmnt_team = DB::table('ent_mgmnt_team')->where('created_by',Session::get('userid'))->get();
        $ent_businessplan = BusinessPlan::where('created_by',Session::get('userid'))->get();
        $campaigns = DB::table('campaigns')->where('created_by',Session::get('userid'))->get();
        $user_invites = DB::table('user_invites')->where('invited_by',Session::get('userid'))->get();
        $blogs = DB::table('blogs')->where('created_by',Session::get('userid'))->get();
        $project = DB::table('projects')->where('created_by',Session::get('userid'))->get();
        $orders = Orders::where('created_by',Session::get('userid'))->get();
        $recentblogs = DB::table('blogs')->skip(0)->take(1)->get();
        $recentmsgs = DB::table('messages')->where('created_by',Session::get('userid'))->orWhere('created_by','0')->skip(0)->take(5)->get();
        $project_fundings = ProjectFunding::where('project_from',Session::get('userid'))
            ->whereBetween(DB::raw('DATE(created_at)'),[date('Y-m-d',strtotime("-7 days")),date('Y-m-d')])->get();
        $project_donation = ProjectDonations::where('project_from',Session::get('userid'))
            ->whereBetween(DB::raw('DATE(created_at)'),[date('Y-m-d',strtotime("-7 days")),date('Y-m-d')])->get();

        $project_fundings = collect($project_fundings)->merge($project_donation);
        $countries = DB::table('countries')->get();
        $investors = DB::table('investors')
        ->join('userdetails', 'investors.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','4')->get();
        $supporters = DB::table('supporters')
        ->join('userdetails', 'supporters.created_by', '=', 'userdetails.id')
        ->where('userdetails.groupid','3')->get();
        $organizations = DB::table('organizations')
        ->join('userdetails', 'organizations.created_by', '=', 'userdetails.id')
        ->select('userdetails.*','organizations.*')
        ->where('userdetails.groupid','2')->get();

        $total_funds_raised = ProjectFunding::where('project_from',$userid)->get()->sum('amount')
            + ProjectDonations::where('project_from',$userid)->get()->sum('amount');
        return view('dashboard.entrepreneur',compact('entrepreneur','ent_company'
            ,'ent_market','ent_funding','ent_mgmnt_team','ent_businessplan','campaigns','blogs','user_invites','project','orders','userid','recentblogs','recentmsgs'
            ,'organizations','project_fundings','investors','countries','supporters','total_funds_raised'));
    }


    public function search($id)
    {
      $value = array("0" => $id);
        $query = DB::table('entrepreneurs')
            ->join('ent_company', 'entrepreneurs.created_by', '=', 'ent_company.created_by')
            ->join('ent_businessplan', 'entrepreneurs.created_by', '=', 'ent_businessplan.created_by')
            ->join('ent_funding', 'entrepreneurs.created_by', '=', 'ent_funding.created_by')
            ->select('entrepreneurs.*', 'ent_company.*','ent_businessplan.*','ent_funding.*');
        if($id == 11){    
          $query = $query->get();      
          $entrepreneurs = $query->sortByDesc("entrepreneurs.created_at");
        }
        if($id == 12){          
          $entrepreneurs = $query->where('entrepreneurs.is_top','1')->get();
        }
        if($id == 13){          
          $entrepreneurs = $query->where('entrepreneurs.is_featured','1')->get();
        }
        if($id <= 5){          
          $entrepreneurs = $query->where('ent_company.category','LIKE','%'.$id.'%')->get();
        }
        //print_r($entrepreneurs); exit();
        return view('entrepreneur.search',compact('entrepreneurs'));
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
        $certificatePath1 ='';
        $certificatePath ='';
        if($request->savefor == '1'){

            $plogo = $request->logo;
            if($plogo)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $plogo->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('logo')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('entrepreneurs')->insert(['name' => $request->name,'city' => $request->city,'state' => $request->state,'country' => $request->country,'sdg' => $request->sdg,'zipcode' => $request->zipcode,'women_stage' => $request->women_stage,'gender' => $request->gender,'created_by' => $userid,'updated_by' => $userid,'website' => $request->website,'linked_url' => $request->linked_url,'tw_url' => $request->tw_url,'fb_url' => $request->fb_url,'blog_url' => $request->blog_url,'gp_url' => $request->gp_url,'logo' => $certificatePath1]);

          $alert = 'Project Profile Details Added Successfully';  
        }

        else if($request->savefor == '2'){

            $project_img = $request->project_img;
            $certificatePath = [];
            if($project_img)
             {
                 $certificatePath = [];
                 foreach ($project_img as $key => $item){
                     $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
                     $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
                     $namefile = $item->getClientOriginalName();
                     $recfilename = preg_replace('/\s+/', '', $namefile);
                     $recfilename = $timestamp."_123_".$recfilename;
                     $upload_success = $item->move($destinationPath, $recfilename);
                     $certificatePath[] = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);
                 }

             }
             $video = $request->project_video;
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
            if($request->project_youtube_link) {
                $youtube_link = $request->project_youtube_link;
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

                if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
            }
             $category = implode(',', $request->category) ;
            $certificatePath = implode(",",$certificatePath);

         DB::table('ent_company')->insert(['overview' => $request->overview,'category' =>$category ,
             'p_yr_revenue' => $request->p_yr_revenue,'c_yr_revenue' => $request->c_yr_revenue,
             'n_yr_revenue' => $request->n_yr_revenue,'founded_date' => $request->founded_date,
             'no_employees' => $request->no_employee,'project_img' => $certificatePath,
             'video_link' => $video_path,'youtube_link' => $youtube_link,
             'created_by' => $userid,'updated_by' => $userid]);


          //print_r($request->all()); exit();
          $doc_count = $request->docrowcount;
          for ($dcount=1; $dcount <= $doc_count; $dcount++) { 
            $filetitle = $request->input('filetitle'.$dcount);
            $fileurl = $request->input('fileurl'.$dcount);
            $filepath= Input::file('filepath'.$dcount);
                  $certificatePath = '';

            if($filepath)
             {
      
                  $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile = $filepath->getClientOriginalName();    
                  $recfilename = preg_replace('/\s+/', '', $namefile);
                  $recfilename = $timestamp."_123_".$recfilename;
                  $upload_success = Input::file('filepath'.$dcount)->move($destinationPath, $recfilename);
                  $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);

             }

            DB::table('ent_documents')->insert(['file_title' => $filetitle,'filepath' => $certificatePath,'file_link' => $fileurl,'created_by' => $userid,'updated_by' => $userid]);
          }

          $alert = 'Project Profile Details Added Successfully';  
            
        }

        else if($request->savefor == '3'){

          //print_r($request->all()); exit();
            $market_count = $request->marketrowcount;
            for ($mcount=1; $mcount <= $market_count; $mcount++) { 
            $market = $request->input('market'.$mcount);
            $market_size = $request->input('market_size'.$mcount);
            $growth_rate= $request->input('growth_rate'.$mcount);

            DB::table('ent_market')->insert(['market' => $market,'market_size' => $market_size,'growth_rate' => $growth_rate,'created_by' => $userid,'updated_by' => $userid]);
          }

          $alert = 'Project Profile Details Added Successfully';  
            
        }


        else if($request->savefor == '31'){
          //print_r($request->all()); exit();
            $product_count = $request->productrowcount;
            for ($pcount=1; $pcount <= $product_count; $pcount++) { 
            $product_img = $request->product_img.$pcount;
            $product_name = $request->input('name'.$pcount);
            $product_desc= $request->input('description'.$pcount);
            $certificatePath1 = [];
            if($product_img)
             {
                foreach ($product_img as $img) {
                    $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
                    $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                    $namefile1 = $img->getClientOriginalName();
                    $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                    $recfilename1 = $timestamp1."_123_".$recfilename1;
                    $upload_success1 = $img->move($destinationPath1, $recfilename1);
                    $certificatePath1[] = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);
                }
             }
            $certificatePath1 = implode(",",$certificatePath1);

            $video = $request->product_video.$pcount;
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
            if($request->product_youtube_link.$pcount) {
                $youtube_link = $request->product_youtube_link.$pcount;
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

                if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
            }

            DB::table('ent_products')->insert(['name' => $product_name,'description' => $product_desc,
                'created_by' => $userid,'updated_by' => $userid,'product_img' => $certificatePath1,
                'video_link' => $video_path,"youtube_link" => $youtube_link]);
          }

          $alert = 'Project Profile Details Added Successfully';  
            
        }
        else if($request->savefor == '4'){
          //print_r($request->all()); exit();
            $team_count = $request->teamrowcount;
            for ($tcount=1; $tcount <= $team_count; $tcount++) { 
            $photograph = Input::file('photograph'.$tcount);
            $position = $request->input('position'.$tcount);
            $email = $request->input('email'.$tcount);
            $linked_url = $request->input('linked_url'.$tcount);
            $fb_url = $request->input('fb_url'.$tcount);
            $tw_url = $request->input('tw_url'.$tcount);
            $name = $request->input('name'.$tcount);
            $description = $request->input('description'.$tcount);
            if($photograph)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $photograph->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('photograph'.$tcount)->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('ent_mgmnt_team')->insert(['position' => $position,'email' => $email,'linked_url' => $linked_url,'fb_url' => $fb_url,'tw_url' => $tw_url,'name' => $name,'description' => $description,'created_by' => $userid,'updated_by' => $userid,'photograph' => $certificatePath1]);
          }

            
          $alert = 'Project Profile Details Added Successfully';  
        }


        else if($request->savefor == '5'){


         DB::table('ent_funding')->insert(['goal' => $request->goal,'fund_for' => $request->fund_for,'fund_type' => $request->fund_type,'fund_pvt' => $request->fund_pvt,'pre_money' => $request->pre_money,'interest' => $request->interest,'prev_fund' => $request->prev_fund,'fund_commitment' => $request->fund_commitment,'created_by' => $userid,'updated_by' => $userid]);

          $alert = 'Project Profile Details Added Successfully';  
            
        }


        else if($request->savefor == '6'){


          //print_r($request->all()); exit();
          $plan_count = $request->planrowcount;
          for ($plcount=1; $plcount <= $plan_count; $plcount++) { 
            $idea = $request->input('idea'.$plcount);
            $women_model = $request->input('women_model'.$plcount);
            $customer = $request->input('customer'.$plcount);
            $market = $request->input('market'.$plcount);
            $industry = $request->input('industry'.$plcount);
            $product = $request->input('product'.$plcount);
            $campaign = $request->input('campaign'.$plcount);
            $budget = $request->input('budget'.$plcount);
            $team = $request->input('team'.$plcount);
            $pitch = $request->input('pitch'.$plcount);
         DB::table('ent_businessplan')->insert(['idea' => $idea,'women_model' => $women_model,'customer' => $customer,'market' => $market,'industry' => $industry,'product' => $product,'campaign' => $campaign,'budget' => $budget,'team' => $team,'pitch' => $pitch,'created_by' => $userid,'updated_by' => $userid]);
            }

          $alert = 'Business Plan Details Added Successfully';  
            
        }

         return redirect('/entrepreneur')->with('message', 'Entrepreneur Details Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrepreneur = DB::table('entrepreneurs')
            ->join('ent_company', 'entrepreneurs.created_by', '=', 'ent_company.created_by')
            ->join('ent_businessplan', 'entrepreneurs.created_by', '=', 'ent_businessplan.created_by')
            ->join('ent_funding', 'entrepreneurs.created_by', '=', 'ent_funding.created_by')
            ->select('entrepreneurs.*', 'ent_company.*', 'ent_businessplan.*', 'ent_funding.*')
            ->where('entrepreneurs.id',$id)
            ->get();
//        print_r($entrepreneur); exit();
        return view('entrepreneur.show',compact('entrepreneur'));
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
        $certificatePath1 ='';
        $certificatePath ='';
        if($request->savefor == '1'){

        $certificatePath = $request->logo;
            $plogo = $request->logo;
            if($plogo)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $plogo->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('logo')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }
             else{

                  $certificatePath1 = $request->logo1;
             }

         DB::table('entrepreneurs')->where('id',$id)->update(['name' => $request->name,'city' => $request->city,'state' => $request->state,'country' => $request->country,'sdg' => $request->sdg,'zipcode' => $request->zipcode,'women_stage' => $request->women_stage,'gender' => $request->gender,'created_by' => $userid,'updated_by' => $userid,'website' => $request->website,'linked_url' => $request->linked_url,'tw_url' => $request->tw_url,'fb_url' => $request->fb_url,'blog_url' => $request->blog_url,'gp_url' => $request->gp_url,'logo' => $certificatePath1]);

            
        }

        else if($request->savefor == '2'){
             //$category = array("");
             $category = implode(',', $request->category) ;
            $project_img = $request->project_img;
                  $certificatePath1 = '';
            if($project_img)
             {

                 $certificatePath = [];
                 foreach ($project_img as $key => $item){
                     $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';
                     $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
                     $namefile = $item->getClientOriginalName();
                     $recfilename = preg_replace('/\s+/', '', $namefile);
                     $recfilename = $timestamp."_123_".$recfilename;
                     $upload_success = $item->move($destinationPath, $recfilename);
                     $certificatePath[] = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);
                 }

                 $certificatePath = implode(",",$certificatePath) .','.$request->project_img_done;
             }else {
                $certificatePath = $request->project_img_done;
            }

            $video = $request->project_video;
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
                $video_path = $request->project_video_done;
            }
            if($request->project_youtube_link) {
                $youtube_link = $request->project_youtube_link;
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

                if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
            }else {
                $youtube_link = $request->project_youtube_link_done;
            }

         DB::table('ent_company')->where('id',$id)->update(['overview' => $request->overview,'category' => $category,
             'p_yr_revenue' => $request->p_yr_revenue,'c_yr_revenue' => $request->c_yr_revenue,
             'n_yr_revenue' => $request->n_yr_revenue,'founded_date' => $request->founded_date,
             'no_employees' => $request->no_employee,'project_img' => $certificatePath,
             'video_link' => $video_path,'youtube_link' => $youtube_link,
             'created_by' => $userid,'updated_by' => $userid]);

          //print_r($request->all()); exit();
          $doc_count = $request->docrowcount;
          for ($dcount=1; $dcount <= $doc_count; $dcount++) { 
            $filetitle = $request->input('filetitle'.$dcount);
            $fileurl = $request->input('fileurl'.$dcount);
            $filepath= Input::file('filepath'.$dcount);
                  $certificatePath = '';

            if($filepath)
             {
      
                  $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile = $filepath->getClientOriginalName();    
                  $recfilename = preg_replace('/\s+/', '', $namefile);
                  $recfilename = $timestamp."_123_".$recfilename;
                  $upload_success = Input::file('filepath'.$dcount)->move($destinationPath, $recfilename);
                  $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename);

             }

            DB::table('ent_documents')->insert(['file_title' => $filetitle,'filepath' => $certificatePath,'file_link' => $fileurl,'created_by' => $userid,'updated_by' => $userid]);
          }

            
        }

        else if($request->savefor == '3'){

            $product_img = $request->product_img;
            if($product_img)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $product_img->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('product_img')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('ent_market')->insert(['market' => $request->market,'market_size' => $request->market_size,'growth_rate' => $request->growth_rate,'name' => $request->name,'description' => $request->description,'created_by' => $userid,'updated_by' => $userid,'product_img' => $certificatePath1]);

            
        }

        else if($request->savefor == '4'){

            $photograph = $request->photograph;
            if($photograph)
             {
      
                  $destinationPath1 = $_SERVER['DOCUMENT_ROOT'].'/files/documents';           
                  $timestamp1 = str_replace([' ', ':'], '-', date("YmdHis"));
                  $namefile1 = $photograph->getClientOriginalName();    
                  $recfilename1 = preg_replace('/\s+/', '', $namefile1);
                  $recfilename1 = $timestamp1."_123_".$recfilename1;
                  $upload_success1 = Input::file('photograph')->move($destinationPath1, $recfilename1);
                  $certificatePath1 = ('http://'.$_SERVER['HTTP_HOST']."/files/documents/".$recfilename1);

             }

         DB::table('ent_mgmnt_team')->insert(['position' => $request->position,'email' => $request->email,'linked_url' => $request->linked_url,'fb_url' => $request->fb_url,'tw_url' => $request->tw_url,'name' => $request->name,'description' => $request->description,'created_by' => $userid,'updated_by' => $userid,'photograph' => $certificatePath1]);

            
        }


        else if($request->savefor == '5'){


         DB::table('ent_funding')->where('id',$id)->update(['goal' => $request->goal,'fund_for' => $request->fund_for,'fund_type' => $request->fund_type,'fund_pvt' => $request->fund_pvt,'pre_money' => $request->pre_money,'interest' => $request->interest,'prev_fund' => $request->prev_fund,'fund_commitment' => $request->fund_commitment,'created_by' => $userid,'updated_by' => $userid]);

            
        }


        else if($request->savefor == '6'){


         DB::table('ent_businessplan')->where('id',$id)->update(['idea' => $request->idea,'women_model' => $request->women_model,'customer' => $request->customer,'market' => $request->market,'industry' => $request->industry,'product' => $request->product,'campaign' => $request->campaign,'budget' => $request->budget,'team' => $request->team,'pitch' => $request->pitch,'created_by' => $userid,'updated_by' => $userid]);

            
        }

         return redirect('/entrepreneur')->with('message', 'Entrepreneur Details Added Successfully');
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

    public function getAllFunding() {
        $userid = Session::get('userid');
        $project_fundings = ProjectFunding::where('project_from',Session::get('userid'))->paginate(10);
        $project_donations = ProjectDonations::where('project_from',Session::get('userid'))->paginate(10);

        $total_funds_raised = ProjectFunding::where('project_from',$userid)->get()->sum('amount')
            + ProjectDonations::where('project_from',$userid)->get()->sum('amount');

        return view('entrepreneur.funding',compact('project_fundings','total_funds_raised','project_donations'));
    }

    public function getAllCashout() {
        $userid = Session::get('userid');
        $cash_outs = CashOut::where('created_by',$userid)->paginate(10);
        $total_funds_raised = ProjectFunding::where('project_from',$userid)->get()->sum('amount')
            + ProjectDonations::where('project_from',$userid)->get()->sum('amount');

        $total_cashed_out = CashOut::where('created_by',$userid)->where('status','not like','rejected')->get()->sum('amount');
        return view('entrepreneur.cash_out',compact('cash_outs','total_funds_raised','total_cashed_out'));
    }

    public function postCashout(Request $request) {
        $userid = Session::get('userid');
        $cashout = new CashOut();
        $cashout->amount = $request->amount;
        $cashout->type = $request->type;
        $cashout->description = $request->description;
        $cashout->status = 'pending';
        $cashout->bank_name = $request->bank_name;
        $cashout->bank_acc_no = $request->bank_acc_no;
        $cashout->bank_account_holder_name = $request->bank_account_holder_name;
        $cashout->bank_account_type = $request->bank_account_type;
        $cashout->aba_routing_number = $request->aba_routing_number;
        $cashout->created_by = $userid;
        $cashout->updated_by = $userid;
        $cashout->save();

        return response()->json(['status' => true],200);
    }

    public function getAppointmentDetails(Request $request)
    {
        $userid = Session::get('userid');
        $fixed_dates = [];

        $appointments = Appointments::where('created_by', $userid)->get()->map(function ($data) use ($fixed_dates) {
            $fixed_date[] = date('Y-m-d', strtotime($data->fromdate)) . " " . date('H:i:s', strtotime($data->fromtime));
            return [
                "type" => "appointment",
                "title" => "Appointment With " . $data->withUser->firstname . " " . $data->withUser->lastname,
                "start" => date('Y-m-d', strtotime($data->fromdate)) . " " . date('H:i:s', strtotime($data->fromtime)),
                "end" => date('Y-m-d', strtotime($data->todate)) . " " . date('H:i:s', strtotime($data->totime)),
                "allDay" => 0,
                "date" => date('Y-m-d', strtotime($data->fromdate)),
                "sTime" => date('H:i:s', strtotime($data->fromtime)),
                "eTime" => date('H:i:s', strtotime($data->totime)),
                "color" => "#3598DB",
                "approve" => $data->status,
            ];
        })->toArray();

        $all_availability = Availability::where('delete_status', 0)->get();
        $availability = [];

//        echo "<pre>";
        foreach ($all_availability as $data) {
            $times_from = date('Y-m-d H:i:s', strtotime($data->fromdate . ' ' . $data->fromtime));
            $times_to = date('Y-m-d H:i:s', strtotime($data->todate . ' ' . $data->totime));
            $interval = new \DateInterval('P1D');
            $realEnd = new \DateTime($times_to);
            $realEnd->add($interval);

            $booked = Appointments::where('with_user', $data->created_by)
                ->where(DB::raw('DATE_FORMAT(fromdate,"%Y-%m-%d")'), ">=", date('Y-m-d', strtotime($times_from)))
                ->where(DB::raw('DATE_FORMAT(fromdate,"%Y-%m-%d")'), "<=", date('Y-m-d', strtotime($times_to)))->get()->groupBy('fromdate');

            $test = [];
            foreach ($booked as $day => $arr) {
                $times = [];
                foreach ($arr as $b) {
                    $times = array_merge($times, range(date('H', strtotime($b->fromtime)), date('H', strtotime($b->totime))));
                }
                $test[$day] = array_unique($times);
            }

            $booked = $test;

            $period = new \DatePeriod(new \DateTime($times_from), $interval, $realEnd);
            foreach ($period as $date) {
                $range = range(date('H', strtotime($data->fromtime)), date('H', strtotime($data->totime)));
                if (!isset($booked[date('Y-m-d', strtotime($date->format('Y-m-d')))]) || count($booked[date('Y-m-d', strtotime($date->format('Y-m-d')))]) != count($range)) {
//                    if (!in_array(date('Y-m-d', strtotime($date->format('Y-m-d'))) . " " . date('H:i:s', strtotime($data->fromtime)), $fixed_dates)) {
//                        if (date('Y-m-d') < date('Y-m-d', strtotime($date->format('Y-m-d')))) {
                    $availability[] = [
                        "type" => "availability",
                        "title" => "Book Appointment With " . $data->user->firstname . " " . $data->user->lastname,
                        "start" => date('Y-m-d', strtotime($date->format('Y-m-d'))) . " " . date('H:i:s', strtotime($data->fromtime)),
                        "end" => date('Y-m-d', strtotime($date->format('Y-m-d'))) . " " . date('H:i:s', strtotime($data->totime)),
                        "allDay" => 0,
                        "userid" => $data->created_by,
                        "time_from_to" => trim(str_replace("AM", "", str_replace("PM", "", $data->fromtime))) . '-' . trim(str_replace("AM", "", str_replace("PM", "", $data->totime))),
                        "date" => date('Y-m-d', strtotime($date->format('Y-m-d'))),
                        "color" => $data->user->groupid == 3 ? "#FF0000" : "#DB7093",
                        "status" => 0,
                        "timesFromTo" => ['from' => date('H A', strtotime($data->fromtime)), 'to' => date('H A', strtotime($data->totime))],
                    ];
//                        }
//                    }
                }
            }
        }

        $appointments = $appointments + $availability;
        return response()->json($appointments, 200);
    }

    public function appoinment(Request $request)
    {
//        print_r($request->all()); die();
        $userid = Session::get('userid');

        $with_user = $request->with_user;
        $from_date = $request->from_date;
        $from_time = date('H:i:s', strtotime($request->from_time));
        $to_time = date('H:i:s', strtotime($request->to_time));


        if ($from_time >= $to_time) {
//            die('Err: To Time Should Be Greater');
            return redirect()->back()->with('message', 'Err: To Time Should Be Greater');
        }

        $app = Appointments::where('with_user', $with_user)->where(function ($q) use ($from_time, $to_time) {
            $f = DB::raw('TIME_FORMAT(fromtime,"%H:%i:%S")');
            $t = DB::raw('TIME_FORMAT(totime,"%H:%i:%S")');
            $q->where(function ($q) use ($from_time, $to_time, $f, $t) {
                $q->where($f, '>', $from_time)->where($f, '<', $to_time);
            });
            $q->orWhere(function ($q) use ($from_time, $to_time, $f, $t) {
                $q->where($t, '>', $from_time)->where($t, '<', $to_time);
            });
            $q->orWhere(function ($q) use ($from_time, $to_time, $f, $t) {
                $q->where($f, '=', $from_time)->where($t, '=', $to_time);
            });
            $q->orWhere(function ($q) use ($from_time, $to_time, $f, $t) {
                $q->where($f, '<=', $from_time)->where($t, '>=', $to_time);
            });
            $q->orWhere(function ($q) use ($from_time, $to_time, $f, $t) {
                $q->where($f, '>=', $from_time)->where($t, '<=', $to_time);
            });
        })->where(DB::raw('DATE_FORMAT(fromdate,"%Y-%m-%d")'), $from_date)->first();

        if ($app) {
//            die('Err: Busy schedule. Try another date or time');
            return redirect()->back()->with('message', 'Err: Busy schedule. Try another date or time');
        }

        if (date('H:i:s', strtotime($request->from_date)))

            DB::table('appoinments')->insert(['fromdate' => $from_date, 'todate' => $from_date
                , 'fromtime' => $from_time, 'totime' => $to_time,
                'with_user' => $request->with_user
                , 'created_by' => $userid, 'updated_by' => $userid]);
        return redirect('/entrepreneur')->with('message', 'Appointment Added Successfully');
    }
}
