@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Messages</h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
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
                <form action="{{url('/admin')}}/blog/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                    
                        <label for="subject">Name *</label>
                        <input type="text" name="subject" id="subject" class="form-control" value="{{$mydetails[0]->name}}">
                        <p class="help-block">Enter your subject.</p>

                        <label for="message">Content *</label>
                        <textarea name="message" id="message" class="form-control">{{$mydetails[0]->content}}</textarea>
                        <p class="help-block">Enter your message.</p>

                        <label for="msg_to">Tag to *</label>
                        <select name="msg_to" id="msg_to" class="form-control" required>
                            @foreach($users as $user)
                            <option value="{{$user->id}}" @if($mydetails[0]->tags ==$user->id) selected="" @endif>{{$user->firstname}} {{$user->lastname}}</option>
                            @endforeach
                        </select>
                        <p class="help-block">Enter to whom you want to tag.</p>
                        
                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection