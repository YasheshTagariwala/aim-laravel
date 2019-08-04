@extends('layouts.master')
@section('title', 'Product Details')
@section('pagebody')

 <!-- section for images -->
    
    
    
    
    
    <section class="about_datails">    
    <div id="container">
        <div id="content" role="main">
            <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                <div class="breadcrumb">
                    <div class="container">      
                        <ul><a href="{{url('/')}}/market-place">Home</a>&nbsp;/&nbsp;<a href="#">Women</a>&nbsp;/&nbsp;{{$product[0]->name}}</ul>
                    </div>
                </div>
            </nav>
            <div itemscope="" itemtype="" id="product-4524" class="">
                <div class="about_imgsec">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 back_to_pro">
                                <a href="{{url('/')}}/market-place">
                                    <img src="{{url('/')}}/assets_new/images/arrow1.png" > back to products
                                </a>
                            </div>          
                            <div class="col-md-5 images text-center">   
                                <a href="{{$product[0]->imagepath}}" itemprop="image" class="col-sm-9 woocommerce-main-image zoom" title="" data-rel="prettyPhoto">
                                    <img src="{{$product[0]->imagepath}}" class="attachment-shop_single size-shop_single wp-post-image" alt="5" title="5" srcset="{{$product[0]->imagepath}} 300w, {{$product[0]->imagepath}} 150w, {{$product[0]->imagepath}} 180w" sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="300" height="300">
                                </a>    
                            </div>
                            <div class="col-md-6  col-sm-6 col-xs-12  summary entry-summary">
                                <div class="produ_decrip"><h6 itemprop="name" class="product_title entry-title">{{$product[0]->name}}</h6>
                                    <div itemprop="offers" itemscope="" itemtype="">
                                        <p class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product[0]->sale_price}}</span></p> 
                                    </div>
                                    <div itemprop="description">
                                        <p>{{$product[0]->description}}</p>
                                    </div>
                                    <div class="product_meta"></div>
                                    <form class="cart" action="{{url('/')}}/buynow" method="post">     {{csrf_field()}}
                                        <input name="product_id" value="{{$product[0]->id}}" type="hidden">
                                        <div class="quantity">
                                            <input step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" type="number">
                                        </div>
                                        <button type="submit" class="single_add_to_cart_button button alt btn btn-default btn-lg">Buy Now</button>
                                    </form>
                                    <div class="product_meta"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <option class="level-0" value="">Categories</option>
                                @foreach($categories as $category)
                                    <option class="level-0" value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
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



 <script>
     function setName(val) {
         jQuery('#cat_text').val(jQuery(val).find("option:selected").text());
     }
 </script>
    

@endsection
