@extends('layouts.master')
@section('title', 'MarketPlace')
@section('pagebody')
<?php
$categories = DB::table('categories')->where('groupid','1')->get(); ?>
 <section class="sliders">
        <div class="container">
            <div class="center-block slider_content">
                <h1 class="slideInDown animated">market place</h1>
                <p>This is for you if you need extra cash or want to sell or buy a product & Serivce</p>
                <div class="input-group main_sec">
                    <form role="search" method="post" id="searchform" action="{{url('/market-place')}}/search">
                        {{csrf_field()}}
                        <input type="text" value="{{$name}}" name="searchterm"  class="form-control" placeholder="Search by product">
                        <a onclick="this.form.submit()"><i class="fa fa-search" aria-hidden="true"></i></a>
                        <div class="select-style">
                            <select name="category" id="cat" class="postform" onchange="this.form.submit()">
                                <option class="level-0" value="">@if($category == '') Categories @else {{$category}} @endif</option>
                          @foreach($categories as $category)
                                <option class="level-0" value="{{$category->name}}">{{$category->name}}</option>
                          @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <ul class="sec_list">
                    <li><a href="{{url('/')}}/market-place/add-product-enquiry">Add Product Enquiry</a></li>
                    <li><div></div></li>
                    <li><a href="{{url('/')}}/requirement-list">Product Enquirys</a></li>
                </ul>
            </div><!-- slider_content -->
            <ul class="s_list">
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>

