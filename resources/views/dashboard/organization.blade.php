@extends('layouts.master')
@section('title', 'Organization Dashboard')
@section('pagebody')

    
        <!-- Start Inner Contents -->               
      
        <?php $organization = DB::table('organizations')->where('created_by',Session::get('userid'))->get(); ?>  
        <section class="myaccount-header">
            <div class="container">
                <h1>Organization</h1>
                <p class="col-md-8 col-md-offset-2"></p>
            </div>
        </section>  
    <section class="myaccount-body">
    <div class="myaccount-document"> 
    <div class="container">
                                        @if(Session::has('message'))
                                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                                        @endif
    </div>
    </div>
    </section> 
        
        <section class="myaccount-body">
            <div class="container">
                <div class="myaccount-document">
                    <div id="verticalTab" class="v-tabs">
                        <div class="vtab-nav clearfix"> 
                            <ul class="resp-tabs-list clearfix">
                                <li class="side_menu">Dashboard</li>
                                <li class="side_menu" id="profile_update">Profile Update</li>
                                <li class="side_menu" id="enterplace">Entrepreneurs</li>
                                <li class="side_menu" id="invite" >Invite</li>
                                <li class="side_menu" id="supporters">Supporters</li>
                                <li class="side_menu" id="investors">Investors</li>                             
                                <li class="side_menu" id="blog">Blog</li>
                                <li class="side_menu" id="Orders"><a href="#">Orders</a></li>
                                <li class="side_menu" id="Orders"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li></a>
                            </ul>
                            <ul class="resp-tabs-list right-tab  clearfix">
                                <li class="side_menu" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting" aria-hidden="true"></i></a></li>
                                <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li> 
                                <li class="logout"><a href="{{url('/logout')}}"><i class="fas fa-sign-out-alt" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="resp-tabs-container">
                            <div id="dashboard"> 
                                <div class="dashboard-section">
                                    <!--div class="dashboard-section-overlay">
                                        <div class="alert alert-danger fade in dashboard-alert" id="message">
                                            <p> Your Organization profile is not yet created/approved. Please do it now by clicking <a href="javascript:void(0)" class="btn btn-danger go_updateprofile">Here</a> OR <a class="btn btn-success" href="#">Contact Administrator</a></p>
                                        </div>
                                    </div-->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="campign_sharing clearfix">
                                            <div class="social_sharing invite_sharing pull-left">
                                                <button class="btn btn-warning invite_button"><i class="fa fa-user"></i> Invite Others</button>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 ">
                                            <div class="dashboard-tile detail tile-red">
                                                <div class="content" > 
                                                    <a class="go_link" href="javascript:void(0)" data-href="supporters">Supporters Mentoring Hours</a>
                                                    <p class="text-left "  ><span class="timer" data-to="0" data-speed="2500"></span></p>
                                                </div>          
                                                <div class="icon"><i class="fa fa-file-text"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-purple">
                                                <div class="content" >
                                                    <a class="go_link" href="javascript:void(0)" data-href="investors"> Funds by Investors</a>
                                                    <p class="text-left "  >$<span class="timer" data-to="0" data-speed="2500"></span></p>
                                                </div>
                                                <div class="icon"><i class="fa fa-envelope"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-turquoise">
                                                <div class="content" > 
                                                    <a class="go_link" href="javascript:void(0)" data-href="supporters">Donations by Supporters</a>
                                                    <p class="text-left "  >$<span class="timer" data-to="0" data-speed="2500"></span></p>
                                                </div>
                                                <div class="icon"><i class="fa fa-bar-chart-o"></i> </div>
                                          </div>
                                        </div>    
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-blue">
                                                <div class="content"  > 
                                                    <a class="go_link" href="javascript:void(0)" data-href="enterplace"> Enterprises Count Countries</a> 
                                                    <p class="text-left "  ><span class="timer" data-to="0" data-speed="2500"></span></p>
                                                </div>
                                                <div class="icon"><i class="fa fa-flag"></i> </div>
                                            </div>
                                        </div>    
                                    </div>  
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                   <h3 class="panel-title">Entrepreneurs Details</h3>          
                                                   <div class="actions pull-right"> <i class="fa fa-chevron-down"></i></div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" >  
                                                        
                                            <table class="table" cellspacing="0" width="100%">
                                                <thead class="cf">
                                                    <tr>
                                                        <th class="numeric">Project</th>
                                                        <th class="numeric">Funds</th>
                                                        <th class="numeric">Donations</th>          
                                                        <th class="numeric">Amount</th>
                                                        <th class="numeric">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($projects as $project)
                                                    <tr>
                                                        <td class="numeric">{{$project->title}}</td>
                                                        <td class="numeric">$<?php $sqlQuery = "SELECT sum(amount) as funds FROM project_funding WHERE project_from = ".$project->created_by." ";
                                                        $result = DB::select(DB::raw($sqlQuery)); 
                                                        print_r($result[0]->funds); ?></td>
                                                        <td class="numeric">$<?php $sqlQuery = "SELECT sum(amount) as donation FROM project_donations WHERE project_from = ".$project->created_by." ";
                                                        $result = DB::select(DB::raw($sqlQuery)); 
                                                        print_r($result[0]->donation); ?></td>                  
                                                        <td class="numeric">$0</td>                      
                                                        <td class="numeric">{{$project->progress}} %</td>             
                                                    </tr>                  
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table> 
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> 
                                                    <a class="go_link" href="javascript:void(0)" data-href="enterplace">View All Projects</a> 
                                                </div>
                                            </div>
                                        </div>      
                                        <div class="col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Country based Entrepreneurs , Investors and Supporters</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body" >
                                                    <div class="table-responsive project-stats"  >
                                                        @if(count((array)$users) > 0)
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Type</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Phone</th>
                                                                    {{--<th>Action</th>--}}
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($users as $user)
                                                                        <tr>
                                                                            @if($user->groupid == 1)
                                                                                <td>Entrepreneur</td>
                                                                            @elseif($user->groupid == 3)
                                                                                <td>Supporter</td>
                                                                            @elseif($user->groupid == 4)
                                                                                <td>Investor</td>
                                                                            @endif
                                                                            <td>{{$user->firstname .' '.$user->lastname}}</td>
                                                                            <td>{{$user->email}}</td>
                                                                            <td>{{$user->phone}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        @else
                                                            <div class="alert alert-warning alert-dismissable">You currently do not have any Entrepreneurs, Investors or Supporters in your network .</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a class="go_link" href="javascript:void(0)" data-href="enterplace">View All Projects</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Recent Entrepreneurs    </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" >                   
                                                        @if(count($entrepreneurs) > 0)
                                                        <table class="table">     
                                                                <tr><th>Name</th><th>Project Title</th></tr>                
                                                            <tbody>
                                                                @foreach($entrepreneurs as $entrepreneur)
                                                                <tr><td>{{$entrepreneur->firstname}} {{$entrepreneur->lastname}}</td><td>{{$entrepreneur->title}}</td></tr>
                                                                @endforeach
                                                           </tbody>
                                                        </table>
                                                        @else
                                                        <div class="alert alert-warning alert-dismissable">You have not sent any invitations recently.</div>
                                                        @endif
                                                    </div>
                                                </div>        
                                                <div class="panel-footer text-center"> <a class="go_link" href="javascript:void(0)" data-href="enterplace">View All Projects</a> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel facebook-box">
                                                <div class="panel-body">
                                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000"  style="height:320px">
                                                        <span class="tile-title pull-right">Latest News</span>
                                                        <i class="fa fa-rss"></i>                                            
                                                        <div>@if(count($recentblogs) > 0)    
                                                            <h2 class="no-m"><a href="#">{{$recentblogs[0]->name}}</a></h2>
                                                            <span class="tile-date">{{$recentblogs[0]->created_at}}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Invited Users Details   </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats"  >                    
                                                        @if(count($user_invites) > 0)
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($user_invites as $user_invite)
                                                                <tr><td>{{$user_invite->name}}</td><td> {{$user_invite->email}}</td></tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @else
                                                        <div class="alert alert-warning alert-dismissable">You have not sent any invitations recently.</div>
                                                        @endif
                                                    </div>
                                                </div>          
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>                 
                            <div id="invite">
                                <div class="row ">
                                    <div class="col-xs-12">
                                        <div  class="container-wrapper padding0 form-profile dashboard-forms">
                                            <div class="border-top">
                                                <form id="post" class="" @if(count($organization) > 0) action="{{url('/')}}/organization/{{$organization[0]->id}}/update" @else action="{{url('/')}}/organization/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
                                                    <div class="form-group">
                                                        <label >Organization Name <span class="acf-required">*</span></label>                               
                                                        <input name="org_name" size="40" class="form-control" type="text" @if(count($organization) > 0) value="{{$organization[0]->name}}" @else value="" @endif required="" placeholder="Enter Your Organization...">
                                                    </div>
                                                    <div class="form-group">
                                                        <?php $countries = DB::table('countries')->get(); ?>
                                                        <label >Country <span class="acf-required">*</span></label>                             
                                                        <select name="country" class="form-control" required="">
                                                            <option value="">Select Country</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->name}}" @if(count($organization) > 0) @if($organization[0]->country == $country->name) selected="" @endif @endif>{{$country->name}}</option>
                                                            @endforeach
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Organization Logo <span class="acf-required">*</span></label>                               
                                                        @if(count($organization) > 0)
                                                             @if($organization[0]->org_logo != '')
                                                            <img src="{{$organization[0]->org_logo}}" alt="" height="60" width="60" />
                                                            <input name="org_logo" value="{{$organization[0]->org_logo}}" class="btn" type="hidden">
                                                            @endif
                                                            <input name="org_logo1" id="friend_name-0" value="" class="btn"  type="file">
                                                        @else
                                                            <input name="org_logo" id="friend_name-0" value="" class="btn"  type="file">
                                                        @endif 
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Description <span class="acf-required">*</span></label>                             
                                                        <textarea name="org_desc" cols="40" rows="20" class="form-control" required="" placeholder="Enter Your Description...">@if(count($organization) > 0) {{$organization[0]->description}} @endif</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="acf-field_56d41973c0dbc">Category <span class="acf-required">*</span></label>
                                                        <?php $categories = DB::table('categories')->where('groupid','1')->get(); ?>
                                                            <ul>
                                                                @foreach($categories as $categorie)
                                                            <li> <label> <input type="checkbox" value="{{$categorie->id}}" name="org_categories[]" @if(count($organization) > 0) @if($organization[0]->categories == $categorie->id) checked="" @endif @endif /> {{$categorie->name}}</label> </li>
                                                                @endforeach
                                                            </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Founded Date <span class="acf-required">*</span></label>                                
                                                        <input name="founded_date" @if(count($organization) > 0) value="{{$organization[0]->founded_date}}" @else value="" @endif size="40" class="form-control" type="date" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >File <span class="acf-required"></span></label>                                
                                                        <input name="org_file" value="Add Image" size="40" class="form-control" type="file" ">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Title  <span class="acf-required"></span></label>                              
                                                        <input name="org_file_title" @if(count($organization) > 0) value="{{$organization[0]->file_title}}" @else value="" @endif size="40" class="form-control" type="text" required="" placeholder="Enter Your File Title...">
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Mission  <span class="acf-required"></span></label>                                
                                                        <textarea name="org_msg" cols="40" rows="20" class="form-control" required="" placeholder="Enter Your Mission...">@if(count($organization) > 0) {{$organization[0]->mission}} @endif</textarea>
                                                    </div>
                                                    <input value="Save" class="btn btn-primary" type="submit">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="update_form">
                                <div class="row"> 
                                    <div class="panel panel-white">
                                        <div class="panel-body" id="no-more-tables">
                                            <table id="example" class="table table-striped table-bordered cf" cellspacing="0" width="100%">
                                                <thead class="cf">
                                                    <tr>
                                                        <th class="numeric">Project</th>
                                                        <th class="numeric">Funds Raised</th>
                                                        <th class="numeric">Donations</th>          
                                                        <th class="numeric">Admin Transfered Amount</th>
                                                        <th class="numeric">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($projects as $project)
                                                    <tr>
                                                        <td class="numeric">{{$project->title}}</td>
                                                        <td class="numeric">$<?php $sqlQuery = "SELECT sum(amount) as funds FROM project_funding WHERE project_from = ".$project->created_by." ";
                                                        $result = DB::select(DB::raw($sqlQuery)); 
                                                        print_r($result[0]->funds); ?></td>
                                                        <td class="numeric">$<?php $sqlQuery = "SELECT sum(amount) as donation FROM project_donations WHERE project_from = ".$project->created_by." ";
                                                        $result = DB::select(DB::raw($sqlQuery)); 
                                                        print_r($result[0]->donation); ?></td>                  
                                                        <td class="numeric">$0</td>                      
                                                        <td class="numeric">{{$project->progress}} %</td>             
                                                    </tr>                  
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>              
                                            <div class="alert alert-warning alert-dismissable" > No Data Found</div>              
                                            <nav class="text-center"></nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div><!-- Invite -->
                                <div class="row">
                                    <div class="col-md-12 invite-friends">
                                        <div class="ajax-loader" style="display:none"> 
                                            <img style="margin-top:200px" src="images/ajax-loader.gif"  />
                                        </div>
                                        <div class="panel panel-white container-wrapper dashboard-forms">
                                            <h1>Invitation</h1>
                                            <div id="secure_invite_form">
                                                <form action="/invite/send" method="post" class="secure_invite_form form-controll">    
                                                    {{csrf_field()}}                 
                                                    <div class="row refer-head">
                                                        <div class="col-md-5 col-sm-5 col-inputs">
                                                            <label class="">Name</label>
                                                        </div>          
                                                        <div class="col-md-5 col-sm-5 col-inputs">
                                                            <label class="">Email</label>
                                                        </div>          
                                                        <div class="col-md-2 col-sm-2 col-inputs">
                                                            <a href="#" class="underline details" onclick="add_invite();">ADD</a>
                                                        </div>         
                                                    </div>
                                                    <div class="row refer refer-body">
                                                        <div class="refer-col">
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <input name="name1" id="friend_name-0" value="" class="form-control" placeholder="Name" type="text" required="">
                                                            </div>      
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <input name="email1" id="friend_email-0" value="" class="form-control" placeholder="Email" type="email" required="">
                                                            </div>      
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <select name="groupid1" class="form-control" required="">
                                                                 <option value="1">Entrepreneur</option>   
                                                                 <option value="2">Organization</option>   
                                                                 <option value="3">Supporter</option>   
                                                                 <option value="4">Investor</option>   
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <?php for($i=2;$i<=10;$i++) { ?>
                                                        <div id="viewnew_row{{$i}}"></div>                                                        
                                                        <?php } ?>
                                                        <input name="row_count" id="row_count" value="1" type="hidden">
                                                        <div class="col-md-12 col-inputs">
                                                            <input id="secure_invite_send" name="submit" class="btn btn-primary" value="Invitation Sent" type="submit">
                                                        </div>
                                                    </div>
                                                    <fieldset></fieldset>
                                                </form>
                                            </div>
                                            <div class="sowresult">
                                                <table class="table table-bordered table-striped" >
                                                        <thead>
                                                            <tr class="first-tr">
                                                                <td>Invitations</td>
                                                                <td>Invitations  Accepted</td>
                                                                <td>Points Earned</td>
                                                                <!-- <td></td> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>  @if(count($user_invites) > 0)
                                                            <tr>
                                                                <td data-label="Invitations">{{$user_invites->count()}}</td>
                                                                <td data-label="Invitations  Accepted">{{$user_invites->where('invite_status','1')->count()}}</td>
                                                                <td data-label="Points Earned">{{$user_invites->where('invite_status','1')->count()}}</td>
                                                                <!-- <td data-label="Details"><a href="javascript:void(0)" class="underline details">Show Details</a></td> -->
                                                            </tr>
                                                            @else 
                                                            <tr>
                                                                <td data-label="Invitations">0</td>
                                                                <td data-label="Invitations  Accepted">0</td>
                                                                <td data-label="Points Earned">0</td>
                                                                <!-- <td data-label="Details"><a href="javascript:void(0)" class="underline details">Show Details</a></td> -->
                                                            </tr>
                                                            @endif
                                                            <!-- <tr class="invitation-list" style="display:none;" >
                                                                <td colspan="4" class="graybg-invite ">
                                                                    <div style="display: block;">
                                                                        <div class="row">
                                                                            <div class="col-md-12 invite-friend">
                                                                                <div class="panel-body">
                                                                                    <p>No invitations sent yet.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr> -->  
                                                        </tbody>
                                                    </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div><!-- Supporters List -->
                                <div class="row"> 
                                    <div class="panel panel-white">
                                        <div class="panel-body border-top" id="no-more-tables">
                                            <table id="example" class="table table-striped table-bordered cf" cellspacing="0" width="100%">
                                                <thead class="cf">
                                                    <tr>
                                                        <th class="numeric">Supporter Name</th>
                                                        <th class="numeric">Total Funds Donated</th>
                                                        <!-- <th class="numeric">Number of Hours Invested</th>
                                                        <th class="numeric">View Donation Details</th> -->
                                                        <th class="numeric">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_donations as $project_fund)                  
                                                    <tr>
                                                        <td data-title="Investor Name" class="numeric">{{$project_fund->firstname}} {{$project_fund->lastname}}</td>
                                                        <td data-title="Total Funds Invested" class="numeric">${{$project_fund->amount}}</td>
                                                        <!-- <td data-title="ROI" class="numeric">%</td>
                                                        <td data-title="View Fund Details" class="numeric"><a class="btn btn-default btn-primary" href="#">View Details</a></td> -->
                                                        <td >{{$project_fund->created_by}}</td>
                                                    </tr> 
                                                    @endforeach                 
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table> @if(count($project_donations) < 1)
                                            <div class="alert alert-warning alert-dismissable" > No Data Found</div>       
                                            @endif       
                                            <nav class="text-center"></nav>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div><!-- Investors -->
                                <div class="row"> 
                                    <div class="panel panel-white">
                                        <div class="panel-body border-top" id="no-more-tables">        
                                            <table id="example" class="table table-striped table-bordered cf" cellspacing="0" width="100%">
                                                <thead class="cf">
                                                    <tr>
                                                        <th class="numeric">Investor Name</th>
                                                        <th class="numeric">Total Funds Invested</th>
                                                        <!-- <th class="numeric">ROI</th>
                                                        <th class="numeric">View Fund Details</th> -->
                                                        <th class="numeric">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>     
                                                    @foreach($project_funding as $project_fund)                  
                                                    <tr>
                                                        <td data-title="Investor Name" class="numeric">{{$project_fund->firstname}} {{$project_fund->lastname}}</td>
                                                        <td data-title="Total Funds Invested" class="numeric">${{$project_fund->amount}}</td>
                                                        <!-- <td data-title="ROI" class="numeric">%</td>
                                                        <td data-title="View Fund Details" class="numeric"><a class="btn btn-default btn-primary" href="#">View Details</a></td> -->
                                                        <td >{{$project_fund->created_by}}</td>
                                                    </tr> 
                                                    @endforeach                 
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>               @if(count($project_funding) < 1)
                                            <div class="alert alert-warning alert-dismissable" > No Data Found</div>       
                                            @endif              
                                            <nav class="text-center"></nav>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div><!-- Blog -->
                                <div class="clearfix">
                                    <p><a href="{{url('/blog')}}/add" class="btn btn-primary pull-right" >Insert New Blog</a></p>
                                    <br><br>
                                </div>
                                
                                @if(count($blogs) > 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{$blog->name}}</td>
                                            <td>{{$blog->content}}</td>
                                            <td><a href="{{url('/')}}/blog/{{$blog->id}}/edit" class="btn btn-sm btn-primary" >Edit</a></td>
                                        </tr>  
                                        @endforeach            
                                    </tbody>
                                    <tfoot></tfoot>
                                </table> 
                                @else   
                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                @endif
                                <nav class="text-center"></nav>
                            </div>
                            <div><!-- Orders -->@if(count($orders) > 0)
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th class="order-number"><span class="nobr">Order</span></th>
                                <th class="order-date"><span class="nobr">Date</span></th>
                                <th class="order-status"><span class="nobr">Status</span></th>
                                <th class="order-total"><span class="nobr">Total</span></th>
                                <th class="order-actions"><span class="nobr">&nbsp;</span></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($orders as $order)
                                <tr class="order">
                                <td class="order-number" data-title="Order">#{{$order->id}}</td>
                                <td class="order-date" data-title="Date">
                                <time datetime="2018-09-19" title="1537379002">{{$order->created_at}}</time>

                                </td>
                                <td class="order-status" data-title="Status">
                                Processing
                                </td>
                                <td class="order-total" data-title="Total">
                                <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&#36;</span>{{$order->amount}}</span> for 1 item
                                </td>
                                <td class="order-actions" data-title="&nbsp;">
                                <a href="{{url('/order')}}/{{$order->id}}" class="btn btn-sm btn-primary" >View</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>
                                @else   
                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                @endif
                            </div>
                            <div><!-- Market Place -->
                              <p>Loading..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>   
            jQuery("button.invite_button").click(function(e) {
                jQuery("li#invite").click();
            }); 
            jQuery(document).ready(function($) {
                jQuery(".go_link").click(function(e) {
                    jQuery("li#"+jQuery(this).attr('data-href')).click();
                });
                jQuery(".go_updateprofile").click(function(e) {
                    jQuery("li#profile_update").click();
                });
                jQuery('.acf-repeater-add-row').removeClass('blue');
                jQuery('.acf-row').find('.order').hide();
            });         
            </script>
            <link href="{{url('/')}}/assets_new/includes/css/MetroJs.min.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets_new/includes/css/pages.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets_new/includes/css/fullcalendar.min.css" rel="stylesheet" type="text/css">
            <script src="{{url('/')}}/assets_new/includes/js/moment.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/js/fullcalendar.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/js/calendar.js"></script>             
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/application.js"></script>
            <script src="{{url('/')}}/assets_new/includes/js/perfect-scrollbar.jquery.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/MetroJs.min.js"></script>             
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.countTo.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.resize.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.canvas.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.image.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.categories.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.crosshair.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.errorbars.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.fillbetween.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.navigate.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.pie.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.selection.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.stack.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.symbol.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.threshold.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.colorhelpers.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery.flot.time.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/morris.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/raphael.2.1.0.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery-jvectormap-2.0.2.min.js"></script> 
            <script src="{{url('/')}}/assets_new/includes/plugins/flot/jquery-jvectormap-world-mill-en.js"></script> 
        </section>  
        
        <!-- End Inner Contents -->



