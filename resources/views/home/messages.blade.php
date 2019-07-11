@extends('layouts.master')
@section('title','Messages')
@section('pagebody')

<!-- Start Inner Contents -->         
    
    <section class="myaccount-header">
      <div class="container">
        <h1>Messages</h1>
        <p></p>
      </div>
    </section>  
    <section class="myaccount-body">
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
                      <li class="active"> <a href="{{url('/messages')}}"> <i class="fa fa-inbox"></i> All Messages </a> </li>
                      <li> <a href="{{url('/enquiry')}}"> <i class="fa fa-star-o"></i> Enquiries</a> </li>
                      <li> <a href="{{url('/notifications')}}"> <i class="fa fa fa-bullhorn"></i> Admin Notifications</a> </li>
                </ul>
              </aside>
            </div>
          </div>
          <div class="col-md-9 col-sm-12" id="inbox-wrapper">
            <section class="panel">
              <div class="panel-heading wht-bg">
                <h4 class="gen-case">Messages ({{count($messages)}}) </h4>
              </div>
              <div class="panel-body minimal">              
                <!-- <div class="alert alert-warning alert-dismissable"> There are no messages in your Inbox</div> -->
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
    </section>
    
    <!-- End Inner Contents -->         
    

@endsection