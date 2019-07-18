@extends('layouts.master')
@section('title', 'Investor Dashboard')
@section('pagebody')

        <style type="text/css">
          .multiselect {
          width: 200px;
          }

          .selectBox {
          position: relative;
          }

          .selectBox select {
          width: 100%;
          font-weight: bold;
          }

          .overSelect {
          position: absolute;
          left: 0;
          right: 0;
          top: 0;
          bottom: 0;
          }

          #checkboxes {
          display: none;
          border: 1px #dadada solid;
          }

          #checkboxes label {
          display: block;
          }

          #checkboxes label:hover {
          background-color: #1e90ff;
          }
        </style>
    
        
        <section class="myaccount-header">
            <div class="container">
                <h1>Investor</h1>
                <p class="col-md-8 col-md-offset-2">Create a investor profile with your criteria, Browse our catalog of investment opportunities, Sort, analyze, and compare opportunities in minutes.</p>
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
                    <div id="verticalTab"class="v-tabs">
                        <div class="vtab-nav clearfix"> 
                            <ul class="resp-tabs-list clearfix">
                                <li  class="side_menu">Dashboard</li>
                                <li class="side_menu profile_update" id="profile_update">Update Profile</li>
                                <li class="side_menu" id="invested">Invested Projects</li>
                                <li class="side_menu" id="invite" >Invite</li>
                                <li class="side_menu" id="blog">Blog</li>
                                <li class="side_menu" id="Orders"><a href="#">Orders</a></li>
                                <li class="side_menu" id="Orders"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li></a>
                            </ul>
                            <ul class="resp-tabs-list right-tab  clearfix">
                                <li class="side_menu" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                                <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>               
                                <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>            
                        <div class="resp-tabs-container">
                            <div id="dashboard" class="clearfix"><!-- Dashboard 
                                <h5><a href="#" title="Click to view ">Title</a></h5>-->
                                <div class="dashboard-section">
                                    <!--div class="dashboard-section-overlay">
                                        <div class="alert alert-danger fade in dashboard-alert" id="message">
                                            <p> Your Investor profile is not yet created/approved. Please do it now by clicking <a href="javascript:void(0)" class="btn btn-danger go_updateprofile">Here</a> OR <a class="btn btn-success" href="#">Contact Administrator</a></p>
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
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-red">
                                                <div class="content" style="padding-right:100px;"> <a href="javascript:boid(0)" class="go_updateprofile">Update Your Business Profile</a><br /><br /><br /></div>
                                                <div class="icon"><i class="fa fa-file-text"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-turquoise">
                                                <div class="content" style="padding-right:100px;"> <a href="javascript:boid(0)" class="go_invested">Check The Status of Funded Projects</a><br /><br /><br /></div>
                                            <div class="icon"><i class="fa fa-flag"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-blue">
                                                <div class="content" style="padding-right:100px;" > <a href="{{ url('/messages') }}">You Have 0 Unread Messages In Your Inbox.</a> <br /><br /></div>
                                                <div class="icon"><i class="fa fa fa-envelope"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-purple">
                                                <div class="content" style="padding-right:100px;">
                                                    <div class="text-left "  style="font-size:30px;">$<span class="timer" data-to="0" data-speed="2500"></span></div>
                                                    <a href="javascript:boid(0)" class="go_invested">Total Fund Invested So Far</a> 
                                                </div>
                                                <div class="icon"><i class="fa fa-bar-chart-o"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Projects Invested</h4>          
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" style="min-height:200px;">  
                                                        @if(count($project_fundings) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Project</th>
                                                        <th style="width:15%;">Total Fund Invested</th>
                                                        <th>Progress</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_fundings as $project_funding)
                                                    <tr>
                                                        <th style=""><a title="View Project Status" href="#">{{$project_funding->title}}</a></th>
                                                        <td>${{$project_funding->amount}}</td>
                                                        <td> 
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$project_funding->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project_funding->progress}}%"></div>
                                                            </div>
                                                        </td>
                                                        <td>{{$project_funding->updated_at}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" style="margin-top:70px;">You haven't Invested in any projects.</div>@endif
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="javascript:boid(0)" class="go_invested">View All Projects Invested</a> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Latest Messages</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="r3_notification db_box" style="max-height:200px; min-height:200px;">
                                                        @if(count($recentmsgs) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Title</th>
                                                        <th style="width:15%;">Content</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($recentmsgs as $recentmsg)
                                                    <tr>
                                                        <th style="">{{$recentmsg->subject}}</th>
                                                        <td>${{$recentmsg->message}}</td>
                                                        <td>{{$recentmsg->updated_at}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" > There Are No Messages In Your Inbox</div>@endif
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="{{url('/messages')}}"><i class="fa fa-arrow-right"></i> View All Messages</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Projets Details </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" style="min-height:200px;">                 
                                                        
                                                         @if(count($organizations) > 0)                   
                                                        <table class="table disktop-view">
                                                            <thead>
                                                                <tr>
                                                                    <th>Organization Logo</th>
                                                                    <th>Organization Name</th>
                                                                    <th>Contact Name</th>
                                                                    <th>Email</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>  
                                                    @foreach($organizations as $organization)                
                                                                <tr>
                                                                    <td><img src="{{$organization->org_logo}}" class="gravatar img-circle  avatar avatar-50 um-avatar" width="50" height="50" alt=""></td>
                                                                    <th ><a href="#">{{$organization->name}}</a></th>
                                                                    <td>{{$organization->firstname}} {{$organization->lastname}}</td>
                                                                    <td>{{$organization->email}}</td>
                                                                </tr>
                                                    @endforeach
                                                            </tbody>
                                                        </table>
                                            @else
                                                        <div class="alert alert-warning alert-dismissable">You Are Not Currently Supporting Any Projects.</div>@endif  
                                                    </div>              
                                                </div>        
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
                                </div>
                            </div>
                            <div class="clearfix"><!-- Profile Update 
                                <img src="{{url('/')}}/assets_new/images/support-profile-update.png" alt="" /> -->
                                                <form id="post" class="" @if(count($investor) > 0) action="{{url('/')}}/investor/{{$investor[0]->id}}/update" @else action="{{url('/')}}/investor/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
                                                    <div class="form-group">
                                                        <label >Expertise <span class="acf-required">*</span></label>                             
                                                        <textarea name="expertise" cols="40" rows="10" class="form-control" required="" placeholder="Enter Your Expertise...">@if(count($investor) > 0) {{$investor[0]->expertise}} @endif</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label > Investment Capital  <span class="acf-required">*</span></label>                              
                                                        <input name="capital_invesment" @if(count($investor) > 0) value="{{$investor[0]->capital_invesment}}" @else value="" @endif size="40" class="form-control" type="text" required="" placeholder="Enter Your Investment Capital...">
                                                    </div>
                                                    <?php $categories = DB::table('categories')->get(); ?>
                                                    <div class="form-group">
                                                        <label for="acf-field_56d41973c0dbc">Interested Industries  <span class="acf-required">* (Select you interested capitalist/investor)</span></label>
                                                        <ul class="acf-checkbox-list acf-bl">
                                                            <li><label class="selectit"><input name="category" value="Angel Investor" type="radio" @if(count($investor) > 0) @if($investor[0]->category == "Angel Investor") checked="" @endif @endif>Angel Investor</label></li>
                                                            <li><label class="selectit"><input name="category" value="Bank/MFI" type="radio"@if(count($investor) > 0) @if($investor[0]->category == "Bank/MFI") checked="" @endif @endif>Bank/MFI</label></li>
                                                            <li><label class="selectit"><input name="category" value="Peer to Peer Lender" type="radio" @if(count($investor) > 0) @if($investor[0]->category == "Peer to Peer Lender") checked="" @endif @endif>Peer to Peer Lender</label></li>
                                                            <li><label class="selectit"><input name="category" value="Personal Investor" type="radio" @if(count($investor) > 0) @if($investor[0]->category == "Personal Investor") checked="" @endif @endif>Personal Investor</label></li>
                                                            <li><label class="selectit"><input name="category" value="Venture Capitalist" type="radio" @if(count($investor) > 0) @if($investor[0]->category == "Venture Capitalist") checked="" @endif @endif>Venture Capitalist</label></li>
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label > Country Of Interest  <span class="acf-required">*</span></label>
                                                          <div class="selectBox" onclick="showCheckboxes()">
                                                          <select class="form-control">
                                                          <option>@if(count($investor) > 0) {{$investor[0]->country_interest}} @else Select Country @endif</option>
                                                          </select>
                                                          <div class="overSelect"></div>
                                                          </div>
                                                          <div id="checkboxes">
                                                          @foreach($countries as $country)
                                                          <label for="country{{$country->id}}">&nbsp<input type="checkbox" name="country[]"  id="country{{$country->id}}" value="{{$country->name}}"  @if(count($investor) > 0) <?php if(strpos(strtolower($investor[0]->country_interest),strtolower($country->name)) !== false){ ?> checked="" <?php } ?> @endif/>&nbsp{{$country->name}}</label>
                                                          @endforeach
                                                          </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label > ROI  <span class="acf-required">*</span></label>                              
                                                        <input name="roi" @if(count($investor) > 0) value="{{$investor[0]->roi}}" @else value="" @endif size="40" class="form-control" type="text" required="" placeholder="Enter Your ROI...">
                                                    </div>
                                                    <div class="form-group">
                                                    <?php $womenstages = DB::table('women_stage')->get(); ?>
                                                        <label for="acf-field_56d41973c0dbc">Business Stage  <span class="acf-required">* (Where you currently stand in you business/start up)</span></label>
                                                        <ul class="acf-checkbox-list acf-bl">
                                                            
                                                            @foreach($womenstages as $womenstage)
                                                            <li><label class="selectit"><input name="women_stage" value="{{$womenstage->id}}" type="radio" @if(count($investor) > 0) @if($investor[0]->women_stage == $womenstage->id) checked="" @endif @endif > {{$womenstage->name}}</label></li> 
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >How do you want to be involved?  <span class="acf-required">*</span></label>                                
                                                        <textarea name="expect" cols="40" rows="10" class="form-control" required="" placeholder="Enter your expectations...">@if(count($investor) > 0) {{$investor[0]->expectation}} @endif</textarea>
                                                    </div>
                                                    <input value="Save" class="btn btn-primary" type="submit">
                                                </form>
                            </div>
                            <div class="clearfix"><!-- Invested Projects -->
                                <div class="row ">
                                    <div class="col-xs-12">
                                        <div class="table-responsive project-stats" style="min-height:200px; padding:20px;"> 
                                        @if(count($project_fundings) > 0) 
                                            <table class="table dataTable"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Project</th>
                                                        <th style="width:15%;">Total Fund Invested</th>
                                                        <th>Progress</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_fundings as $project_funding)
                                                    <tr>
                                                        <th style=""><a title="View Project Status" href="#">{{$project_funding->title}}</a></th>
                                                        <td>${{$project_funding->amount}}</td>
                                                        <td> 
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$project_funding->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project_funding->progress}}%"></div>
                                                            </div>
                                                        </td>
                                                        <td>{{$project_funding->updated_at}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" style="margin-top:70px;">You haven't Invested in any projects.</div>@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div><!-- Invite -->
                                <div class="row">
                                    <div class="col-md-12 invite-friends">
                                        <div class="ajax-loader" style="display:none"> 
                                            <img style="margin-top:200px" src="{{url('/')}}/assets_new/images/ajax-loader.gif"  />
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
                            <div><!-- Orders -->
                                @if(count($orders) > 0)
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
                            <div><!-- MarketPlace -->
                                <p>Loading..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>    
            jQuery(document).ready(function($) {

            jQuery(".go_updateprofile").click(function(e) {
                jQuery("li.profile_update").click();
            });
            jQuery(".go_invested").click(function(e) {
                jQuery("li#invested").click();
            });

            app.timer();
            app.perfectScroller();

            jQuery(".live-tile").liveTile();
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
         <!--    <script src="{{url('/')}}/assets_new/js/jquery-3.3.1.min.js"></script>   -->
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
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
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



sales_chart =

  {

    data:

    {

      d1: []

    },



    plot: null,



    options:

    {

      grid:

      {

        autoHighlight: false,

        backgroundColor: null,

        color: '#c6f4eb',

        borderWidth: 0,

        borderColor: "transparent",

        clickable: true,

        hoverable: true

      },

      series: {

        lines: {

          show: true,

          fill: false,

          lineWidth: 2,

          steps: false

        },

        points: {

          show:true,

          radius: 3,

          lineWidth: 2,

          fill: true,

          fillColor: "#000"

        }

      },

      xaxis: {

          mode: "time",

    timeformat: "%d/%m"   },

      yaxis: {

        tickSize: 3000,

        tickColor: '#F1F2F7'

      },

      legend: { show:false },

      shadowSize: 0,

      tooltip: true,

      tooltipOpts: {

        content: "%s : %y.3",

        shifts: {

          x: -30,

          y: -50

        },

        defaultTheme: false

      }

    },



    placeholder: "#sales-chart",



    init: function()

    {

      this.options.colors = ["#3598db"];

      this.options.grid.backgroundColor = null;



      var that = this;



      if (this.plot == null)

      {

        this.data.d1 = <?php $jsondata = ''; echo json_encode($jsondata); ?>;



      }

        //var months = ["January", "February", "March", "April", "May", "Juny", "July", "August", "September", "October", "November", "December"];

      this.plot = jQuery.plot(

        jQuery(this.placeholder),

        [{

          label: "Data 1",

          data: this.data.d1,

          lines: { fill: 0.00 },

          points: { fillColor: "#fff" }

        }], this.options);

    }

  };





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





   sales_chart.init();





})(jQuery);

        

jQuery(document).ready(function($) {

var p = '';
jQuery.post(ajaxurl,{ action:'gybi_get_investors_country'},function(data) {
    var i =0;
            //var plants = data;


//console.log(array);
        // }, 'json');
    //Vector Maps
    var map = function() {
//var plants = [p];     

        
        var plants = [
    {name: 'Investor 1, New York, USA', coords: [40.7127, -74.0059], status: 'closed', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA<br/>', coords: [20.593684,78.96288], status: 'open', offsets: [0, 2]},
    {name: 'Investor 2, Washington, USA\nInvestor 3, Boston, USA', coords: [47.5000, -120.5000], status: 'open', offsets: [0, 2]}
    ];
        console.log(plants);
        jQuery('#map').vectorMap({
            map: 'world_mill_en',
            backgroundColor: 'transparent',
            regionStyle: {
                initial: {
                    fill: '#3598db',
                },
                hover: {
                    "fill-opacity": 0.8
                }
            },
            markers: plants.map(function(h){ return {name: h.name, latLng: h.coords} }),
               labels: false,
         series: {
      markers: [{
        attribute: 'image',
        scale: {
          'closed': '/gybi/wp-content/uploads/ultimatemember/19/profile_photo-190.jpg?1429955016',
          'activeUntil2018': '/gybi/wp-content/uploads/ultimatemember/6/profile_photo-190.jpg?1429955016',
          'activeUntil2022': '/gybi/wp-content/uploads/ultimatemember/20/profile_photo-190.jpg?1429955016'
        },
        values: plants.reduce(function(p, c, i){ p[i] = c.status; return p }, {}),
        legend: false
      }]
    }
        });

    };
    map();
}, 'json');
   

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

            data : { action: "entterprenuer_events_details",  userid:  },

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

            jQuery("button.invite_button").click(function(e) {
                jQuery("li#invite").click();
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

<script type="text/javascript">
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

</script>        

@endsection
