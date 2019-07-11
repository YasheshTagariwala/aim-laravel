@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Message </h1>
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
                    <td class="hidden-xs hidden-sm">Subject</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->subject}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Message id</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->message}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Message to</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->msg_to}}</td>
                </tr>
            </tbody>
        </table>
              
    </div>

</div>     
@endsection
