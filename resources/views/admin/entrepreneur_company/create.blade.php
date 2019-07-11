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
                <a href="{{url('/admin')}}/entrepreneur_management/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/entrepreneur_company/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="overview">Company Overview *</label>
                        <input type="text" name="overview" id="overview" class="form-control" placeholder="Type your overview">
                        
                        <label for="category">Sector *</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <p class="help-block">Select your category .</p>


                        <label for="p_yr_revenue">Prior year revenue </label>
                        <input type="text" name="p_yr_revenue" id="p_yr_revenue" class="form-control" placeholder="Type your previous year revenue">
                        
                        <label for="c_yr_revenue">Current year revenue </label>
                        <input type="text" name="c_yr_revenue"  id="c_yr_revenue" class="form-control" placeholder="Type your Current year revenue">
                        
                        <label for="n_yr_revenue">Next year revenue </label>
                        <input type="text" name="n_yr_revenue" id="n_yr_revenue" class="form-control" placeholder="Type your next year revenue">
                        
                        <label for="founded_date">Founded date </label>
                        <input type="date" name="founded_date" id="founded_date" class="form-control" >
                        
                        <label for="no_employees">No of employees </label>
                        <input type="text" name="no_employees" id="no_employees" class="form-control" placeholder="Type number of employees">
                        
                        <label>Documents / Links</label>
                        <label for="file">File </label>
                        <input type="file" name="file" id="file" class="form-control">
                        <p class="help-block">Upload your file.</p>


                        <label for="filetitle">Title </label>
                        <input type="text" name="filetitle" id="filetitle" class="form-control" placeholder="Type your file title">
                        

                        <label for="fileurl">Link </label>
                        <input type="text" name="fileurl" id="fileurl" class="form-control" placeholder="Type your File URL">
                        
                        <label for="project_img">Project Featured Image </label>
                        <input type="file" name="project_img" id="project_img" class="form-control">
                        <p class="help-block">Upload your project image.</p>

                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection