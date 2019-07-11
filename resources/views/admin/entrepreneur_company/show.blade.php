@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Company Information </h1>
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
                    <td class="hidden-xs hidden-sm">Company Overview</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->overview}} </td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Sector</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->category}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Prior Year Revenue</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->p_yr_revenue}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Current Year Revenue</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->c_yr_revenue}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Next Year Revenue</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->n_yr_revenue}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Founded date</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->founded_date}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Number of Employees</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->no_employees}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">File</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->filepath}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Title</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->filetitle}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Link URL</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fileurl}}</td>
                </tr>
                
            </tbody>
        </table>
              
    </div>

</div>     
@endsection