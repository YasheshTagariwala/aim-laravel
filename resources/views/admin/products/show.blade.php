@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Product Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
           
        </div>
    </div>
</header>
@endsection
@section('pagebody')

<div class="row">
    <div class="col-lg-12">
        <table class="table table-condensed">
            <tbody>
                <tr>
                    <td class="hidden-xs hidden-sm">Product Name</td>
                    <td class="hidden-xs hidden-sm">{{$product->name}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Product Short Description</td>
                    <td class="hidden-xs hidden-sm">{{$product->short_desc}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Product Description</td>
                    <td class="hidden-xs hidden-sm">{{$product->description}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Regular Price</td>
                    <td class="hidden-xs hidden-sm">{{$product->product_data}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Sales Price</td>
                    <td class="hidden-xs hidden-sm">{{$product->sale_price}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Sales Price Start Date</td>
                    <td class="hidden-xs hidden-sm">{{$product->start_date}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Sales Price End Date</td>
                    <td class="hidden-xs hidden-sm">{{$product->end_date}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Categories</td>
                    <td class="hidden-xs hidden-sm">{{$product->categories}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Product Tag</td>
                    <td class="hidden-xs hidden-sm">{{$product->tags}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Product Image Gallery</td>
                    <td class="hidden-xs hidden-sm">{{$product->imagepath}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">User Id</td>
                    <td class="hidden-xs hidden-sm">{{$product->userid}}</td>
                </tr>
            </tbody>
        </table>
              
    </div>

</div>     
@endsection