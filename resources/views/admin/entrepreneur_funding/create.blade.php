@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Funding Information </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur_funding/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/entrepreneur_funding/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="goal">Goal </label>
                        <input type="text" name="goal" id="goal" class="form-control" placeholder="Type your goal">
                        
                        <label for="fund_for">Fund Raised so for </label>
                        <input type="text" name="fund_for" id="fund_for" class="form-control" placeholder="Type the Fund Raised so for">
                    
                        <label for="fund_type">Funding Type </label>
                        <input type="text" name="fund_type" id="fund_type" class="form-control" placeholder="Type your Funding Type">

                        <label for="fund_pvt">Private Funding </label>
                        <input type="text" name="fund_pvt" id="fund_pvt" class="form-control" placeholder="Type your Private Funding">
                        
                        <label for="pre_money">Pre-money Valuation </label>
                        <input type="text" name="pre_money" id="pre_money" class="form-control" placeholder="Type your pre-money Valuation">
                        
                        <label for="interest">Interest / Dividend</label>
                        <input type="text" name="interest" id="interest" class="form-control" placeholder="Type the interest">
                        
                        <label for="prev_fund">Previous Funding </label>
                        <input type="text" name="prev_fund" id="prev_fund" class="form-control" placeholder="Type previous Funding">
                        
                        <label for="fund_commitment">Funding Commitment </label>
                        <input type="text" name="fund_commitment" id="fund_commitment" class="form-control" placeholder="Type funding commitment">
                       
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection