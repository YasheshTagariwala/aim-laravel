@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Marketplace Settings  </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/marketplace_settings/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>
</header>
@endsection
@section('pagebody')

<div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    Vertical Form
                </header>
                <div class="widget-body">
                <form action="{{url('/admin')}}/marketplace_settings/update" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} 
                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif
                        
                        <label for="storename">Store name *</label>
                        <input type="text" name="storename" id="storename" class="form-control" value="{{$mydetails[0]->storename}}" required>
                        <p class="help-block">Enter your store name.</p>

                        <label for="org_id">Org id *</label>
                        <input type="text" name="org_id" id="org_id" class="form-control" value="{{$mydetails[0]->org_id}}" required>
                        <p class="help-block">Enter your city.</p>

                        <label for="store_slug">Store slug *</label>
                        <input type="text" name="store_slug" id="store_slug" class="form-control" value="{{$mydetails[0]->store_slug}}" required>
                        <p class="help-block">Enter your store slug.</p>

                         <label for="description">Description*</label>
                        <textarea name="description" id="description" class="form-control" >{{$mydetails[0]->description}}</textarea>
                        <p class="help-block">Enter your description.</p>

                        <label for="buyer_msg">Buyer message *</label>
                        <input type="text" name="buyer_msg" id="buyer_msg" class="form-control" value="{{$mydetails[0]->buyer_msg}}" required>
                        <p class="help-block">Enter your buyer message.</p>

                        <label for="phone">Phone *</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{$mydetails[0]->phone}}" required>
                        <p class="help-block">Enter your phone number.</p>

                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$mydetails[0]->email}}">
                        <p class="help-block">Enter your email.</p>

                        <label for="addressline1">Address Line 1 *</label>
                        <input type="text" name="addressline1" id="addressline1" class="form-control" value="{{$mydetails[0]->addressline1}}">
                        <p class="help-block">Enter your address.</p>

                        <label for="addressline2">Address Line 2 *</label>
                        <input type="text" name="addressline2" id="addressline2" class="form-control" value="{{$mydetails[0]->addressline2}}">
                        <p class="help-block">Enter your address.</p>

                        <label for="country">Country *</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{$mydetails[0]->country}}">
                        <p class="help-block">Enter your country.</p>

                        <label for="state">State *</label>
                        <input type="text" name="state" id="state" class="form-control" value="{{$mydetails[0]->state}}">
                        <p class="help-block">Enter your state.</p>

                        <label for="city">City *</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{$mydetails[0]->city}}">
                        <p class="help-block">Enter your City.</p>

                        <label for="zipcode">Zipcode *</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control" value="{{$mydetails[0]->zipcode}}">
                        <p class="help-block">Enter your zipcode.</p>

                        <label for="logo">Logo </label>
                        <input type="file" name="org_logo" id="org_logo" class="form-control">
                        <p class="help-block">Upload your logo.</p>

                        <label for="banner">Banner </label>
                        <input type="file" name="org_banner" id="org_banner" class="form-control">
                        <p class="help-block">Upload your Banner.</p>

                        <label for="fb_link">Facebook link *</label>
                        <input type="text" name="fb_link" id="fb_link" class="form-control" value="{{$mydetails[0]->fb_link}}">
                        <p class="help-block">Enter your Facebook URL.</p>

                        <label for="gp_link">gp URL *</label>
                        <input type="text" name="gp_link" id="gp_link" class="form-control" value="{{$mydetails[0]->gp_link}}">
                        <p class="help-block">Enter your gp URL.</p>

                        <label for="tw_link">Twitter *</label>
                        <input type="text" name="tw_link" id="tw_link" class="form-control" value="{{$mydetails[0]->tw_link}}">
                        <p class="help-block">Enter your contact number.</p>

                        <label for="linked_link">Linkedin URL *</label>
                        <input type="text" name="linked_link" id="linked_link" class="form-control" placeholder="Type your Linkedin URL">
                        <p class="help-block">Enter your Linkedin URL.</p>

                        <label for="yt_link">Yt link *</label>
                        <input type="text" name="yt_link" id="yt_link" class="form-control" value="{{$mydetails[0]->yt_link}}">
                        <p class="help-block">Enter your Yt link.</p>

                        <label for="insta_link">Instagram Link *</label>
                        <input type="text" name="insta_link" id="insta_link" class="form-control" value="{{$mydetails[0]->insta_link}}">
                        <p class="help-block">Enter your instagram link.</p>

                        <input type="hidden" class="form-control" name="id" value="{{$mydetails[0]->id}}" required="">
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>
                </div>
            </div>
        </div>   
</div> 
@endsection