<section class="myaccount-body">
    <div class="myaccount-document">
        <div class="container">
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>
</section>
    <!-- section for images -->
    <section class="mourinze_tomato">
        <div class="container">
            <ul class="nav pills tomato_link">
                <li class="active"><a href="#most" data-toggle="tab">most recent</a></li>
                <li><div class="cent_line"></div></li>
                <li><a href="#top" data-toggle="tab">top products</a></li>
                <li><div class="cent_line"></div></li>
                <li><a href="#feature" data-toggle="tab">featured products</a></li>
            </ul>
            <!-- Most Recent -->
            @if(count($products) > 0)
            <div class="tab-content right_divs">
                <div class="tab-pane text-style 123 active" id="most">
                    <div class="row">
                        <div class="woocommerce columns-4">
                        @foreach($products as $product)
                            <div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">
                                            <img src="{{$product->imagepath}}" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{$product->imagepath}} 300w, images/5.jpg 150w, {{$product->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="{{url('/')}}/buynow" method="post">
                                                    {{csrf_field()}}
                                                    <input name="product_id" value="{{$product->id}}" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal{{$product->id}}">DETAILS</button>
                                                @php
                                                    $ratings = $product->ratings;
                                                    $rates = [0 => 0,1 => 0,2 => 0,3 => 0,4 => 0];
                                                    foreach ($ratings as $rating) {
                                                        $rates[$rating->rating] += 1;
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>{{$product->name}}
                                            <form method="post" action="{{url('/product/add-to-favorite')}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$product->id}}" name="id">
                                                <button type="submit" class="btn"><i class="far fa-heart" style="color: red"></i></button>
                                            </form>
                                        </h6>
                                        <div class="mar_rating">
                                            @for ($i = 0;$i < array_search(max($rates),$rates);$i++)
                                                <i class="fas fa-star" style="color: orange"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModal{{$product->id}}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="pop_img">
                                                                <figure>
                                                                    <img src="{{$product->imagepath}}" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{$product->imagepath}} 300w, images/5.jpg 150w, {{$product->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                                                </figure>
                                                                <ul>
                                                                    <li id="shareit-menu" class="share" tabindex="1000"><a class="addthis_button_compact">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i> Share</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                            <div class="pop_content">
                                                                <h6>{{$product->name}}</h6>
                                                                <p></p><p>{{$product->description}}</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->sale_price}}</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="{{url('/')}}/addcart/{{$product->id}}" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>

                                                                    <form class="cart1" action="{{url('/')}}/buynow" method="post">
                                                                    {{csrf_field()}}
                                                                        <input name="product_id" value="{{$product->id}}" type="hidden">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>
                                                                </div>
                                                                <a id="id-4524" href="{{url('/product')}}/{{$product->id}}" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="{{url('/')}}/requirement-list">
                                <button type="button" class="btn btn-default btn-block btn-raise btn_veiw_all">View All</button>
                            </a>
                        </div>
                    </div><!-- row -->
                </div>
                <!-- top products -->
                <div class="tab-pane text-style 1234" id="top">
                    <div class="row">
                        @foreach($products as $product)
                        <div class="woocommerce columns-4">
                            <div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">
                                            <img src="{{$product->imagepath}}" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{$product->imagepath}} 300w, images/5.jpg 150w, {{$product->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="{{url('/')}}/buynow" method="post">
                                                    {{csrf_field()}}
                                                    <input name="product_id" value="{{$product->id}}" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal{{$product->id}}">DETAILS</button>
                                                @php
                                                    $ratings = $product->ratings;
                                                    $rates = [0 => 0,1 => 0,2 => 0,3 => 0,4 => 0];
                                                    foreach ($ratings as $rating) {
                                                        $rates[$rating->rating] += 1;
                                                    }
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>{{$product->name}}
                                            <form method="post" action="{{url('/product/add-to-favorite')}}">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$product->id}}" name="id">
                                                <button type="submit" class="btn"><i class="far fa-heart" style="color: red"></i></button>
                                            </form>
                                        </h6>
                                        <div class="mar_rating">
                                            @for ($i = 0;$i < array_search(max($rates),$rates);$i++)
                                                <i class="fas fa-star" style="color: orange"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="modal fade" id="myModal{{$product->id}}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                                            <div class="pop_img">
                                                                <figure>
                                                                    <img src="{{$product->imagepath}}" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{$product->imagepath}} 300w, images/5.jpg 150w, {{$product->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                                                </figure>
                                                                <ul>
                                                                    <li id="shareit-menu" class="share" tabindex="1000"><a class="addthis_button_compact">
                                                                        <i class="fa fa-plus" aria-hidden="true"></i> Share</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                                            <div class="pop_content">
                                                                <h6>{{$product->name}}</h6>
                                                                <p></p><p>{{$product->description}}</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->sale_price}}</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="{{url('/')}}/addcart/{{$product->id}}" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>

                                                                    <form class="cart1" action="{{url('/')}}/buynow" method="post">
                                                                    {{csrf_field()}}
                                                                        <input name="product_id" value="{{$product->id}}" type="hidden">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>
                                                                </div>
                                                                <a id="id-4524" href="{{url('/product')}}/{{$product->id}}" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="top-rated-products.html"><button type="button" class="btn btn-default btn-block btn-raise btn_veiw_all">View All</button></a>
                        </div>
                    </div><!-- row -->
                </div>
                <!-- featured project -->
                <div class="tab-pane text-style 12345" id="feature">
                    <div class="row">
                        <div class="woocommerce columns-4"><p class="woocommerce-info no_products">No products found </p></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="#"><button type="button" class="btn btn-default btn-block btn-raise btn_veiw_all">View All</button></a>
                        </div>
                    </div><!-- row -->
                </div><!-- pan -->
            </div><!-- tab content -->
            @endif
        </div><!-- container -->
    </section>
    <section class="form_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 slideInLeft animated">
                    <p><span>Have</span> custom Product Enquiry?</p>
                    <h1 class="text-right">post here</h1>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 slideInRight animated ">
                    <form class="req_success_messsage" method="post" action="{{url('/')}}/market-place/custom-enquiry/store">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input class="form-control name required" id="exampleInputtext" required="required" name="email" placeholder="Email" type="text">
                        </div>
                        <div class="select-style form_arrow">
                            <select name="cat" id="cat" class="postform" required="required" onchange="setName(this)">
                                <option class="level-0" value="562">Category</option>
                                <option class="level-0" value="563">Social Entrepreneur</option>
                                <option class="level-0" value="564">Youth</option>
                                <option class="level-0" value="565">Diaspora</option>
                                <option class="level-0" value="566">Women</option>
                                <option class="level-0" value="567">Uncategorized</option>
                            </select>
                        </div>
                        <input type="hidden" name="cat_text" id="cat_text" value="Category">
                        <textarea class="form-control requirement required" rows="3" placeholder="Enter requirement" name="requirement" required="required"></textarea>
                        <button type="submit" class="btn btn-default btn-block btn-raise btn_veiw_all requirement_submit">Submit</button>
                    </form>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <section class="top_seller">
        <div class="container">
            <div class="row">
                <h2 class="vendor-headding-custom">Top sellers</h2>
                @foreach($top_seller as $sellers)
                    <div class="col-md-2 col-sm-2 col-xs-12 img_sec">
                        <div class="images_12_sell" style="height: 350px;">
                            <div class="animate_img">
                                <a href="{{ url('market-place/seller/'.$sellers->id) }}">
                                    <img class="img-responsive vendor_img" src="{{url('/')}}/assets_new/images/WP-stdavatar.png" id="vendor_image_display" width="125">
                                </a>
                                <div class="textbox">
                                    <div class="v_center">
                                        <a href="{{ url('market-place/seller/'.$sellers->id) }}">
                                            <button type="button" class="btn btn-primary btn-lg btn-block">DETAILS</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <h6>{{ $sellers->firstname }} {{ $sellers->lastname }}</h6>
                            <div class="row lead">
                                <div style="width:100%; height:50px; margin-bottom:5px; padding-left:15px;">
                                    <div>No Rating Yet</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div><!-- row -->
        </div><!-- container -->
    </section>
    <!-- Contact Section Starts Here    -->
        <section class="contact-form">
            <button type="button" id="getform" class="btn btn-default btn-circle btn-lg"><img src="{{url('/')}}/assets_new/images/call.png" /></button>
            <div id="contact-toggle" class="contact-content">
                <div class="container">
                    <form name="" action="#" method="post" >
                        <h3 style="color:#fff !important;">Contact Form</h3>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Name (Required)</label>
                            <input name="your-name" value="" size="40" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Email (Required)</label>
                            <input name="your-email" value="" size="40" class="form-control" type="email">
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Subject</label>
                            <input name="your-subject" value="" size="40" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Message</label>
                            <textarea name="your-message" cols="40" rows="10" class="form-control"></textarea>
                        </div>
                        <input value="send" class="btn btn-primary" type="submit">
                    </form>
                </div>
            </div>
        </section>
<script>
    function setName(val) {
        jQuery('#cat_text').val(jQuery(val).find("option:selected").text());
    }
</script>
@endsection
