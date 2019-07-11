@extends('layouts.master')
@section('title', 'Product Details')
@section('pagebody')

 
    <section class="sliders">
        <div class="container">
            <div class="center-block slider_content">
                <h1 class="slideInDown animated">Recent Products</h1>
                <p>Most of our authors make this their full-time gig selling digital files on our marketplace. just do it...</p>              
                <div class="input-group main_sec"> 
                    <form role="search" method="get" id="searchform" action="#">
                        <input type="text" value="" name="search"  class="form-control" placeholder="Search by product">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <div class="select-style">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Select Categories</option>
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
    <section class="mourinze_tomato">        
        <div class="container">          
            <!-- Most Recent -->
            <div class="tab-content right_divs">
                <div class="tab-pane text-style 123 active" id="most">
                    <div class="row">
                        <div class="woocommerce columns-4">             
                            <div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">             
                                            <img src="{{url('/')}}/assets_new/images/5.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{url('/')}}/assets_new/images/5.jpg 300w, images/5.jpg 150w, images/5.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="#" method="post">
                                                    <input name="add-to-cart" value="4524" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>                                                             
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal4524">DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>Product 3</h6>
                                        <div class="mar_rating"></div>
                                    </div>
                                    <div class="modal fade" id="myModal4524" role="dialog">
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
                                                                    <img src="{{url('/')}}/assets_new/images/5.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="5" srcset="{{url('/')}}/assets_new/images/5.jpg 300w, images/5.jpg 150w, images/5.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">                                         
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
                                                                <h6>Product 3</h6>
                                                                <p></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi metus, sollicitudin quis posuere eget, rhoncus eget leo. Cras pulvinar turpis vel massa feugiat, ac varius magna pharetra. Integer ultrices lorem odio. Quisque bibendum vulputate rutrum. Cras nisl nibh, tristique at eros id, aliquam ultricies justo. Vivamus enim neque, malesuada at maximus eget, dignissim sed nulla. Nulla euismod mollis congue. Etiam vel pretium purus. Vivamus enim sem, suscipit eget magna id, iaculis ultrices orci. Sed finibus nibh id elit varius suscipit. Nunc lobortis mauris ac augue mollis, quis lobortis ante faucibus. Curabitur pellentesque metus vitae est mattis, id tempus tellus aliquam. Morbi eu magna pharetra, tempor nisi ut, mattis odio. Nunc ornare id neque a luctus. Mauris massa lorem, volutpat eget facilisis scelerisque, tempor nec libero.</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                                    <form class="cart1" action="#" method="post">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>
                                                                </div>
                                                                <a id="id-4524" href="{{url('/product')}}" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>                                         
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-12 img_sec">
                                <div class="reach" style="height: 289px;">
                                    <div class="animate_img">
                                        <div class="loop_prdt_img">             
                                            <img src="{{url('/')}}/assets_new/images/6.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="6" srcset="{{url('/')}}/assets_new/images/6.jpg 300w, images/6.jpg 150w, images/6.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                        </div>
                                        <div class="textbox">
                                            <div class="v_center">
                                                <form class="cart1" action="#" method="post">
                                                    <input name="add-to-cart" value="4524" type="hidden">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block">BUY NOW</button>
                                                </form>                                                             
                                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal5001">DETAILS</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <h6>Subscription</h6>
                                        <div class="mar_rating"></div>
                                    </div>
                                    <div class="modal fade" id="myModal5001" role="dialog">
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
                                                                    <img src="{{url('/')}}/assets_new/images/6.jpg" class="attachment-shop_catalog img-responsive size-shop_catalog img-responsive wp-post-image" alt="6" srcset="{{url('/')}}/assets_new/images/6.jpg 300w, images/6.jpg 150w, images/6.jpg 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">                                         
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
                                                                <h6>Subscription</h6>
                                                                <p></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nisi metus, sollicitudin quis posuere eget, rhoncus eget leo. Cras pulvinar turpis vel massa feugiat, ac varius magna pharetra. Integer ultrices lorem odio. Quisque bibendum vulputate rutrum. Cras nisl nibh, tristique at eros id, aliquam ultricies justo. Vivamus enim neque, malesuada at maximus eget, dignissim sed nulla. Nulla euismod mollis congue. Etiam vel pretium purus. Vivamus enim sem, suscipit eget magna id, iaculis ultrices orci. Sed finibus nibh id elit varius suscipit. Nunc lobortis mauris ac augue mollis, quis lobortis ante faucibus. Curabitur pellentesque metus vitae est mattis, id tempus tellus aliquam. Morbi eu magna pharetra, tempor nisi ut, mattis odio. Nunc ornare id neque a luctus. Mauris massa lorem, volutpat eget facilisis scelerisque, tempor nec libero.</p>
                                                                <p></p>
                                                                <h1>
                                                                    <i class="fa" aria-hidden="true"></i> <span><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>300.00</span></span>
                                                                </h1>
                                                               <div class="buttons_pop">
                                                                    <a rel="nofollow" href="#" data-quantity="1" data-product_id="4524" data-product_sku="" class="btn btn-default btn-lg add_tocart buttons_pop product_type_simple add_to_cart_button ajax_add_to_cart">Add to cart</a>
                                                                    <form class="cart1" action="#" method="post">
                                                                        <input name="add-to-cart" value="4524" type="hidden">
                                                                        <button type="submit" class="btn btn-default btn-lg buy_now"><i class="fa fa-usd" aria-hidden="true"></i> BUY NOW</button>
                                                                    </form>
                                                                </div>
                                                                <a id="id-4524" href="#" title="Product 3"><button type="button" class="btn btn-default btn-lg btn-block">More Details</button></a>                                         
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
                    </div><!-- row -->
                </div>              
            </div><!-- tab content -->
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
                    <form class="req_success_messsage">
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input class="form-control name required" id="exampleInputtext" name="name" placeholder="Name" type="text">
                        </div>
                        <div class="select-style form_arrow">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Industry</option>
                                <option class="level-0" value="563">Social Entrepreneur</option>
                                <option class="level-0" value="564">Youth</option>
                                <option class="level-0" value="565">Diaspora</option>
                                <option class="level-0" value="566">Women</option>
                                <option class="level-0" value="567">Uncategorized</option>
                            </select> 
                        </div>
                        <textarea class="form-control requirement required" rows="3" placeholder="Enter requirement" name="requirement" required="required"></textarea>
                        <button type="submit" class="btn btn-default btn-block btn-raise btn_veiw_all requirement_submit">Submit</button>
                    </form>
                </div>            
            </div><!-- row -->
        </div><!-- container -->
    </section>  
    
    

@endsection