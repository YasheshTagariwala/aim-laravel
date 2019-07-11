@extends('layouts.master')
@section('title','Notifications')
@section('pagebody')

<!-- Start Inner Contents -->         
    
    <section class="myaccount-header">
      <div class="container">
        <h1>Admin Notifications</h1>
        <p></p>
      </div>
    </section>  
    <section class="myaccount-body"> 
      <div class="inner-wrapper"  id="main-content">
        <div class="register-wrapper">
          <div class="container">
            <div class="vtab-nav vtab-nav-hrz clearfix"> 
              <ul class="resp-tabs-list clearfix">
            <li  class="side_menu"><a href="{{url('/')}}">Dashboard</a></li>
            <li class="side_menu active" id="Orders"><a href="#">Messages</a></li>
            <li class="side_menu" id="market-place"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li></a>
               </ul>
               <ul class="resp-tabs-list right-tab  clearfix">
            <li class="side_menu active" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
            <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-3 col-sm-12" id="compose-wrapper">
                <div class="panel">
                  <aside class="panel-body">
                    <ul class="nav nav-pills nav-stacked compose-nav">
                      <li > <a href="{{url('/messages')}}"> <i class="fa fa-inbox"></i> All Messages </a> </li>
                      <li > <a href="{{url('/enquiry')}}"> <i class="fa fa-star-o"></i> Enquiries</a> </li>
                      <li class="active"> <a href="{{url('/notifications')}}"> <i class="fa fa fa-bullhorn"></i> Admin Notifications</a> </li>
                    </ul>
                  </aside>
                </div>
              </div>
              <div class="col-md-9 col-sm-12" id="inbox-wrapper">
                <section class="panel">
                  <div class="panel-heading wht-bg clearfix">
                    <h4 class="gen-case pull-left">Messages ({{count($messages)}}) </h4>
                    <div class="pull-right"><a href="#" class="btn btn-primary" data-target="#sendmessage" data-toggle="modal">Start New Conversation</a></div>
                  </div>
                  <div class="panel-body minimal">                
                     <div class="table-responsive">
                  <table class="table table-inbox table-hover">
                    <thead>             
                      <tr class="unread">
                        <th>Id</th>
                        <th>Name</th>
                        <th class="message">Message</th>
                        <th class="text-right" style="white-space:nowrap">Date</th>
                      </tr>
                    </thead>
                    <tbody>  
                    @if(count($messages) > 0)    
                    @foreach($messages as $message)                     
                      <tr class="unread">
                        <td>{{$message->id}}</td>
                        <td>{{$message->subject}}</td>
                        <td class="message"><a href="#"><span class="title">{{$message->message}} </span></a></td>
                        <td class="text-right" style="white-space:nowrap">{{$message->created_at}}</td>
                      </tr>
                    @endforeach
                    @else

                    <div class="alert alert-warning alert-dismissable"> There are no admin notifications in your Inbox</div>
                    @endif
                    </tbody>
                  </table>
                </div>
                    </div>
                </section>
              </div>
            </div>      
            <div class="static-content" style="display:none"></div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="sendmessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Send Message</h4>
            </div>
            <div class="modal-body">
              <div id="formmessage" class="formmessage"></div>
            <form id="messageform" action="{{url('/messages')}}/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}   
              <input type="text" value=""  class="form-control" id="subject" name="subject"  placeholder="Subject"  /><br />
              <textarea id="message" name="message" class="form-control"  required="required" rows="10" cols="50" placeholder="Type Message Here" style="width:100%;"></textarea>
              <br /><br />
                        <input value="Send Message" name="save" class="btn btn-primary" id="1sendmessagebtn" type="submit">
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
    var ajaxurl = '';

    jQuery(document).ready(function($) {
      

    $('#sendmessagebtn').on('closed.bs.alert', function () {
      window.location.href = "";

    })  
      
    $('#sendmessagebtn').click(function(){
        $('.formmessage').hide();
        if($('#message').val()=='' && $('#subject').val()==''){
        $('.formmessage').html('Alll fields are required, please enter the details.').removeClass('alert alert-danger alert-success').show().addClass('alert alert-danger');
       return false;
       
       }
          
          var button=$(this);
          button.addClass('disabled');
        $.ajax({
        url: ajaxurl,
        data: {
          'action':'gybi_send_message',
          'message' : $('#message').val(),
          'title':$('#subject').val(),
          'to_user':1,
          'message_category':1
        },
        success:function(data) {
          //todo error handling
          if(data!="0"){
            button.removeClass('disabled');
            $('#message').val('');
            $('#subject').val('');
          $('.formmessage').html('Your message sent to Admin').removeClass('alert alert-danger alert-success').show().addClass('alert alert-success');
          }
        },
        error: function(errorThrown){
        }
      });  
      
      return false;
        })
        
    });

    </script>
    <!-- End Inner Contents -->         
    
    

@endsection