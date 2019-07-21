@extends('layouts.master')
@section('title','Account')
@section('pagebody')
    <section class="myaccount-header">
        <div class="container">
            <h1>Profile</h1>
            <p></p>
        </div>
    </section>
    <section class="myaccount-body">
        <div class="container">
            <div class="tab-content right_divs">
                <div class="tab-pane text-style active" id="most">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>{{ $user->firstname }} {{ $user->lastname }}</h1>
                            <div class="vendor_description_background" style="width:100%;color:#000000;background-size:100% 100%">
                                <div class="vendor_description">
                                    <div class="vendor_img_add">
                                        <div class="vendor_address">
                                            <p><i class="fa fa-envelope-o fa-mail" aria-hidden="true"></i>
                                                <label>{{ $user->email }}</label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($products) && count($products) > 0)
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
@endsection
