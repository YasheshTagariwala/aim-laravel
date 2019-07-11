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
                    <td class="hidden-xs hidden-sm">Idea</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->idea}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Women model</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->women_model}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Customer</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->customer}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Market</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->market}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Industry</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->industry}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Product</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->product}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Campaign</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->campaign}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Budget</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->budget}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Team</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->team}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Pitch</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->pitch}}</td>
                </tr>              
            </tbody>
        </table>
              
    </div>

</div>     
@endsection