@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> User Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/temp_user/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/temp_user/store" method="post">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        <label for="firstname">Firstname *</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Type your firstname">

                        <label for="lastname">Lastname *</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Type your lastname">

                        <label for="username">Username *</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Type your username">

                        <label for="password">Password *</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Type your password">

                        <label for="password">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Type your email">

                        <label for="phone">Phone *</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Type your Contact number">

                        <label for="groupid">Select Group *</label><br>
                        <select name="groupid" class="form-control">
                            <option value="1">Entrepreneur</option>
                            <option value="2">Organization</option>
                            <option value="3">Supporter</option>
                            <option value="4">Investor</option>
                        </select>
                        
                        <p class="help-block">Select the group you belong to.</p>

                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection