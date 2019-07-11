@extends('layouts.master')
@section('title', 'Payment History MarketPlace')
@section('pagebody')

 <section class="custom_requi_details">
            <div class="bread_crumb">
                <div class="container">          
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div class="reqiu_details_1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12  col-sm-12 col-xs-12 back_to_pro">
                            <a href="{{url('/market-place')}}/product-enquiry"><img src="{{url('/')}}/assets_new/images/arrow1.png"> back to products</a>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <img src="{{url('/')}}/assets_new/images/placeholder.png" alt="4" class="img-responsive left_img" />
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12 right_content_12">
                            <h2></h2>
                            <div class="content_detail">
                                <p></p>                
                            </div>
                            <div class="comments-details">              
                                <section id="comments"></section><!-- /#comments -->
                                <section id="respond" class="respond no-border">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Leave a Comment</h3>                                    
                                            <form action="#" method="post" id="commentform">
                                                <p>Logged in as <a href="#">Organization AIM</a>.<a href="#" title="Log out of this account">Log out Â»</a></p>
                                                <div class="form-group">
                                                    <textarea name="comment" id="comment" class="form-control" rows="5" aria-required="true" placeholder="*Comment"></textarea>
                                                </div>
                                                <input name="submit" class="btn-primary" id="submit" value="Post Comment" type="submit">
                                            </form>
                                        </div>
                                    </div>
                                </section><!-- /#respond -->
                            </div>
                        </div>
                    </div>
                </div><!-- container -->
            </div><!-- reqiu_details_imgsec -->
        </section>  
    <!-- section for images -->
    

@endsection