@extends('layouts.master')
@section('title', 'View Donation')
@section('pagebody')
<script src="https://js.stripe.com/v3/"></script>


<!-- section for images -->
  <section class="about_datails">
    <div class="bread_crumb">
      <div class="container">      
        <ul class="breadcrumb">
          <li><a href="#">HOME</a></li>
          <li><a href="#">CHECK OUT</a></li>
        </ul>
      </div>
        </div><!-- bread_crumb -->
  </section>  
  <section class="shop_cart_summary">
    <div class="container">
      <div class="woocommerce">    
        <div class="row">      
          <div class="tab-content">
            <div class="tab-pane text-style summry_form active" id="proceed">
              <div class="clearfix billing-order-details">           
            <h4> Your Donation Has Been Transfered Succesfully ! <a href="{{url('/market-place')}}">  Go Back To Home</a></h4> 
            </div>
          </div><!-- tab-content -->
        </div><!-- row -->
      </div>   
    </div></div>
  </section>
 


@endsection