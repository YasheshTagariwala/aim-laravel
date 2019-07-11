@extends('layouts.master')
@section('title', 'View Orders')
@section('pagebody')
<!-- section for images -->
  <section class="about_datails">
    <div class="bread_crumb">
      <div class="container">      
        <ul class="breadcrumb">
          <li><a href="#">HOME</a></li>
          <li><a href="#">SHOPPING CART</a></li>
        </ul>
      </div>
        </div><!-- bread_crumb -->
  </section>  
  {{csrf_field()}}
  <input type="hidden" name="_token" value="{{csrf_field()}}">
  <section class="shop_cart_summary">
    <div class="container">
      <div class="woocommerce">
        <form action="#" method="post">
          <div class="row">        
            <ul class="nav pills">
              <li class="active"><a href="#" data-toggle="tab" class="active"><i class="fa fa-shopping-cart active" aria-hidden="true"></i> <br>Summary</a></li>
              <li><a href="#" data-toggle="tab"><i class="fa fa-home" aria-hidden="true"></i> <br>Address &amp; Payment</a></li>
              <li><a href="#1234" data-toggle="tab"><img src="{{url('/assets_new')}}/images/card2.png" pagespeed_url_hash="2663400662" onload=""><br> Order Status</a></li>
            </ul>             
            <!--div class="woocommerce-message"><a href="#" class="button wc-forward">Continue Shopping</a> â€œProduct 3â€ has been added to your cart.</div-->
            <div class="tab-content">
              <div class="tab-pane text-style active clearfix" id="back">
                <div id="no-more-tables" class="table_res clearfix">             
                  <div class="cart-collaterals"></div>
                  <table class="col-md-12 table-bordered table-condensed cf summary_table">
                    <thead class="cf">
                      <tr>
                        <th class="numeric product">Product</th>
                        <th class="numeric name_decri">Name &amp; Decription</th>
                        <th class="numeric">Price</th>
                        <th class="numeric" style="width: 15px;">Qty</th>
                        <th class="numeric">Total</th>
                        <th class="numeric"></th>                     
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($products as $product)
                      <tr class="cart_item name_desc">
                        <td class="numeric">
                          <a href="#">
                            <img src="{{$product->imagepath}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="5" width="180" height="180">
                          </a>
                        </td>
                        <td class="numeric product-name">
                          <h4>{{$product->name}}</h4>
                          <p></p>
                        </td>                     
                        <td class="numeric text-center">
                          <span class="avail_span">
                            <span class="woocommerce-Price-amount amount">
                              <span class="woocommerce-Price-currencySymbol">$</span>{{$product->sale_price}}
                            </span>
                          </span>
                        </td>
                        <td class="numeric product-quantity">
                          <div class="input-group adding">
                            <span class="input-group-btn">
                              <button class="btn btn-white btn-minuse minas_butt" type="button" onclick="subqty('{{$product->id}}');">-</button>
                            </span>
                            <div class="quantity">
                              <input type="number" step="1" min="0" max="" value="{{$product->qty}}" id="qty_val{{$product->id}}" title="Qty" class="input-text qty text" size="1" pattern="[0-9]*" style="width: 45px;">
                            </div>
                            <span class="input-group-btn">
                              <button class="btn btn-red btn-pluss plus_butt" type="button" onclick="addqty('{{$product->id}}');">+</button>
                            </span>
                          </div><!-- /input-group -->
                        </td>
                        <td class="numeric product-subtotal text-center">
                          <span class="color_span">
                            <span class="woocommerce-Price-amount amount" id="pricediv{{$product->id}}">
                              <span class="woocommerce-Price-currencySymbol">$</span>{{ $product->qty * $product->sale_price }}
                            </span>
                          </span>
                          <input type="hidden" name="price{{$product->id}}" id="price{{$product->id}}" value="{{$product->sale_price}}">
                        </td>
                        <td class="numeric product-remove text-center">
                          <a href="{{url('/cart')}}/del/{{$product->id}}" class=" " title="Remove this item" ><!--&times;--> <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>                
                      </tr>@endforeach
                      <!-- <tr>
                        <td colspan="4">
                          <div class="coupon">
                            <label for="coupon_code">Coupon:</label> 
                            <input type="text" name="coupon_code" class="input-text" placeholder="Coupon code"> <input type="submit" class="button" name="apply_coupon" value="Apply Coupon">
                          </div>
                        </td>
                        <td colspan="2" align="right">
                          <input type="submit" class="button update-btn" name="update_cart" value="Update Cart">
                        </td>
                      </tr> -->
                      <tr></tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <a href="{{url('/market-place')}}" class="btn btn-default btn-lg back_shop"><img src="{{url('/assets_new')}}/images/leftarrow.png" > Back to Shopping</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <a href="{{url('/checkout')}}" class="btn btn-default btn-lg chechout">Proceed to Checkout <img src="{{url('/assets_new')}}/images/rightarrow.png" onload=""></a>
                </div> 
              </div><!-- tab-pane -->
            </div><!-- tab-content -->
          </div><!-- row -->
        </form>
      </div><!-- container -->        
    </div>
  </section>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $.noConflict();
    function addqty(id) {
      var qty = document.getElementById("qty_val"+id).value;
      var price = document.getElementById("price"+id).value;

      qty = parseInt(qty);
      price = parseInt(price);
      //alert(id);
        qty = qty+1;
        price = qty*price;
        changeQty(id, qty);
        document.getElementById("qty_val"+id).value = qty;
        document.getElementById('pricediv'+id).innerHTML = '$'+price;
    }

    function changeQty(id, qty){
           qty = parseInt(qty);
           var token = jQuery('input[name=_token]').val();
           jQuery.ajax({
             headers: {'X-CSRF-TOKEN': token},
             data:  {qty:qty,id:id},
             type: "post",
             url: "{{ url('/changeqty') }}",
             dataType: "JSON",
               success: function(data){
                alert(data);
             }
           });
      }

    function subqty(id) {
      var qty = document.getElementById("qty_val"+id).value;
      var price = document.getElementById("price"+id).value;

      qty = parseInt(qty);
      price = parseInt(price);
      //alert(qty + value);
        qty = qty-1;
        price = qty*price;
        if(qty > 0){
          changeQty(id, qty);
          document.getElementById("qty_val"+id).value = qty;
          document.getElementById('pricediv'+id).innerHTML = '$'+price;
      }
    }
  </script>
@endsection
