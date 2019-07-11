@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Messages </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/messages/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>

    

</header>
@endsection
@section('pagebody')

<div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    Vertical Form
                </header>
                <div class="widget-body">
                <form action="{{url('/admin')}}/messages/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="subject">Subject *</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Type your subject">
                        
                        <label for="message">Message *</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Type your message"></textarea>
                        
                        <label for="msg_to">Message to *</label>
                        <select name="msg_to" id="msg_to" class="form-control" required>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="msg_to" id="msg_to" class="form-control" placeholder="Type to whom you want to send Message" required> -->
                        </br>
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection