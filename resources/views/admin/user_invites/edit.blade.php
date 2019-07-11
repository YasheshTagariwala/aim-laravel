@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Invited User Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/user_invites/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/user_invites/update" method="post">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif   
                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$mydetails[0]->name}}">
                        <p class="help-block">Enter your name.</p>

                        <label for="password">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$mydetails[0]->email}}">
                        <p class="help-block">And your personal Email.</p>

                        <label for="groupid">Select Group *</label><br>
                        <select name="groupid" class="form-control">
                            <option value="1">Entrepreneur</option>
                            <option value="2">Organization</option>
                            <option value="3">Supporter</option>
                            <option value="4">Investor</option>
                        </select>
                        <p class="help-block">Select the group you belong to.</p>

                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection