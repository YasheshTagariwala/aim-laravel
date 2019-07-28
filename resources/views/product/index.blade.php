@extends('layouts.master')
@section('title', 'Product Details')
@section('pagebody')

    <!-- section for images -->
<style>
    div.stars {
        width: 270px;
        display: inline-block;
    }

    input.star { display: none; }

    label.star {
        float: right;
        padding: 10px;
        font-size: 36px;
        color: #444;
        transition: all .2s;
    }

    input.star:checked ~ label.star:before {
        content: '\f005';
        color: #FD4;
        transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
        color: #FE7;
        text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
        content: '\f006';
        font-family: FontAwesome;
    }
</style>




    <section class="about_datails">
        <div id="container">
            <div id="content" role="main">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                    <div class="breadcrumb">
                        <div class="container">
                            <ul><a href="{{url('/')}}/market-place">Home</a>&nbsp;/&nbsp;<a href="#">Women</a>&nbsp;/&nbsp;{{$product->name}}
                            </ul>
                        </div>
                    </div>
                </nav>
                <div itemscope="" itemtype="" id="product-4524" class="">
                    <div class="about_imgsec">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 back_to_pro">
                                    <a href="{{url('/')}}/market-place">
                                        <img src="{{url('/')}}/assets_new/images/arrow1.png"> back to products
                                    </a>
                                </div>
                                <div class="col-md-5 images text-center">
                                    <a href="{{$product->imagepath}}" itemprop="image"
                                       class="col-sm-9 woocommerce-main-image zoom" title="" data-rel="prettyPhoto">
                                        <img src="{{$product->imagepath}}"
                                             class="attachment-shop_single size-shop_single wp-post-image" alt="5"
                                             title="5"
                                             srcset="{{$product->imagepath}} 300w, {{$product->imagepath}} 150w, {{$product->imagepath}} 180w"
                                             sizes="(max-width: 300px) 100vw, 300px" pagespeed_url_hash="816394685"
                                             onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                             width="300" height="300">
                                    </a>
                                </div>
                                <div class="col-md-6  col-sm-6 col-xs-12  summary entry-summary">
                                    <div class="produ_decrip"><h6 itemprop="name"
                                                                  class="product_title entry-title">{{$product->name}}</h6>
                                        <div itemprop="offers" itemscope="" itemtype="">
                                            <p class="price"><span class="woocommerce-Price-amount amount"><span
                                                        class="woocommerce-Price-currencySymbol">$</span>{{$product->sale_price}}</span>
                                            </p>
                                        </div>
                                        <div itemprop="description">
                                            <p>{{$product->description}}</p>
                                        </div>
                                        <div class="product_meta"></div>
                                        <form class="cart" action="{{url('/')}}/buynow" method="post"
                                              enctype="multipart/form-data">{{csrf_field()}}
                                            <input name="product_id" value="{{$product->id}}" type="hidden">
                                            <div class="quantity">
                                                <input step="1" min="1" max="" name="quantity" value="1" title="Qty"
                                                       class="input-text qty text" size="4" pattern="[0-9]*"
                                                       inputmode="numeric" type="number">
                                            </div>
                                            <button type="submit"
                                                    class="single_add_to_cart_button button alt btn btn-default btn-lg">
                                                Buy Now
                                            </button>
                                        </form>
                                        <div class="product_meta"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h2>Product Ratings</h2>
                    @if(count($product_ratings) > 0)
                        @foreach($product_ratings as $rating)
                            <div class="col-md-12">
                                Name :- {{$rating->user->firstname}} {{$rating->user->lastname}} <br>
                                Rating :-
                                @for($i = 0;$i < $rating->rating;$i++)
                                    <p class="fa fa-star"></p>
                                @endfor
                                <br>
                                Review :- {{$rating->review}}<br>
                                Date :- {{date('Y-m-d',strtotime($rating->updated_at))}}<br>
                            </div>
                        @endforeach
                    @else
                        No Ratings Yet
                    @endif
                </div>
                <br><br><br>
                <div class="container">
                    @if(isset($rating) && count((array)$rating) > 0)
                        <form action="{{url('/product/ratingstore')}}" method="post">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="control-label">Rating</label>
                                            <div class="control">
                                                <div class="col-md-5">
                                                    <input class="star star-5" id="star-5" type="radio" value="5" name="rating"/>
                                                    <label class="star star-5" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" value="4" name="rating"/>
                                                    <label class="star star-4" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" value="3" name="rating"/>
                                                    <label class="star star-3" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" value="2" name="rating"/>
                                                    <label class="star star-2" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" value="1" name="rating"/>
                                                    <label class="star star-1" for="star-1"></label>
                                                </div>
                                                {{--<select name="rating" class="form-control" required>--}}
                                                {{--<option value="1">1</option>--}}
                                                {{--<option value="2">2</option>--}}
                                                {{--<option value="3">3</option>--}}
                                                {{--<option value="4">4</option>--}}
                                                {{--<option value="5">5</option>--}}
                                                {{--</select>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Review</label>
                                            <div class="control">
                                                <textarea name="review" required class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label"></label>
                                            <div class="control">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
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
                    <form class="req_success_messsage">
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input class="form-control name required" id="exampleInputtext" name="name"
                                   placeholder="Name" type="text">
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
                        <textarea class="form-control requirement required" rows="3" placeholder="Enter requirement"
                                  name="requirement" required="required"></textarea>
                        <button type="submit"
                                class="btn btn-default btn-block btn-raise btn_veiw_all requirement_submit">Submit
                        </button>
                    </form>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </section>






@endsection
