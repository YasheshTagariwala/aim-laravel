@extends('layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> User Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="new/create" type="button" class="btn btn-primary btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>
</header>
@endsection
@section('pagebody')
<di

<div class="row">
    <div class="col-lg-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="hidden-xs hidden-sm">#</th>
                    <th class="hidden-xs hidden-sm">User Name</th>
                    <th>Email</th>
                    <th>Quota</th>
                    <th class="text-right">Manage <span class="hidden-xs hidden-sm">User</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mydetails as $mydetail)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$mydetail->id}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->username}}</td>
                    <td><a href="mailto:marksmith@test.com">{{$mydetail->email}}</a></td>
                    <td><div data-toggle="tooltip" data-placement="left" title="3GB / 10GB used"><span class="piety-pie">3/10</span></div></td>
                    <td class="text-right"><a href="new/edit/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">Edit</span></a> <a href="new/delete/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"><span class="fa fa-trash"></span> <span class="hidden-xs hidden-sm">Delete</span></a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
                {!! $mydetails->render() !!}
    </div>

</div>     
@endsection