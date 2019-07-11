@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Market Place Settings </h1>
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
                <form action="{{url('/admin')}}/marketplace_settings/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="storename">Store name *</label>
                        <input type="text" name="storename" id="storename" class="form-control" placeholder="Type your store name" required>
                        
                        <label for="org_id">Organization id *</label>
                        <input type="text" name="org_id" id="org_id" class="form-control" placeholder="Type your Organisation id" required>
                        
                        <label for="store_slug">Store slug *</label>
                        <input type="text" name="store_slug" id="store_slug" class="form-control" placeholder="Type your store slug" required>
                        
                        <label for="description">Description*</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Type your description"></textarea>
                        
                        <label for="buyer_msg">Buyer message *</label>
                        <input type="text" name="buyer_msg" id="buyer_msg" class="form-control" placeholder="Type your buyer message" required>
                       
                        <label for="phone">Phone *</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Type your phone number" required>
                        
                        <label for="email">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Type your email">
                        <p class="help-block">Enter your email.</p>

                        <label for="addressline1">Address Line 1 *</label>
                        <input type="text" name="addressline1" id="addressline1" class="form-control" placeholder="Type your address">
                        
                        <label for="addressline2">Address Line 2 *</label>
                        <input type="text" name="addressline2" id="addressline2" class="form-control" placeholder="Type your address">
                        
                        <label for="country">Country *</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Type your country">
                        
                        <label for="state">State *</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Type your state">
                        
                        <label for="city">City *</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Type your city">
                        
                        <label for="zipcode">Zipcode *</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Type your zipcode">
                        
                        <label for="logo">Logo </label>
                        <input type="file" name="org_logo" id="org_logo" class="form-control">
                        <p class="help-block">Upload your logo.</p>

                        <label for="banner">Banner </label>
                        <input type="file" name="org_banner" id="org_banner" class="form-control">
                        <p class="help-block">Upload your Banner.</p>

                        <label for="fb_link">Facebook link *</label>
                        <input type="text" name="fb_link" id="fb_link" class="form-control" placeholder="Type your Facebook URL">
                        
                        <label for="gp_link">Google+ URL *</label>
                        <input type="text" name="gp_link" id="gp_link" class="form-control" placeholder="Type your gp URL">
                        
                        <label for="tw_link">Twitter *</label>
                        <input type="text" name="tw_link" id="tw_link" class="form-control" placeholder="Type your Twitter URL">
                        
                        <label for="linked_link">Linkedin URL *</label>
                        <input type="text" name="linked_link" id="linked_link" class="form-control" placeholder="Type your Linkedin URL">
                        
                        <label for="yt_link">Yt link *</label>
                        <input type="text" name="yt_link" id="yt_link" class="form-control" placeholder="Type your Yt link">
                        
                        <label for="insta_link">Instagram Link *</label>
                        <input type="text" name="insta_link" id="insta_link" class="form-control" placeholder="Type your instagram link">
                        
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection