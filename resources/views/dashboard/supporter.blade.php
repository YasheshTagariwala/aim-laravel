@extends('layouts.master')
@section('title', 'Supporter Dashboard')
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

    
        
       <!-- Start Inner Contents -->                
        
        <section class="myaccount-header">
            <div class="container">
                <h1>Supporter</h1>
                <p class="col-md-8 col-md-offset-2">Create a supporter profile with your focus areas, Survey youth entrepreneurship and training needs, Share your publications with youth around the world.</p>
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
                                <li  class="side_menu">Dashboard</li>
                                <li class="side_menu" id="profile_update">Profile Update</li>
                                <li class="side_menu" id="donation">Donations</li>
                                <li class="side_menu" id="invite" >Invite</li>
                                <li class="side_menu" id="Appointments" >Appointments</li>
                                <li class="side_menu" id="Availability" >Availability</li>
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
                            <div id="dashboard"><!-- Dashboard -->
                                <div class="dashboard-section">
                                    <!--div class="dashboard-section-overlay">
                                        <div class="alert alert-danger fade in dashboard-alert" id="message">
                                            <p> Your Supporter profile is not yet created/approved. Please do it now by clicking <a href="javascript:void(0)" class="btn btn-danger go_updateprofile">Here</a> OR <a class="btn btn-success" href="#">Contact Administrator</a></p>
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
                                                <div class="content" style="padding-right:100px;"> <a href="javascipt:void(0)" class="go_updateprofile">Update Your  Profile</a><br /><br /><br /></div>
                                                <div class="icon"><i class="fa fa-file-text"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-turquoise">
                                                <div class="content" style="padding-right:100px;"> <a href="">Check Your Appointments</a><br /><br /><br /></div>
                                                <div class="icon"><i class="fa fa-calendar"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-blue">
                                                <div class="content" style="padding-right:100px;"> <a href="#">You Have 0 Unread Messages In Your Inbox.</a> <br /><br /></div>
                                                <div class="icon"><i class="fa fa fa-envelope"></i> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="dashboard-tile detail tile-purple">
                                                <div class="content" style="padding-right:100px;"><a href="#">Keep Availability Up To Date</a><br /><br /><br /></div>
                                                <div class="icon"><i class="fa fa-flag-o"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">Projects Supported</h4>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" style="min-height:200px;">          
                                                         @if(count($project_fundings) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Project</th>
                                                        <th style="width:15%;">Total Fund Donated</th>
                                                        <th>Progress</th>
                                                        <th style="width:20%;">Last Updated Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_fundings as $project_funding)
                                                    <tr>
                                                        <th style="">{{$project_funding->title}}</th>
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
                                            <div class="alert alert-warning alert-dismissable" style="margin-top:70px;">You haven't Donated in any projects.</div>@endif
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="javascript:vodi(0)" class="go_donation">View All Projects Donated</a> </div>
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
                                            <div class="alert alert-warning alert-dismissable" > There Are No Messages In Your Inbox</div>
                                            @endif
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="{{url('/')}}/messages"><i class="fa fa-arrow-right"></i> View All Messages</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Your Appointments</h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body" >
                                                    <!-- <div id="calendar"></div> -->

                                            @if(count($appoinments) > 0) 
                                            <table class="table"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:30%;">Id</th>
                                                        <th style="width:15%;">From Date</th>
                                                        <th style="width:20%;">From Time</th>
                                                        <th style="width:15%;">To Date</th>
                                                        <th style="width:20%;">To Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($appoinments as $appoinment)
                                                    <tr>
                                                        <td style="">{{$appoinment->id}}</td>
                                                        <td style="">{{$appoinment->fromdate}}</td>
                                                        <td style="">{{$appoinment->fromtime}}</td>
                                                        <td style="">{{$appoinment->todate}}</td>
                                                        <td style="">{{$appoinment->totime}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" > There Are No Appoinments In Your Schedule</div>
                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Projects you may be intrested in    </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body" style="height:250px;">
                                                    <div class="alert alert-warning alert-dismissable" style=""> No Data Found</div>
                                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                                        <div class="project-item">
                                                            <div class="project-image"> 
                                                                <a href="#" title="Title" rel="bookmark">                 
                                                                    <img src=""  alt="title"  class="img-responsive" style="height: 60px;"/>                  
                                                                    <img src="{{url('/')}}/assets_new/images/sample-company-logo.png"   alt="Title"/>
                                                                </a> 
                                                            </div>
                                                            <div class="col-sm-12 project-info-dashboard">
                                                                <h5 > <a href="#" title="title" rel="bookmark"> Title </a></h5>
                                                                <p class="uprofile-title">City State, Country</p>
                                                            </div>
                                                            <div style="margin-left:10px;"></div>
                                                        </div>
                                                    </div>          
                                                </div>
                                                <div class="panel-footer text-center"> <a href="#">View All Projects</a> </div>
                                            </div>
                                        </div> -->
                                        <div class="col-md-9">
                                            <div class="panel panel-white">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Organization Details </h3>
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
                                                                    <th >{{$organization->name}}</th>
                                                                    <td>{{$organization->firstname}} {{$organization->lastname}}</td>
                                                                    <td>{{$organization->email}}</td>
                                                                </tr>
                                                    @endforeach
                                                            </tbody>
                                                        </table>
                                            @else
                                                        <div class="alert alert-warning alert-dismissable">There Are No Organizations.</div>@endif
                                                    </div>                  
                                                </div>          
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel facebook-box">
                                                <div class="panel-body">
                                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000"  style="height:320px"> 
                                                        <span class="tile-title pull-right">Latest News</span> <i class="fa fa-rss"></i>              
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
                                <script>
                                jQuery(document).ready(function() {
                                    app.timer();
                                   app.perfectScroller();
                                   
                                   jQuery(".live-tile").liveTile();
                                   
                                });
                                jQuery(document).ready(function() { 
                                // Insert Event
                                jQuery('button.event_update').click(function(e) {
                                    
                                    var status = jQuery('input:radio[name=status]:checked').val();
                                    var eventid = jQuery('input.eventid').val();
                                    var message = jQuery("#message").val();
                                    var error = false;
                                    var strt = null;
                                    var end = null;
                                    // validation start
                                    if(status == null){
                                         jQuery("div.message").text("Please Select Status");
                                         return false;
                                    }
                                    if(message == '') {
                                         jQuery("div.message").text("Please enter Message");
                                         return false;
                                    }
                                    
                                    jQuery.post("",{status: status, eventid: eventid, message: message, action: 'update_events_details'}).done(function(info) {
                                         jQuery(this).attr('disabled','disabled');
                                         jQuery('#calendar').fullCalendar('refetchEvents');
                                         jQuery('button.btn-secondary').click();
                                    });
                                });
                                var source = null;
                                jQuery('#calendar').fullCalendar({
                                    events:  {
                                        url : "",
                                        data : { action: "events_details",  supportid:   },
                                        method: 'post'
                                    },
                                    header: {
                                        left: 'prev,next today',
                                        center: 'prev title next',
                                        right: ''
                                    },
                                    eventClick:  function(event, jsEvent, view) {
                                        jQuery('input.eventid').val(event.id);
                                        jQuery('#modalsTitle').html(event.title);
                                        jQuery('span#modelsDate').html(event.date);
                                        jQuery('span#startTime').html(event.starttime);
                                        jQuery('span#endTime').html(event.endtime);
                                        jQuery('#endTime').val('');
                                        jQuery('#message').val('');
                                        
                                        var newdate = moment(new Date()).format("YYYY-MM-DD");
                                        if(Date.parse(event.date) < Date.parse(newdate)) {
                                            jQuery("#modalaStatus").hide();
                                            jQuery("#modalaStatusResult").show();
                                            jQuery("button.event_update").hide();
                                            jQuery("#ModuleMessage").hide();
                                            jQuery(".moduleReply").hide();
                                            jQuery("span.modulestatus").text('Waiting');
                                        }
                                        else if(event.approve != '0'){
                                            jQuery("#modalaStatus").hide();
                                            jQuery("#modalaStatusResult").show();
                                            jQuery("button.event_update").hide();
                                            jQuery("#ModuleMessage").hide();
                                            jQuery(".moduleReply").show();
                                            if(event.approve == 1) jQuery("span.modulestatus").text('Scheduled');
                                            else jQuery("span.modulestatus").text('Rejected');
                                        }else{
                                            jQuery("#modalaStatus").show();
                                            jQuery("#modalaStatusResult").hide();
                                            jQuery("button.event_update").show();
                                            jQuery("#ModuleMessage").show();
                                            jQuery(".moduleReply").hide();
                                        }
                                        jQuery("span#messageContent").html(event.message);
                                        jQuery("#moduleReply").html(event.link);
                                        jQuery('#fullCalModals').modal();
                                    }
                                });
                                });
                                </script>
                                <style>div.fc-content:hover { cursor: pointer;}</style>
                                <div id="fullCalModals" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">Ã—</span> <span class="sr-only">close</span></button>
                                                <h4 id="modalaTitle" class="modal-title">Appointment Details</h4>
                                            </div>
                                            <div id="modalaBody" class="modal-body">
                                                <table class="table">
                                                    <tr>
                                                        <td><strong>Supporter</strong>:</td>
                                                        <td><span id="modalsTitle"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date</strong>: </td>
                                                        <td><span id="modelsDate"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Start Time</strong>: </td>
                                                        <td><span id="startTime"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>End Time</strong> :</td>
                                                        <td><span id="endTime"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Message</strong> : </td>
                                                        <td><span id="messageContent"></span></td>
                                                    </tr>
                                                    <tr class="moduleReply">
                                                        <td colspan="2" id="moduleReply"></td>
                                                    </tr>            
                                                    <tr  id="modalaStatus">
                                                        <td><strong>Status :</strong> </td>
                                                        <td><input type="radio" name="status" class="status" value="1" > Approve
                                                          <input type="radio" name="status" class="status" value="2" > Reject
                                                          <input type="hidden" name="eventid" class="eventid" value="" >
                                                          </td>
                                                    </tr>
                                                    <tr id="ModuleMessage">
                                                        <td><strong>Message :</strong></td>
                                                        <td><textarea name="message" id="message"> </textarea></td>
                                                    </tr>
                                                    <tr id="modalaStatusResult"  style="display:none">
                                                        <td><strong>Status</strong> :</td>
                                                        <td><span class="modulestatus">Approved</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button class="btn btn-primary event_update">Appointment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div id="update_form"><!-- Profile Update 
                                <img src="{{url('/')}}/assets_new/images/support-profile-update.png" alt="" /> -->
                                                <form id="post" class="" @if(count($supporter) > 0) action="{{url('/')}}/supporter/{{$supporter[0]->id}}/update" @else action="{{url('/')}}/supporter/store" @endif method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
                                                    <div class="form-group">
                                                        <label >Expertise <span class="acf-required">*</span></label>                             
                                                        <textarea name="expertise" cols="40" rows="10" class="form-control" required="" placeholder="Enter Your Expertise...">@if(count($supporter) > 0) {{$supporter[0]->expertise}} @endif</textarea>
                                                    </div>
                                                    <?php $categories = DB::table('categories')->get(); ?>
                                                    <div class="form-group">
                                                        <label for="acf-field_56d41973c0dbc">Category <span class="acf-required">*</span></label>
                                                        <ul class="acf-checkbox-list acf-bl">
                                                            @foreach($categories as $category)
                                                            @if($category->groupid == 1)
                                                            <li><label class="selectit"><input name="category" value="{{$category->id}}" type="radio" @if(count($supporter) > 0) @if($supporter[0]->category == $category->id) checked="" @endif @endif > {{$category->name}}</label></li>@endif 
                                                            @endforeach
                                                            
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="acf-field_56d41973c0dbc">Areas of Interest  <span class="acf-required">*</span></label>
                                                        <ul class="acf-checkbox-list acf-bl">
                                                            
                                                            @foreach($categories as $category)
                                                            @if($category->groupid == 3)
                                                            <li><label class="selectit"><input name="area_interest" value="{{$category->id}}" type="radio" @if(count($supporter) > 0) @if($supporter[0]->area_interest == $category->id) checked="" @endif @endif > {{$category->name}}</label></li>@endif 
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label > Country Of Interest  <span class="acf-required">*</span></label>
                                                        
                                                          <div class="selectBox" onclick="showCheckboxes()">
                                                          <select class="form-control">
                                                          <option>@if(count($supporter) > 0) {{$supporter[0]->country_interest}} @else Select Country @endif</option>
                                                          </select>
                                                          <div class="overSelect"></div>
                                                          </div>
                                                          <div id="checkboxes">
                                                          @foreach($countries as $country)
                                                          <label for="country{{$country->id}}">&nbsp<input type="checkbox" name="country[]"  id="country{{$country->id}}" value="{{$country->name}}"  @if(count($supporter) > 0) <?php if(strpos(strtolower($supporter[0]->country_interest),strtolower($country->name)) !== false){ ?> checked="" <?php } ?> @endif/>&nbsp{{$country->name}}</label>
                                                          @endforeach
                                                          </div>
                                                    </div>
                                                    <div class="form-group">
                                                    <?php $womenstages = DB::table('women_stage')->get(); ?>
                                                        <label for="acf-field_56d41973c0dbc">Business Stage  <span class="acf-required">*</span></label>
                                                        <ul class="acf-checkbox-list acf-bl">
                                                            
                                                            @foreach($womenstages as $womenstage)
                                                            <li><label class="selectit"><input name="women_stage" value="{{$womenstage->id}}" type="radio" @if(count($supporter) > 0) @if($supporter[0]->women_stage == $womenstage->id) checked="" @endif @endif > {{$womenstage->name}}</label></li> 
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="form-group">
                                                        <label >What do you expect ?  <span class="acf-required">*</span></label>                                
                                                        <textarea name="expect" cols="40" rows="10" class="form-control" required="" placeholder="Enter Your Expectations...">@if(count($supporter) > 0) {{$supporter[0]->expectation}} @endif</textarea>
                                                    </div>
                                                    <input value="Save" class="btn btn-primary" type="submit">
                                                </form>
                            </div>
                            <div><!-- Donations -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-white">            
                                            <div class="panel-body">              
                                                @if(count($project_fundings) > 0) 
                                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"  >
                                                <thead>
                                                    <tr >
                                                        <th style="width:20%;">Fund Raised for</th>
                                                        <th style="width:15%;">Total Fund Donated</th>
                                                        <th>Progress</th>
                                                        <th>Payment Type</th>
                                                        <th style="width:20%;">Funded Date</th>
                                                        <th style="width:20%;">Comments</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($project_fundings as $project_funding)
                                                    <tr>
                                                        <th style=""><a title="View Project Status" href="#">{{$project_funding->title}}</a></th>
                                                        <td>${{$project_funding->amount}}</td>
                                                        <td>Donation</td>
                                                        <td> 
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$project_funding->progress}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project_funding->progress}}%"></div>
                                                            </div>
                                                        </td>
                                                        <td>{{$project_funding->updated_at}}</td>
                                                        <td>${{$project_funding->comments}}</td>
                                                    </tr>@endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <div class="alert alert-warning alert-dismissable" style="margin-top:70px;">You haven't Donated in any projects.</div>@endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="invite"><!-- Invite -->
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
                            </div>
                            <div id="Appointments"><!-- Invite -->
                                <div><!-- Invite -->
                                    <div class="row">
                                        <div class="col-md-12 invite-friends">
                                            <div class="ajax-loader" style="display:none"> 
                                                <img style="margin-top:200px" src="{{url('/')}}/assets_new/images/ajax-loader.gif"  />
                                            </div>
                                            <div class="panel panel-white container-wrapper dashboard-forms">
                                                <h1>Appointments</h1>
                                                <div id="secure_invite_form">
                                                <form action="/supporter/appoinment" method="post" class="secure_invite_form form-controll">    
                                                    {{csrf_field()}}               
                                                    <div class="row refer-head">
                                                        <div class="col-md-4 col-sm-4 col-inputs">
                                                            <label class="">From Date</label>
                                                        </div>          
                                                        <div class="col-md-2 col-sm-2 col-inputs">
                                                            <label class="">From Time</label>
                                                        </div>   
                                                        <div class="col-md-4 col-sm-4 col-inputs">
                                                            <label class="">To Date</label>
                                                        </div>          
                                                        <div class="col-md-2 col-sm-2 col-inputs">
                                                            <label class="">To Time</label>
                                                        </div>     
                                                    </div>
                                                    <div class="row refer refer-body">
                                                        <div class="refer-col">
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <input name="fdate" id="friend_name-0" value="" class="form-control" placeholder="Name" type="date" required="">
                                                            </div>         
                                                            <div class="col-md-2 col-sm-4 col-inputs">
                                                                <select name="ftime" class="form-control" required="">
                                                                <?php for ($time=0; $time < 12; $time++) { ?>
                                                                 <option value="{{$time}} AM">{{$time}} AM</option>
                                                                 <?php } ?>    
                                                                <?php for ($time=12; $time < 24; $time++) { ?> 
                                                                 <option value="{{$time}} PM">{{$time}} PM</option>  
                                                                 <?php } ?> 
                                                                </select>
                                                            </div>  
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <input name="tdate" id="friend_email-0" value="" class="form-control" placeholder="Email" type="date" required="">
                                                            </div>      
                                                            <div class="col-md-2 col-sm-4 col-inputs">
                                                                <select name="ttime" class="form-control" required="">
                                                                <?php for ($time=0; $time < 12; $time++) { ?>
                                                                 <option value="{{$time}} AM">{{$time}} AM</option>
                                                                 <?php } ?>    
                                                                <?php for ($time=12; $time < 24; $time++) { ?> 
                                                                 <option value="{{$time}} PM">{{$time}} PM</option>  
                                                                 <?php } ?> 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-inputs">
                                                            <input id="secure_invite_send" name="submit" class="btn btn-primary" value="Make Appointment" type="submit">
                                                        </div>
                                                    </div>
                                                    <fieldset></fieldset>
                                                </form>
                                                </div>
                                                <div class="sowresult">
                                                    <table class="table table-bordered table-striped" >
                                                        <thead>
                                                            <tr class="first-tr">
                                                                <td>Appoinment From</td>
                                                                <td>Appoinment To</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>  
                                                            @if(count($appoinments) > 0)
                                                            @foreach($appoinments as $appoinment)
                                                            <tr>
                                                                <td data-label="Invitations">{{$appoinment->fromdate}}/{{$appoinment->fromtime}}</td>
                                                                <td data-label="Invitations">{{$appoinment->todate}}/{{$appoinment->totime}}</td>
                                                            </tr>
                                                            @endforeach
                                                            @else 
                                                            <tr>
                                                                <td data-label="Invitations">0</td>
                                                                <td data-label="Invitations  Accepted">0</td>
                                                            </tr>
                                                            @endif 
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div id="Availability"><!-- Invite -->
                                <div><!-- Invite -->
                                    <div class="row">
                                        <div class="col-md-12 invite-friends">
                                            <div class="ajax-loader" style="display:none"> 
                                                <img style="margin-top:200px" src="{{url('/')}}/assets_new/images/ajax-loader.gif"  />
                                            </div>
                                            <div class="panel panel-white container-wrapper dashboard-forms">
                                                <h1>Availablity</h1>
                                                <div id="secure_invite_form">
                                                <form action="/supporter/availablity" method="post" class="secure_invite_form form-controll">    
                                                    {{csrf_field()}}  
                                                    <div class="row refer refer-body">
                                                        <div class="refer-col">
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <label>From Date</label>
                                                                <input name="fdate" id="friend_name-0" value="" class="form-control" placeholder="Name" type="date" required="">
                                                            </div>         
                                                            <div class="col-md-2 col-sm-4 col-inputs">
                                                                <label>From Time</label>
                                                                <select name="ftime" class="form-control" required="">
                                                                <?php for ($time=0; $time < 12; $time++) { ?>
                                                                 <option value="{{$time}} AM">{{$time}} AM</option>
                                                                 <?php } ?>    
                                                                <?php for ($time=12; $time < 24; $time++) { ?> 
                                                                 <option value="{{$time}} PM">{{$time}} PM</option>  
                                                                 <?php } ?> 
                                                                </select>
                                                            </div>  
                                                            <div class="col-md-4 col-sm-4 col-inputs">
                                                                <label>To Date</label>
                                                                <input name="tdate" id="friend_email-0" value="" class="form-control" placeholder="Email" type="date" required="">
                                                            </div>      
                                                            <div class="col-md-2 col-sm-4 col-inputs">
                                                                <label>To Time</label>
                                                                <select name="ttime" class="form-control" required="">
                                                                <?php for ($time=0; $time < 12; $time++) { ?>
                                                                 <option value="{{$time}} AM">{{$time}} AM</option>
                                                                 <?php } ?>    
                                                                <?php for ($time=12; $time < 24; $time++) { ?> 
                                                                 <option value="{{$time}} PM">{{$time}} PM</option>  
                                                                 <?php } ?> 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-inputs">
                                                            <input id="secure_invite_send" name="submit" class="btn btn-primary" value="Make Availability" type="submit">
                                                        </div>
                                                    </div>
                                                    <fieldset></fieldset>
                                                </form>
                                                </div>
                                                <div class="sowresult">
                                                    <table class="table table-bordered table-striped" >
                                                        <thead>
                                                            <tr class="first-tr">
                                                                <td>Appoinment From</td>
                                                                <td>Appoinment To</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>  
                                                            @if(count($availablity) > 0)
                                                            @foreach($availablity as $appoinment)
                                                            <tr>
                                                                <td data-label="Invitations">{{$appoinment->fromdate}}/{{$appoinment->fromtime}}</td>
                                                                <td data-label="Invitations">{{$appoinment->todate}}/{{$appoinment->totime}}</td>
                                                            </tr>
                                                            @endforeach
                                                            @else 
                                                            <tr>
                                                                <td data-label="Invitations">0</td>
                                                                <td data-label="Invitations  Accepted">0</td>
                                                            </tr>
                                                            @endif 
                                                        </tbody>
                                                    </table>
                                                </div>
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
            jQuery("button.invite_button").click(function(e) {
                jQuery("li#invite").click();
            }); 
            jQuery(document).ready(function($) {

            jQuery(".go_updateprofile").click(function(e) {
                jQuery("li#profile_update").click();
            });

            jQuery(".go_donation").click(function(e) {      
                jQuery("li#donation").click();
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

        this.data.d1 = <?php $jsondata=''; echo json_encode($jsondata); ?>;



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

            data : { action: "entterprenuer_events_details",  userid:   },

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