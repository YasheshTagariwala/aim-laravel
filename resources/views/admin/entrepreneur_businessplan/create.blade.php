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
                <form action="{{url('/admin')}}/entrepreneur_businessplan/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="idea">Your Idea </label>
                        <textarea name="idea" id="idea" class="form-control" placeholder="Type your idea"></textarea>
                        
                        <label for="women_model">Your Women model </label>
                        <textarea name="women_model" id="women_model" class="form-control" placeholder="Type your women model"></textarea>
                        
                        <label for="customer">Your Customer </label>
                        <textarea name="customer" id="customer" class="form-control" placeholder="Type your customer"></textarea>
                        
                        <label for="market">Your Market </label>
                        <textarea name="market" id="market" class="form-control" placeholder="Type your market"></textarea>
                        
                        <label for="industry">Your Industry </label>
                        <textarea name="industry" id="industry" class="form-control" placeholder="Type your industry"></textarea>
                        
                        <label for="product">Your Product </label>
                        <textarea name="product" id="product" class="form-control" placeholder="Type your product"></textarea>
                        
                        <label for="campaign">Your Campaign </label>
                        <textarea name="campaign" id="campaign" class="form-control" placeholder="Type your campaign"></textarea>
                        
                        <label for="budget">Your Budget </label>
                        <textarea name="budget" id="budget" class="form-control" placeholder="Type your budget"></textarea>
                        
                        <label for="team">Your Team </label>
                        <textarea name="team" id="team" class="form-control" placeholder="Type your team"></textarea>
                        
                        <label for="pitch">Your Pitch </label>
                        <textarea name="pitch" id="pitch" class="form-control" placeholder="Type your pitch"></textarea>
                        
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection