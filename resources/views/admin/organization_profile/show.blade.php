@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Organization Profile </h1>
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
                    <td class="hidden-xs hidden-sm">Organization Name</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->name}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Country</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->country}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Organization logo</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->org_logo}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Description</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->description}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Sector</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->categories}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">File</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->org_file}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Title</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->file_title}}</td>
                </tr>
                 <tr>
                    <td class="hidden-xs hidden-sm">Mission</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->mission}}</td>
                </tr>
                 
            </tbody>
        </table>
              
    </div>

</div>     
@endsection