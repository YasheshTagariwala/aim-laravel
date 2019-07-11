@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Organization Profile</h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/organization_profile/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/organization_profile/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                    
                        <label for="name">Organization Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$mydetails[0]->name}}">
                        <p class="help-block">Enter your name.</p>

                        <label for="country">Country *</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{$mydetails[0]->country}}">
                        <p class="help-block">Enter the Country.</p>

                        <label for="org_logo">Organization Logo *</label>
                        <input type="file" name="org_logo" id="org_logo" class="form-control">
                        <p class="help-block">Upload your Organization Logo.</p>
                        <label for="description">Description *</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$mydetails[0]->description}}">
                        <p class="help-block">Enter the description.</p>

                        <label for="categories">Sector *</label>
                        <input type="text" name="categories" id="categories" class="form-control" value="{{$mydetails[0]->categories}}" required>
                        <p class="help-block">Enter the Categories.</p>

                        <label for="org_file">File *</label>
                        <input type="file" name="org_file" id="org_file" class="form-control">
                        <p class="help-block">Upload your Organization file.</p>

                        <label for="file_title">Title *</label>
                        <input type="text" name="file_title" id="file_title" class="form-control" value="{{$mydetails[0]->file_title}}" required>
                        <p class="help-block">Enter the file title.</p>

                        <label for="mission">Mission *</label>
                        <input type="text" name="mission" id="mission" class="form-control" value="{{$mydetails[0]->mission}}">
                        <p class="help-block">Enter the mission.</p>

                        
                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection