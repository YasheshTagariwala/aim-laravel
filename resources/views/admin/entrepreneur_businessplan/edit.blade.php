@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Entrepreneur Businessplan </h1>
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
                <form action="{{url('/admin')}}/entrepreneur_businessplan/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        
                        <label for="idea">Your Idea </label>
                        <textarea name="idea" id="idea" class="form-control" placeholder="Type your idea">{{$mydetails[0]->idea}}</textarea>
                        <p class="help-block">Enter your Idea.</p>

                        <label for="women_model">Your Women model </label>
                        <textarea name="women_model" id="women_model" class="form-control" placeholder="Type your women model">{{$mydetails[0]->women_model}}</textarea>
                        <p class="help-block">Enter your women model.</p>

                        <label for="customer">Your Customer </label>
                        <textarea name="customer" id="customer" class="form-control" placeholder="Type your customer">{{$mydetails[0]->customer}}</textarea>
                        <p class="help-block">Enter your customer.</p>

                        <label for="market">Your Market </label>
                        <textarea name="market" id="market" class="form-control" placeholder="Type your market">{{$mydetails[0]->market}}</textarea>
                        <p class="help-block">Enter your market.</p>

                        <label for="industry">Your Industry </label>
                        <textarea name="industry" id="industry" class="form-control" placeholder="Type your industry">{{$mydetails[0]->industry}}</textarea>
                        <p class="help-block">Enter your industry.</p>

                        <label for="product">Your Product </label>
                        <textarea name="product" id="product" class="form-control" placeholder="Type your product">{{$mydetails[0]->product}}</textarea>
                        <p class="help-block">Enter your product.</p>

                        <label for="campaign">Your Campaign </label>
                        <textarea name="campaign" id="campaign" class="form-control" placeholder="Type your campaign">{{$mydetails[0]->campaign}}</textarea>
                        <p class="help-block">Enter your campaign.</p>

                        <label for="budget">Your Budget </label>
                        <textarea name="budget" id="budget" class="form-control" placeholder="Type your budget">{{$mydetails[0]->budget}}</textarea>
                        <p class="help-block">Enter your budget.</p>

                        <label for="team">Your Team </label>
                        <textarea name="team" id="team" class="form-control" placeholder="Type your team">{{$mydetails[0]->team}}</textarea>
                        <p class="help-block">Enter your team.</p>

                        <label for="pitch">Your Pitch </label>
                        <textarea name="pitch" id="pitch" class="form-control" placeholder="Type your pitch">{{$mydetails[0]->pitch}}</textarea>
                        <p class="help-block">Enter your pitch.</p>

                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection