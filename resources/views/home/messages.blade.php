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
                    <li class="side_menu"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="side_menu active" id="Orders"><a href="#">Messages</a></li>
                    <li class="side_menu" id="market-place"><a
                            href="{{url('/market-place/dashboard')}}">MarketPlace </a></li>
                    </a>
                </ul>
                <ul class="resp-tabs-list right-tab  clearfix">
                    <li class="side_menu active" id="messages"><a href="{{url('/messages')}}"><i
                                class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                    <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user"
                                                                                        aria-hidden="true"></i></a></li>
                    <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out"
                                                                       aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12" id="compose-wrapper">
                    <div class="panel">
                        <aside class="panel-body">
                            <ul class="nav nav-pills nav-stacked compose-nav">
                                <li class="active"><a href="{{url('/messages')}}"> <i class="fa fa-inbox"></i> All
                                        Messages </a></li>
                                {{--                                <li><a href="{{url('/enquiry')}}"> <i class="fa fa-star-o"></i> Enquiries</a></li>--}}
                                <li><a href="{{url('/notifications')}}"> <i class="fa fa fa-bullhorn"></i> Admin
                                        Notifications</a></li>
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12" id="inbox-wrapper">
                    <section class="panel">
                        <div class="panel-heading wht-bg">
                            <h4 class="gen-case">Messages ({{count($messages)}}) </h4>
                            <a href="#" data-toggle="modal" class="btn btn-primary" style="float: right" data-target="#modalUserList">Add</a>
                        </div>
                        <div class="panel-body minimal">
                            <!-- <div class="alert alert-warning alert-dismissable"> There are no messages in your Inbox</div> -->
                            <div class="table-responsive">
                                <table class="table table-inbox table-hover">
                                    <thead>
                                    <tr class="unread">
                                        {{--                                        <th>Id</th>--}}
                                        <th>Name</th>
                                        {{--                                        <th class="message">Message</th>--}}
                                        {{--                                        <th class="text-right" style="white-space:nowrap">Date</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <script> var threadArr = {!! str_replace("'","\'",json_encode($threads)) !!}; </script>
                                    @if(count($threads) > 0)
                                        @foreach($threads as $key => $thr)
                                            <tr class="unread">
                                                <td><a href="#" onclick="msgRoom('{{$thr->thread}}')">{{$thr->withUser->firstname}} {{$thr->withUser->lastname}}</a></td>
                                                {{--                                                <td>{{$message->subject}}</td>--}}
                                                {{--                                                <td class="message"><a href="#"><span--}}
                                                {{--                                                            class="title">{{$message->message}} </span></a></td>--}}
                                                {{--                                                <td class="text-right"--}}
                                                {{--                                                    style="white-space:nowrap">{{$message->created_at}}</td>--}}
                                            </tr>
                                        @endforeach
                                    @else

                                        <div class="alert alert-warning alert-dismissable"> There are no admin
                                            notifications in your Inbox
                                        </div>
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

    <div class="modal fade" id="chatRoom" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:50%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="chat_title"></h4>
                    <input type="hidden" value id="msg_to_id">
                    <input type="hidden" value id="msg_to_thread">
                </div>
                <div class="modal-body" style="height: 600px">
                    <div class="row" id="msgListHolder">

                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" required id="inMsg" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <a style="cursor: pointer" onclick="sendMsg()" class="btn btn-primary">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUserList" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:30%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Start New Chat With</h4>
                </div>
                <div class="modal-body">
                    @if(count($extraUser) > 0)
                        @foreach($extraUser as $user)
                            <div class="row" onclick='selectUser({{$user->id}},"{{str_replace("'","\'",($user->firstname . ' ' . $user->lastname))}}")'>
                                <label class="form-control">{{$user->firstname}} {{$user->lastname}}</label>
                            </div>
                        @endforeach
                    @else
                        <div class="row">
                            <label class="form-control"></label>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        var newlyAdded = false;
        function msgRoom(thr) {
            newlyAdded = false;
            var singleThr = threadArr[thr];
            console.log(singleThr);

            $("#chat_title").html(singleThr.withUser.firstname + ' ' + singleThr.withUser.lastname);
            $("#msg_to_id").val(singleThr.withUser.id);
            $("#msg_to_thread").val(thr);

            var html = "";
            for(var obj of singleThr.msgList){
                if(obj.created_by == {{Session::get('userid')}}){
                    html += "<div class='msgholder col-md-12 text-right' style='margin: 8px'><p style='float: right;width: 70%;margin-right: 25px'>";
                    html += '<span style="color:blue">you >></span> ' + obj.message;
                    html += "</p></div>";
                } else {
                    html += "<div class='msgholder col-md-12' style='margin: 8px'><p style='float: left;width: 70%'>";
                    html += '<span style="color:blue">' + singleThr.withUser.firstname + ' >></span> ' + obj.message;
                    html += "</p></div>";
                }
            }
            $("#msgListHolder").html(html);
            $("#chatRoom").modal('show');
        }

        function sendMsg() {
            var msg = $("#inMsg").val();
            var msg_to = $("#msg_to_id").val();
            var msg_to_thread = $("#msg_to_thread").val();
            if(!(msg == null || msg == '')) {
                jQuery.ajax({
                    data: {
                        _token: '{{ csrf_token() }}',
                        subject:'-',
                        message:msg,
                        msg_to:msg_to,
                        thread:msg_to_thread
                    },
                    type: "post",
                    url: "{{ url('/messages/send-message') }}",
                    dataType: "JSON",
                    success: function (data) {
                        if(newlyAdded){
                            window.location.reload();
                        }
                        var html = "<div class='msgholder col-md-12 text-right' style='margin: 8px'><p style='float: right;width: 70%;margin-right: 25px'>";
                        html += '<span style="color:blue">you >></span> ' + msg;
                        html += "</p></div>";
                        $("#msgListHolder").append(html);
                        $("#inMsg").val('');
                    }
                });
            }
        }

        function selectUser(id,name) {
            newlyAdded = true;
            $("#chat_title").html(name);
            $("#msg_to_id").val(id);
            $("#msg_to_thread").val('{{Session::get('userid')}}-' + id);
            $("#modalUserList").modal('hide');
            $("#chatRoom").modal('show');
            $("#inMsg").val('');
            $("#msgListHolder").html('');
        }
    </script>

    <!-- End Inner Contents -->


@endsection
