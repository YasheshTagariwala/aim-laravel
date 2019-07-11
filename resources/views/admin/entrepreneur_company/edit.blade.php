@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Company Information </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur_company/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/entrepreneur_company/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        
                        <label for="overview">Company Overview *</label>
                        <input type="text" name="overview" id="overview" class="form-control" value="{{$mydetails[0]->overview}}">
                        <p class="help-block">Enter the overview.</p>

                        <label for="category">Sector *</label>
                        <input type="text" name="category" id="category" class="form-control" value="{{$mydetails[0]->category}}">
                        <p class="help-block">Enter your category.</p>

                        <label for="p_yr_revenue">Prior year revenue </label>
                        <input type="text" name="p_yr_revenue" id="p_yr_revenue" class="form-control" value="{{$mydetails[0]->p_yr_revenue}}">
                        <p class="help-block">Enter the previous year revenue.</p>

                        <label for="c_yr_revenue">Current year revenue </label>
                        <input type="text" name="c_yr_revenue"  id="c_yr_revenue" class="form-control" value="{{$mydetails[0]->c_yr_revenue}}">
                        <p class="help-block">Enter the current year revenue</p>

                        <label for="n_yr_revenue">Next year revenue </label>
                        <input type="text" name="n_yr_revenue" id="n_yr_revenue"" class="form-control" value="{{$mydetails[0]->n_yr_revenue}}">
                        <p class="help-block">Enter your next year revenue.</p>

                        <label for="founded_date">Founded date </label>
                        <input type="date" name="founded_date" id="founded_date" class="form-control" value="{{$mydetails[0]->founded_date}}">
                        <p class="help-block">Enter when your company started.</p>

                        <label for="no_employees">No of employees </label>
                        <input type="text" name="no_employees" id="no_employees" class="form-control" value="{{$mydetails[0]->no_employees}}">
                        <p class="help-block">Enter the number of employees working in your company.</p>

                        <label>Document / Links</label>
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="form-control">
                        <p class="help-block">Upload your file.</p>


                        <label for="filetitle">Title</label>
                        <input type="text" name="filetitle" id="filetitle" class="form-control" value="{{$mydetails[0]->filetitle}}">
                        <p class="help-block">Enter your filetittle.</p>


                        <label for="fileurl">Link</label>
                        <input type="text" name="fileurl" id="fileurl" class="form-control" value="{{$mydetails[0]->fileurl}}">
                        <p class="help-block">Enter your File URL.</p>

                        <label for="project_img">Project Featured Image</label>
                        <input type="file" name="project_img" id="project_img" class="form-control">
                        <p class="help-block">Upload your project image.</p>
                      
                    
                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection