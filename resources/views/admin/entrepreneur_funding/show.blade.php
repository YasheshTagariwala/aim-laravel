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
                    <td class="hidden-xs hidden-sm">Goal</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->goal}} </td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Fund Raised so For</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fund_for}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Funding type</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fund_type}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Private Funding</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fund_pvt}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Pre-Money Valuation</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->pre_money}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Interest / Dividend</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->interest}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Previous Funding</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->prev_fund}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Funding commitment</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fund_commitment}}</td>
                </tr>
                
            </tbody>
        </table>
              
    </div>

</div>     
@endsection