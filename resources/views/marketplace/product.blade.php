@extends('layouts.master')
@section('title', 'Settings MarketPlace')
@section('pagebody')

 <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
        <section class="about_datails">
            <div class="bread_crumb">
                <div class="container">           
                    <ul class="breadcrumb">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">Marketplace Settings</a></li>
                    </ul>
                </div>
            </div><!-- bread_crumb -->
        </section>
        <section class="dash_board_pages">
            <div class="container">
                <div class="row">   
                    <div class="pages_content"> 
                        @include('marketplace.sidebar')
                        <div class="col-md-9 col-sm-9 col-xs-12">                       
                            <div class="new_dashboard">
                                <h1>Add Product</h1>
                                <hr />
                                <form id="post" class="" action="{{url('/')}}/product/store" method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Product Name <span class="acf-required">*</span></label>                                
                                            <input name="name" value="" size="40" class="form-control" type="text" required="">
                                        </div>
                                        <div class="form-group">
                                            <label >Product Short Description  <span class="acf-required">*</span></label>                              
                                            <textarea name="short_message" cols="40" rows="10" class="form-control" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label >Product Description  <span class="acf-required">*</span></label>                                
                                            <textarea name="message" cols="40" rows="10" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label ><b>Product Data </b></label>  <br> 
                                            <label >Regular Price<span class="acf-required">*</span></label>                                
                                            <input name="product_data" value="" size="40" class="form-control" type="number" required="">
                                            <label >Sales Price <span class="acf-required">*</span></label>                                
                                            <input name="price" value="" size="40" class="form-control" type="number" required="">
                                            <label >Sales price start date<span class="acf-required">*</span></label>                                
                                            <input name="start_date" value="" size="40" class="form-control" type="date" required="">
                                            <label >Sales price end date<span class="acf-required">*</span></label>
                                            <input name="end_date" value="" size="40" class="form-control" type="date" required="">
                                        </div>
                                        <div class="form-group">
                                            <label >Product Categories <span class="acf-required">*</span></label>
                                            <br/>Women <input name="category[]" value="Women" size="40" class="" type="checkbox">
                                            <br/>Diaspora <input name="category[]" value="Diaspora" size="40" class="" type="checkbox">
                                            <br/>Youth <input name="category[]" value="Youth" size="40" class="" type="checkbox">
                                            <br/>Social Entrepreneur <input name="category[]" value="Social Entrepreneur" size="40" class="" type="checkbox">
                                            <br/>Uncategorized <input name="category[]" value="Uncategorized" size="40" class="" type="checkbox">
                                        </div>
                                        <div class="form-group">
                                            <label >Product Tag <span class="acf-required">*</span></label>                             
                                            <input name="tags" value="" size="40" class="form-control" type="text" required="">
                                        </div>
                                        <div class="form-group">
                                            <label >Product Image Gallery <span class="acf-required">*</span></label>                               
                                            <input name="product_img" value="" size="40" class="form-control" type="file" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Video </label>
                                            <input name="product_video" id="friend_name-0" value="" accept="video/*" class="btn"  type="file">
                                            OR <br>
                                            <label>Youtube Link</label>
                                            <input name="product_youtube_link" id="friend_name-0" value="" class="form-control"  type="text">
                                        </div>
                                                    <input value="Submit Product" class="btn btn-primary" type="submit">
                                        <style>.error{border:1px solid red}</style>             
                                    </div>
                                </div>
                            </div>    
                            </form>                                      
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->
    


@endsection