<script>
jQuery(document).ready(function () {
jQuery('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = jQuery(this);
var $info = jQuery('#tabInfo');
var $name = jQuery('span', $info);
$name.text($tab.text());
$info.show();
}
});
jQuery('#verticalTab').easyResponsiveTabs({
type: 'default',
width: 'auto',
fit: true
});
});
</script>
<script type="text/javascript">

        function add_invite()
        {
                var count = document.getElementById("row_count").value;
                var add_count = parseInt(count)+1;
                //alert(count);
            
            var viewhtml = '';     
            viewhtml += '<div class="refer-col">';
            viewhtml += '<div class="col-md-4 col-sm-4 col-inputs">';
            viewhtml += '<input name="name'+add_count+'" id="friend_name-0" value="" class="form-control" placeholder="Name" type="text" required="">';
            viewhtml += '</div> ';     
            viewhtml += '<div class="col-md-4 col-sm-4 col-inputs">';
            viewhtml += '<input name="email'+add_count+'" id="friend_email-0" value="" class="form-control" placeholder="Email" type="email" required="">';
            viewhtml += '</div> ';     
            viewhtml += '<div class="col-md-4 col-sm-4 col-inputs">';
            viewhtml += '<select name="groupid'+add_count+'" class="form-control" required="">';
            viewhtml += '<option value="1">Entrepreneur</option> ';  
            viewhtml += '<option value="2">Organization</option> ';  
            viewhtml += '<option value="3">Supporter</option> ';  
            viewhtml += '<option value="4">Investor</option> ';  
            viewhtml += '</select>';
            viewhtml += '</div>';
            viewhtml += '</div>';
                    document.getElementById("row_count").value = add_count;
                    document.getElementById("viewnew_row"+add_count).innerHTML = viewhtml;
                
       
        }
    </script>
