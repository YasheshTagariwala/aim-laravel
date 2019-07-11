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
                    <td class="hidden-xs hidden-sm">Women Name</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->name}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">City</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->city}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">State</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->state}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Country</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->country}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Postal Code</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->zipcode}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Gender</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->gender}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Women stage</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->women_stage}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Website</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->website}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Facebook URL</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fb_url}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Twitter URL</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->tw_url}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Linkedin URL</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->linked_url}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Blog URL</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->blog_url}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Google+ URL</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->gp_url}}</td>
                </tr>
                
            </tbody>
        </table>
              
    </div>

</div>     
@endsection