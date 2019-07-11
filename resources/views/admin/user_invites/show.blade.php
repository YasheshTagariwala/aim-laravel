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
                <tr>
                    <td class="hidden-xs hidden-sm">Name</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->name}} </td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Email</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->email}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">User Role</td>
                @if($mydetail[0]->groupid == 1)
                      <td class="hidden-xs hidden-sm">Entrepreneur</td>
                    @endif
                    
                    @if($mydetail[0]->groupid == 2)
                      <td class="hidden-xs hidden-sm">Organization</td>
                    @endif

                    @if($mydetail[0]->groupid == 3)
                      <td class="hidden-xs hidden-sm">Supporter</td>
                    @endif
                     
                    @if($mydetail[0]->groupid == 4)
                      <td class="hidden-xs hidden-sm">Investor</td>
                    @endif
                </tr>
            </tbody>
        </table>
              
    </div>

</div>     
@endsection