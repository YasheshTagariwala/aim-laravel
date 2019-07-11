@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Investor Profile </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/investor_profile/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/investor_profile/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        
                        <label for="expertise">Expertise *</label>
                        <textarea name="expertise" id="expertise" class="form-control">{{$mydetails[0]->expertise}}</textarea>
                        <p class="help-block">Enter your expertise.</p>

                        <label for="capital_investment">Capital Investment *</label>
                        <input type="text" name="capital_investment" id="capital_investment" class="form-control" value="{{$mydetails[0]->capital_invesment}}">
                        <p class="help-block">Enter your capital investment.</p>

                        <label for="category">Category *</label>
                        <input type="text" name="category" id="category" class="form-control" value="{{$mydetails[0]->category}}">
                        <p class="help-block">Enter your category.</p>

                        <label for="country_interest">Country Interest *</label>
                        <input type="text" name="country_interest" id="country_interest" class="form-control" value="{{$mydetails[0]->country_interest}}">
                        <p class="help-block">Enter your country interest.</p>

                        <label for="roi">Roi *</label>
                        <input type="text" name="roi" id="roi" class="form-control" value="{{$mydetails[0]->roi}}">
                        <p class="help-block">Enter your roi.</p>

                        <label for="women_stage">Women stage *</label>
                        <select name="women_stage" class="form-control" value="{{$mydetails[0]->women_stage}}">
                            <option value="aaa">AAA</option>
                            <option value="bbb">BBB</option>
                            <option value="ccc">CCC</option>
                            <option value="ddd">DDD</option>
                        </select>
                        <p class="help-block">Select your women stage .</p>

                        <label for="expectation">How do you want to be involved? *</label>
                        <textarea name="expectation" id="expectation" class="form-control"> {{$mydetails[0]->expectation}}
                        </textarea>
                        <p class="help-block">Enter your expectation.</p>


                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection