@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Entrepreneur Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/entrepreneur/update" method="post">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        
                        <label for="firstname">Firstname *</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" value="{{$mydetails[0]->firstname}}">
                        <p class="help-block">Enter your first name.</p>

                        <label for="lastname">Lastname *</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" value="{{$mydetails[0]->lastname}}">
                        <p class="help-block">Enter your last name.</p>

                        <label for="username">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{$mydetails[0]->username}}">
                        <p class="help-block">Enter the username you registered with.</p>

                        <label for="password">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" value="{{$mydetails[0]->password}}">
                        <p class="help-block">Enter the password.</p>

                        <label for="password">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$mydetails[0]->email}}">
                        <p class="help-block">And your personal Email.</p>

                        <label for="phone">Phone *</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{$mydetails[0]->phone}}">
                        <p class="help-block">Enter your contact number.</p>

                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection