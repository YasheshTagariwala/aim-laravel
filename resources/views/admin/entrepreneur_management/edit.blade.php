@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Management Team </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur_profile/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/entrepreneur_management/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$mydetails[0]->name}}">
                        <p class="help-block">Enter your name.</p>

                        <label for="position">Position *</label>
                        <input type="text" name="position" id="position" class="form-control" value="{{$mydetails[0]->position}}">
                        <p class="help-block">Enter your Position.</p>

                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$mydetails[0]->email}}">
                        <p class="help-block">Enter the email.</p>

                        <label for="description">Description *</label>
                        <textarea name="description" id="description" class="form-control">{{$mydetails[0]->description}}</textarea>
                        <p class="help-block">Enter the description.</p>

                        <label for="photograph">Photograph *</label>
                        <input type="file" name="org_logo" id="org_logo" class="form-control">
                        <p class="help-block">Upload your photograph.</p>

                        <label for="linkedurl">Linkedin URL </label>
                        <input type="text" name="linkedurl" id="linkedurl" class="form-control" value="{{$mydetails[0]->linked_url}}">
                        <p class="help-block">Enter your Linkedin URL.</p>

                        <label for="fburl">Facebook link </label>
                        <input type="text" name="fburl" id="fburl" class="form-control" value="{{$mydetails[0]->fb_url}}">
                        <p class="help-block">Enter your Facebook URL.</p>

                        <label for="twurl">Twitter </label>
                        <input type="text" name="twurl" id="twurl" class="form-control" value="{{$mydetails[0]->tw_url}}">
                        <p class="help-block">Enter your contact number.</p>
                      
                    
                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection