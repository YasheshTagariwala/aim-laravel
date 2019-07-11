@extends('layouts.master')
@section('title', 'View Place Order')
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
          <ul class="nav pills">
            <li class="active"><a href="#" class="active"><i class="fa fa-shopping-cart active" aria-hidden="true"></i> <br>Summary</a></li>
            <li class="active"><a href="#/" class="active"><i class="fa fa-home active" aria-hidden="true"></i> <br>Address &amp; Payment</a></li>
            <li class="active"><a href="#" class="active"><img src="{{url('/assets_new')}}/images/card2.png" pagespeed_url_hash="2663400662" ><br> Order Status</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane text-style summry_form active" id="proceed">
              <div class="clearfix billing-order-details">           
            <h4> Your Order Has Been Placed Succesfully ! <a href="{{url('/market-place')}}">  Go Back To Market Place</a></h4> 
            </div>
          </div><!-- tab-content -->
        </div><!-- row -->
      </div>   
    </div></div>
  </section>
 <script>

// Create a Stripe client.
var stripe = Stripe('pk_test_5n726IGSPr6fUut6JPKdj5cj');

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