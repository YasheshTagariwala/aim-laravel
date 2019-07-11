@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Market Detail </h1>
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
                    <td class="hidden-xs hidden-sm">Name</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->name}} </td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Description</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->description}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Market</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->market}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Market Size</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->market_size}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Annual Growth Rate</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->growth_rate}}</td>
                </tr>
                
            </tbody>
        </table>
              
    </div>

</div>     
@endsection