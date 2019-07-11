@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Marketplace Settings </h1>
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
                    <td class="hidden-xs hidden-sm">Store Name</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->storename}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Organisation id</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->org_id}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Store slug</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->store_slug}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Description</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->description}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Buyer Message</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->buyer_msg}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Phone</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->phone}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Email</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->email}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Address</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->addressline1}} {{$mydetail[0]->addressline2}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Country</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->country}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">State</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->state}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">City</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->city}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Zipcode</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->zipcode}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Logo</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->logopath}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Banner</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->bannerpath}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Facebook</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->fb_link}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Gp</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->gp_link}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Twitter</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->tw_link}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Linkedin</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->linked_link}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Yt</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->yt_link}}</td>
                </tr>
                <tr>
                    <td class="hidden-xs hidden-sm">Instagram</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail[0]->insta_link}}</td>
                </tr> 
            </tbody>
        </table>
              
    </div>

</div>     
@endsection