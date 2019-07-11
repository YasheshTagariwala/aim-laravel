@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Entrepreneur Profile </h1>
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
                    <td class="hidden-xs hidden-sm">Expertise</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->expertise}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Capital Investment</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->capital_invesment}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Category</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->category}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Country Interest</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->country_interest}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Roi</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->roi}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Women stage</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->women_stage}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Expectation</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->expectation}}</td>
                </tr>
                               
            </tbody>
        </table>
              
    </div>

</div>     
@endsection