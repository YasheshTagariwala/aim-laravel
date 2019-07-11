@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Market Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur_market/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/entrepreneur_market/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="name">Name *</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Type your name">
                       
                        <label for="description">Description *</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Type your description"></textarea>
                        
                        <label for="product_img">Product Image *</label>
                        <input type="file" name="org_logo" id="org_logo" class="form-control">
                        <p class="help-block">Upload your product image.</p>

                        <label for="market">Markets *</label>
                        <input type="text" name="market" id="market" class="form-control" placeholder="Type your Market">
                        
                        <label for="market_size">Market Size *</label>
                        <input type="text" name="market_size" id="market_size" class="form-control" placeholder="Type your market size">
                        
                        <label for="growth_rate">Annual Growth Rate *</label>
                        <input type="text" name="growth_rate" id="growth_rate" class="form-control" placeholder="Type your growth rate">
                        
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection