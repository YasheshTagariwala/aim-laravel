
                        <div class="col-md-3 col-sm-3 col-xs-12 side_line">
                            <div class="img_per">
                                    <div><img src="{{ Session::get('storelogo') }}" alt="" id="marketPlaceLogo">
                                        <br> <i class="fas fa-camera" onclick="logoPick(); "></i></div>
                                <a target="_blank" href="#"><h4>{{ Session::get('storename')}}</h4></a>
                            </div>
                            <ul class="nav nav11 pills dash_bo_list">
                                <h4>Market Place</h4>           
                                    <!-- <li class="active"> --><li>
                                        <a class="active" data-menu_item="dashboard" href="{{url('/market-place')}}/dashboard">
                                            <i class="icon_stand ic1"> </i> <span class="writtings"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Dashboard</span>
                                        </a>
                                    </li>             
                                    <li class="parent">
                                        <a href="#">
                                            <i class="icon_stand ic2"> </i> <span class="writtings"><img src="{{url('/')}}/assets_new/images/listarrow1.png" >Market Place Information</span>
                                        </a>
                                        <ul class="nav-child" style="display:none;">
                                            <li><a href="{{url('/market-place')}}/settings" data-menu_item="shop_front"><i class="fa fa-circle" aria-hidden="true"></i>Market Place front</a></li>
                                            <li><a href="{{url('/market-place')}}/account" data-menu_item="billing"><i class="fa fa-circle" aria-hidden="true"></i>Account Information</a></li>
                                        </ul>
                                    </li>
                                <h4>Product Manager</h4>    
                                      <li><a href="{{url('/market-place')}}/product"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Add Product</a></li>
                                      <li><a href="{{url('/market-place')}}/product-list"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Products Lists</a></li>
                                      <li><a href="{{url('/market-place')}}/product-favorite"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Favorite Products Lists</a></li>
                                <h4>Orders</h4>
                                    <li><a href="{{url('/market-place')}}/orders"><span class="icon_stand ic6"> </span> <span class="writtings"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Orders</span></a></li>
                                    <li><a href="{{url('/market-place')}}/report"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Status / Reports</a></li>                             
                                    <li class="parent">
                                        <a href="#"><span class="icon_stand ic7"> </span><span class="writtings"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Payments</span></a>
                                        <ul class="nav-child" style="display:none;">
                                            <li><a href="{{url('/market-place')}}/payment-history"><i class="fa fa-circle" ></i>History</a></li>
                                        </ul>
                                    </li>                       
                                    <li><a href="{{url('/market-place')}}/product-enquiry"><span class="icon_stand ic8"> </span> <span class="writtings"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Product Enquiries</span></a></li>
                                    <li><a href="{{url('/market-place')}}/messages"><img src="{{url('/')}}/assets_new/images/listarrow1.png">Market Place Messages</a></li>
                            </ul>
                        </div>



<script>
 function initMenu() {
      jQuery('.nav-child').hide(); // Start with nav-childs hidden
      jQuery('.nav11 > li.parent a').click(function() {
        var checkElement = jQuery(this).next();
        
        // When an `<a>` with a nav-child that isn't visible is clicked (tapped)...
        if ((checkElement.is('.nav-child')) && (!checkElement.is(':visible'))) {
          // Open the clicked (tapped) nav-child of `<a>`
          jQuery(this).addClass("active");
          checkElement.slideDown(165, 'linear');
          // Go to the other `<a>` elements of that nav-child scope and close them
          // (without closing nav-childs of other scopes, above or below)
          jQuery(this).parent().siblings("li").children("a").removeClass("active");
          jQuery(this).parent().siblings("li").children("a").next(".nav-child").slideUp(160, 'linear');
          return false;
        }

        if(jQuery(this).hasClass("active")) {
          jQuery(this).removeClass("active");
          checkElement.slideUp(160, 'linear');
        }
      });
      } // End initMenu()

      jQuery(document).ready(function () {
          jQuery("#marketPlaceLogoUpload").change(function() {
              readURL(this);
          });
      });

      function logoPick(){
          jQuery('#marketPlaceLogoUpload').trigger('click');
      }

     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function(e) {
                 jQuery('#marketPlaceLogo').attr('src', e.target.result);
             }

             reader.readAsDataURL(input.files[0]);
             alert('Please Hit Save Options To Save Your Logo.');
         }
     }



 initMenu();
    </script>
