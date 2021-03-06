@extends('layouts.master')
@section('title', 'View Orders')
@section('pagebody')
<?php $countries = DB::table('countries')->get(); ?>
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
          <ul class="nav pills">
            <li class="active"><a href="#" class="active"><i class="fa fa-shopping-cart active" aria-hidden="true"></i> <br>Summary</a></li>
            <li class="active"><a href="#/" class="active"><i class="fa fa-home active" aria-hidden="true"></i> <br>Address &amp; Payment</a></li>
            <li><a href="#1234"><img src="{{url('/assets_new')}}/images/card2.png" pagespeed_url_hash="2663400662" ><br> Order Status</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane text-style summry_form active" id="proceed">
              <div class="clearfix billing-order-details">           
            <form action="/placeorder" method="post" id="payment-form">
            {{csrf_field()}}
                <div class="col2-set row" id="customer_details">
                  <div class="col-1">
                    <div class="woocommerce-billing-fields">  
                      <h3>Billing Details</h3>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <label style="display: block;">First Name    <span class="acf-required">*</span></label>
                            <input name="firstname" id="friend_name-0" value="" class="form-control" type="text">
                          </div>
                          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <label style="display: block;">Last Name   <span class="acf-required">*</span></label>
                            <input name="lastname" id="friend_name-0" value="" class="form-control" type="text">
                          </div>
                        </div>
                      </div>  
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <label style="display: block;">Company Name </label>
                            <input name="companyname" id="friend_name-0" value="" class="form-control" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <label style="display: block;">Email Address   <span class="acf-required">*</span></label>
                            <input name="email" id="friend_name-0" value="" class="form-control" type="email">
                          </div>
                          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <label style="display: block;">Phone  <span class="acf-required">*</span></label>
                            <input name="phone" id="friend_name-0" value="" class="form-control" type="tel">
                          </div>
                        </div>
                      </div>  
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <label style="display: block;">Country <span class="acf-required">*</span></label>
                            <select class="form-control" name="country">
                              <option value="">Select Country</option>
                              @foreach($countries as $country)
                              <option value="{{$country->name}}">{{$country->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <label style="display: block;">Address <span class="acf-required">*</span></label>
                            <input name="address" id="friend_name-0" value="" class="form-control" type="text" placeholder="Street address"><br/>
                            <input name="appartmentno" id="friend_name-0" value="" class="form-control" type="text" placeholder="Apartment, suite, unit etc. (optional)">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                            <label style="display: block;">Town / City <span class="acf-required">*</span></label>
                            <input name="city" id="friend_name-0" value="" class="form-control" type="text">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <label style="display: block;">State / County   <span class="acf-required">*</span></label>
                            <select class="form-control" name="state">
                              <option value="">Select Country</option>
                              @foreach($countries as $country)
                              <option value="{{$country->name}}">{{$country->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
                            <label style="display: block;">Postcode / ZIP  <span class="acf-required">*</span></label>
                            <input name="zipcode" id="friend_name-0" value="" class="form-control" type="text">
                          </div>
                        </div>
                      </div>
                    </div>  
                  </div>
                  <div class="col-2">    
                    <div class="woocommerce-shipping-fields">
                      <h3>Additional Information</h3>
                      <p class="form-row form-row notes" id="order_comments_field"><label for="order_comments" class="" style="display: block;">Order Notes</label><textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="3" cols="70"></textarea></p>
                    </div>          
                    <div class="woocommerce-shipping-fields">
                    <h3>Order Details</h3>
                      <table class="shop_table woocommerce-checkout-review-order-table table bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th class="product-name">Product</th>
                            <th class="product-total">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $total_amount=0; $i = 1; ?>
                      @foreach($products as $product)
                          <tr class="cart_item">
                            <td class="product-name">{{$product->name}} <strong class="product-quantity">x {{$product->qty}}</strong></td>
                            <td class="product-total">
                              <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">$</span><?php $amount = $product->qty*$product->sale_price;  
                                $total_amount+=$amount; ?> {{$amount}}
                              </span>           
                            </td>
                          </tr>

                      <input type="hidden" name="product_id{{$i}}" value="{{$product->id}}">
                      <input type="hidden" name="product_qty{{$i}}" value="{{$product->qty}}">
                      <input type="hidden" name="product_amount{{$i}}" value="{{$amount}}">
                      <input type="hidden" name="product_count" value="{{count($products)}}">
                      <?php $i++; ?>
                      @endforeach
                        </tbody>
                        <tfoot>
                          <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$total_amount}}</span></td>
                          </tr>
                          <tr class="order-total">
                            <th>Total</th>
                            <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$total_amount}}</span></strong> </td>
                          </tr>
                        </tfoot>
                      </table>
                      <input type="hidden" name="total_amount" value="{{$total_amount}}">
                      @if(Session::has('order_id'))
                        <input type="hidden" name="order_id" value="{{ Session::get('order_id') }}">
                      @else
                        <input type="hidden" name="order_id" value="">
                      @endif
                    </div>
                      <div id="payment" class="woocommerce-checkout-payment">
                       
                    <div class="woocommerce-shipping-fields" style="height: 250px;">
                      <h3>Credit Card</h3>
                      <p class="form-row form-row notes" id="order_comments_field"><label for="order_comments" class="" style="display: block;">Pay with your credit card via Stripe. TEST MODE ENABLED. In test mode, <br>you can use the card number 4242424242424242 with <br>any CVC and a valid expiration date or check the <br>documentation "<a href="#">Testing Stripe</a>" for more card numbers.</label>
                      
                        <div class="form-row">
                          <label for="card-element">
                            Credit or debit card
                          </label>
                          <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                          </div>

                          <!-- Used to display form errors. -->
                          <div id="card-errors" role="alert"></div>
                        </div>  

              <button class="button alt btn btn-default btn-lg chechout check_pa btn-po">Submit Payment</button>
            </form></p>
            </div>
          </div><!-- tab-content -->
        </div><!-- row -->
      </div>   
    </div></div>
  </section>
 <script>

// Create a Stripe client.
var stripe = Stripe('{{ config('services.stripe.key') }}');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  //console.log(token);
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script> 
<!-- <style type="text/css">
.submit-button {
  margin-top: 10px;
}</style>

<script type="text/javascript">
  $(function() {
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(e.target).closest('form'),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;

    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault(); // cancel on first error
      }
    });
  });
});

$(function() {
  var $form = $("#payment-form");

  $form.on('submit', function(e) {
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='reservation[stripe_token]' value='" + token + "'/>");
      $form.get(0).submit();
    }
  }
})
</script>
 -->
  <!-- <script>
    jQuery(document).ready(function(e){jQuery(".dropdown").find("dd").show();jQuery("form.subscribe_form").submit(function(e){var re=/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]{1,})+\.)+([a-zA-Z0-9]{2,})+$/;if(!re.test(jQuery("input.subscribe_email").val())){alert("The email is not correct");return false;}});jQuery("input[value='Register']").click(function(e){if(!jQuery("input[name='role']:checked").val()){jQuery("input[value='entrepreneur']").attr("checked","checked");}});});
</script>
 -->


@endsection