<script type="text/javascript">

      jQuery( 'ul.nav.nav-tabs  a' ).click( function ( e ) {
        e.preventDefault();
        jQuery( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          jQuery( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          // fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-17600125-2', 'openam.github.io');
      ga('send', 'pageview');
    </script>
    <script>

(function($)

{



// sales_chart =
//
//   {
//
//     data:
//
//     {
//
//       d1: []
//
//     },
//
//
//
//     plot: null,
//
//
//
//     options:
//
//     {
//
//       grid:
//
//       {
//
//         autoHighlight: false,
//
//         backgroundColor: null,
//
//         color: '#c6f4eb',
//
//         borderWidth: 0,
//
//         borderColor: "transparent",
//
//         clickable: true,
//
//         hoverable: true
//
//       },
//
//       series: {
//
//         lines: {
//
//           show: true,
//
//           fill: false,
//
//           lineWidth: 2,
//
//           steps: false
//
//         },
//
//         points: {
//
//           show:true,
//
//           radius: 3,
//
//           lineWidth: 2,
//
//           fill: true,
//
//           fillColor: "#000"
//
//         }
//
//       },
//
//       xaxis: {
//
//           mode: "time",
//
//     timeformat: "%d/%m"   },
//
//       yaxis: {
//
//         tickSize: 3000,
//
//         tickColor: '#F1F2F7'
//
//       },
//
//       legend: { show:false },
//
//       shadowSize: 0,
//
//       tooltip: true,
//
//       tooltipOpts: {
//
//         content: "%s : %y.3",
//
//         shifts: {
//
//           x: -30,
//
//           y: -50
//
//         },
//
//         defaultTheme: false
//
//       }
//
//     },
//
//
//
//     placeholder: "#sales-chart",
//
//
//
//     init: function()
//
//     {
//
//       this.options.colors = ["#3598db"];
//
//       this.options.grid.backgroundColor = null;
//
//
//
//       var that = this;
//
//
//
//       if (this.plot == null)
//
//       {

        //this.data.d1 = <?php //echo json_encode(''); ?>;



      // }

  //       //var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];
  //
  //     this.plot = jQuery.plot(
  //
  //       jQuery(this.placeholder),
  //
  //       [{
  //
  //         label: "Data 1",
  //
  //         data: this.data.d1,
  //
  //         lines: { fill: 0.00 },
  //
  //         points: { fillColor: "#fff" }
  //
  //       }], this.options);
  //
  //   }
  //
  // };





  function showTooltip(x, y, contents) {

    jQuery('<div class="chart-tooltip">$' + contents + '</div>').css( {

      position: 'absolute',

      display: 'none',

      top: y + 5,

      left: x + 5,

      opacity: 0.80

    }).appendTo("body").fadeIn(200);

  }





  jQuery('#sales-chart').bind("plothover", function (event, pos, item) {

    jQuery("#x").text(pos.x.toFixed(2));

    jQuery("#y").text(pos.y.toFixed(2));



    if (item) {

      if (previousPoint != item.dataIndex) {

        previousPoint = item.dataIndex;



        jQuery(".chart-tooltip").remove();

        var x = item.datapoint[0].toFixed(2),

          y = item.datapoint[1].toFixed(2);



        showTooltip(item.pageX, item.pageY, y);

      }

    }

    else {

      jQuery(".chart-tooltip").remove();

      previousPoint = null;

    }

  });





   // sales_chart.init();





})(jQuery);

        

jQuery(document).ready(function($) {

// var p = '';
// jQuery.post(ajaxurl,{ action:'gybi_get_investors_country'},function(data) {
//     var i =0;
//             //var plants = data;
//
//
// //console.log(array);
//         // }, 'json');
//     //Vector Maps
//     var map = function() {
// //var plants = [p];
//
//
//         var plants = [
//     {name: 'Investor 1, New York, USA', coords: [40.7127, -74.0059], status: 'closed', offsets: [0, 2]},
//     {name: 'Investor 2, Washington, USA<br/>', coords: [20.593684,78.96288], status: 'open', offsets: [0, 2]},
//     {name: 'Investor 2, Washington, USA\nInvestor 3, Boston, USA', coords: [47.5000, -120.5000], status: 'open', offsets: [0, 2]}
//     ];
//         console.log(plants);
//         jQuery('#map').vectorMap({
//             map: 'world_mill_en',
//             backgroundColor: 'transparent',
//             regionStyle: {
//                 initial: {
//                     fill: '#3598db',
//                 },
//                 hover: {
//                     "fill-opacity": 0.8
//                 }
//             },
//             markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
//                labels: false,
//          series: {
//       markers: [{
//         attribute: 'image',
//         scale: {
//           'closed': '/gybi/wp-content/uploads/ultimatemember/19/profile_photo-190.jpg?1429955016',
//           'activeUntil2018': '/gybi/wp-content/uploads/ultimatemember/6/profile_photo-190.jpg?1429955016',
//           'activeUntil2022': '/gybi/wp-content/uploads/ultimatemember/20/profile_photo-190.jpg?1429955016'
//         },
//         values: plants.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
//         legend: false
//       }]
//     }
//         });
//
//     };
//     map();
// }, 'json');
   

    jQuery('#calendar').fullCalendar({

       

            header: {

                left: 'prev,next today',

                center: 'title',

                right: 'month,agendaWeek,agendaDay'

            },

            editable: false,

            droppable: false, // this allows things to be dropped onto the calendar

            eventLimit: true, // allow "more" link when too many events

            events: {

            url : "",

            data : { action: "entterprenuer_events_details",  userid:   0},

            method: 'post'

        },

        eventClick:  function(event, jsEvent, view) {

            jQuery('#modalsTitle').html(event.title);

            jQuery('span#modelsDate').html(event.date);

            jQuery('span#startTime').html(event.starttime);

            jQuery('span#endTime').html(event.endtime);

            jQuery("span#messageContent").html(event.message);

            if(event.approve == '1'){

                jQuery("span.bodyResult").html("Scheduled");

            }else if(event.approve == '2'){

                jQuery("span.bodyResult").html("Rejected");

            }else{

                jQuery("span.bodyResult").html("Pending Approval");

            }

            jQuery("div#moduleReply").html(event.link);

            jQuery('#fullCalModals').modal();

        }

        });

    

});

        </script>
        
        
        
        <!--- Organization JAVAscript -->
        
        <script>
    jQuery(document).ready(function() {
        app.timer();
       app.perfectScroller();
       
       jQuery(".live-tile").liveTile();
       
    jQuery(".post-block").click(function(){
        var prId = jQuery(this).attr('data-id');
        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_decline" },function(info) {
            jQuery("div."+prId).text("Block");
         });
    });
    jQuery(".post-publish").click(function(){
        var prId = jQuery(this).attr('data-id');
        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
            jQuery("div."+prId).text("Publish");
         });
    });
    

       
    });
    </script>
    <script>
jQuery(document).ready(function(){
    jQuery(".post-publish").click(function(){
        var prId = jQuery(this).attr('data-id');
        jQuery.post(ajaxurl,{ projectid: prId,action: "project_status_update" },function(info) {
            jQuery("div."+prId).text("publish");
         });
    });
});
</script>
<!-- Supporter JAVAscript -->
<script>
jQuery(document).ready(function(e) {
    jQuery("li.update_profile").click(function(e) {
        window.location.hash = jQuery(this).attr('data-href');
    });
    setTimeout(function(){
        var n = window.location.hash.substring(1);
        if(n != undefined && n!= '') jQuery("li."+n).click();
    }, 20000);
});
</script>     

@endsection
