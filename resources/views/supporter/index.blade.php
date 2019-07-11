@extends('layouts.master')
@section('title', 'Supporter Dashboard')
@section('pagebody')

    
        
       <!-- Start Inner Contents -->                
        
        <section class="myaccount-header">
            <div class="container">
                <h1>Supporter</h1>
                <p class="col-md-8 col-md-offset-2">Create a supporter profile with your focus areas, Survey youth entrepreneurship and training needs, Share your publications with youth around the world.</p>
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
                                <li class="side_menu" id="blog">Blog</li>
                                <li class="side_menu" id="Orders"><a href="#">Orders</a></li>
                                <li class="side_menu" id="Orders"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li></a>
                            </ul>
                            <ul class="resp-tabs-list right-tab  clearfix">
                                <li class="side_menu" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                                <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>                 
                                <li class="logout"><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
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
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Project</th>
                                                                    <th>Progress</th>
                                                                    <th>Last Updated Date</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th ><a title="View Project Status" href="#">Title</a></th>
                                                                    <td>
                                                                        <div class="progress progress-sm">
                                                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Date</td>
                                                                </tr>              
                                                            </tbody>
                                                        </table>              
                                                        <div class="alert alert-warning alert-dismissable" style="">No data available.</div>          
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
                                                        <div class="alert alert-warning alert-dismissable" > There Are No Messages In Your Inbox</div>                
                                                        <ul class="list-unstyled notification-widget" style="height:200px;">                    
                                                            <li class="unread "> 
                                                                <a href="">
                                                                    <div class="user-img"> ID </div>
                                                                    <div> <span class="name"> <strong>Title</strong> </span> <span class="desc small"> Content </span> </div>
                                                                </a> 
                                                                <span class="time small">Date</span>
                                                            </li>                   
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-footer text-center"> <a href="#"><i class="fa fa-arrow-right"></i> View All Messages</a> </div>
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
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
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
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel facebook-box">
                                                <div class="panel-body">
                                                    <div class="live-tile" data-mode="flip" data-speed="750" data-delay="3000"  style="height:320px"> 
                                                        <span class="tile-title pull-right">Latest News</span> <i class="fa fa-rss"></i>              
                                                        <div>
                                                            <h2 class="no-m"><a href="#">Title</a></h2>
                                                            <span class="tile-date">Jun 25 12:45 PM</span>
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
                                                    <h3 class="panel-title">Projets Details </h3>
                                                    <div class="actions pull-right"> <i class="fa fa-chevron-down"></i> </div>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive project-stats" style="min-height:200px;">                    
                                                        <table class="table disktop-view">
                                                            <thead>
                                                                <tr>
                                                                    <th>Organization Logo</th>
                                                                    <th>Organization Name</th>
                                                                    <th>Contact Name</th>
                                                                    <th>Address</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>                  
                                                                <tr>
                                                                    <td><a href="#"><img src="#" class="gravatar img-circle  avatar avatar-50 um-avatar" width="50" height="50" alt=""></a></td>
                                                                    <th ><a href="#">Title</a></th>
                                                                    <td>Last Name</td>
                                                                    <td>User Address</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="frame_1" >
                                                            <div class="col-md-12">                
                                                                <div class="div_1">
                                                                    <h4>Organization Logo</h4>
                                                                    <hr>
                                                                    <a href="#"><img src="" class="gravatar img-circle  avatar avatar-50 um-avatar" width="50" height="50" alt=""></a>
                                                                </div>
                                                                <div class="div_1">
                                                                    <h4>Organization Name</h4>
                                                                    <hr>
                                                                    <a href="#">Title</a>
                                                                </div>
                                                                <div class="div_1">
                                                                    <h4>Contact Name</h4>
                                                                    <hr>
                                                                    <p>Last Name</p> 
                                                                </div>
                                                                <div class="div_1">
                                                                    <h4>Address</h4>
                                                                    <hr>
                                                                    <p> User Address </p> 
                                                                </div>
                                                            </div>
                                                        </div>  
                                                        <div class="alert alert-warning alert-dismissable">You Are Not Currently Supporting Any Projects.</div>
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
                             <div id="update_form"><!-- Profile Update -->
                                <img src="{{url('/')}}/assets_new/images/support-profile-update.png" alt="" />
                            </div>
                            <div><!-- Donations -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-white">            
                                            <div class="panel-body">              
                                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Fund Raised for</th>
                                                            <th>Funded Date</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><a href="#">Title</a></td>
                                                            <td>Date</td>
                                                            <td>Donation </td>
                                                            <td> $100 </td>
                                                            <td>Comment</td>
                                                        </tr>                  
                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>              
                                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
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
                                                    <form action="#" method="post" class="secure_invite_form form-controll">                    
                                                        <div class="row refer-head">
                                                            <div class="col-md-6 col-sm-6 col-inputs">
                                                                <label class="">Name</label>
                                                            </div>          
                                                            <div class="col-md-6 col-sm-6 col-inputs">
                                                                <label class="">Email</label>
                                                                <a href="#" class="invfr_add button">+</a>
                                                            </div>          
                                                        </div>
                                                        <div class="row refer refer-body">
                                                            <div class="refer-col">
                                                                <div class="col-md-6 col-sm-6 col-inputs">
                                                                    <input name="" id="friend_name-0" value="" class="form-control" placeholder="Name" type="text">
                                                                </div>      
                                                                <div class="col-md-6 col-sm-6 col-inputs">
                                                                    <input name="" id="friend_email-0" value="" class="form-control" placeholder="Email" type="email">
                                                                </div>
                                                            </div>
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
                                                                <td></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>  
                                                            <tr>
                                                                <td data-label="Invitations">8</td>
                                                                <td data-label="Invitations  Accepted">0</td>
                                                                <td data-label="Points Earned">0</td>
                                                                <td data-label="Details"><a href="javascript:void(0)" class="underline details">Show Details</a></td>
                                                            </tr>
                                                            <tr class="invitation-list" style="display:none;" >
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
                                                            </tr>  
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
                                    <p><a href="#" class="btn btn-primary pull-right" >Insert New Blog</a></p>
                                    <br><br>
                                </div>
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">Name</a></td>
                                            <td>Waiting For Admin Approval</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Edit</a></td>
                                        </tr>                
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <div class="alert alert-warning alert-dismissable" > No Data Found</div>
                                <nav class="text-center"></nav>
                            </div>
                            <div><!-- Orders -->
                                <p>Loading..</p>
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
    
        

@endsection