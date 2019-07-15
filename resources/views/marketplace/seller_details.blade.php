@extends('layouts.master')
@section('title', $user->firstname .' '.$user->lastname.' | WCMp Vendors')
@section('pagebody')

 
<section class="sliders">
        <div class="container">
            <div class="center-block slider_content">
                <h1 class="slideInDown animated">{{ $user->firstname }} {{ $user->lastname }}</h1>
                <p>Most of our authors make this their full-time gig selling digital files on our marketplace. just do it...</p>              
                <div class="input-group main_sec"> 
                    <form role="search" method="get" id="searchform" action="#">
                        <input type="text" value="" name="search"  class="form-control" placeholder="Search by product">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <div class="select-style">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Industry</option>
                                <option class="level-0" value="563">Social Entrepreneur</option>
                                <option class="level-0" value="564">Youth</option>
                                <option class="level-0" value="565">Diaspora</option>
                                <option class="level-0" value="566">Women</option>
                                <option class="level-0" value="567">Uncategorized</option>
                            </select>
                        </div>
                    </form>
                </div>
                <ul class="sec_list">
                    <li><a href="#">Add Product Enquiry</a></li>
                    <li><div></div></li>
                    <li><a href="#">Product Enquirys</a></li>                
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
    <!-- section for images -->
    <div id="container">
        <div id="content" role="main">
            <nav class="woocommerce-breadcrumb">
                <div class="breadcrumb">
                    <div class="container">      
                        <ul><a href="#">Home</a>&nbsp;/&nbsp;WCMp Vendors&nbsp;/&nbsp;{{ $user->firstname }} {{ $user->lastname }}</ul>
                    </div>
                </div>
            </nav>          
            <section class="container-fluid product-section">
                <div class="container">            
                    <div class="tab-content right_divs">
                        <div class="tab-pane text-style active" id="most">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
                                    <div class="vendor_description_background" style="width:100%;height:245px;color:#fff;background-size:100% 100%">
                                        <div class="vendor_description">
                                            <div class="vendor_img_add">
                                                <div class="img_div">
                                                    <img src="{{url('/')}}/assets_new/images/WP-stdavatar.png" pagespeed_url_hash="4195747638" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="200" height="200">
                                                </div>
                                                <div class="vendor_address">
                                                    <p><i class="fa fa-envelope-o fa-mail" aria-hidden="true"></i><label>{{ $user->email }}</label></p>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <div class="social_profile"></div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="description_data clearfix">
                                        <div class=" clearfix">
                                            <label><strong>Description</strong></label>                                 
                                            <p></p>
                                        </div>
                                    </div>
                                    @if(count($products) > 0)
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <h6>{{$product->name}}</h6>
                                                                    <div class="mar_rating"></div>
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
                                    @else
                                        <p class="woocommerce-info">No products were found matching your selection.</p>
                                        <aside id="sidebar">
                                            <div id="primary" class="widget-area">
                                                <ul class="sid">
                                                </ul>
                                            </div>
                                        </aside>
                                    @endif
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>  




@endsection
