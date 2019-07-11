@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Invited User Detail </h1>
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
                 @foreach ($mydetails as $mydetail)
                
                <tr>
                    <td class="hidden-xs hidden-sm">User Id</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->userid}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Status</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->status}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Date-Time</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->datetime}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
              
    </div>

</div>     
@endsection