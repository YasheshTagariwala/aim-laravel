@extends('layouts.master')
@section('title', 'Exeleadmen | WCMp Vendors')
@section('pagebody')

 
<section class="sliders">
        <div class="container">
            <div class="center-block slider_content">
                <h1 class="slideInDown animated">EXELEADMEN</h1>
                <p>Most of our authors make this their full-time gig selling digital files on our marketplace. just do it...</p>              
                <div class="input-group main_sec"> 
                    <form role="search" method="get" id="searchform" action="#">
                        <input type="text" value="" name="search"  class="form-control" placeholder="Search by product">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <div class="select-style">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Industry</option>
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
    <div id="container">
        <div id="content" role="main">
            <nav class="woocommerce-breadcrumb">
                <div class="breadcrumb">
                    <div class="container">      
                        <ul><a href="#">Home</a>&nbsp;/&nbsp;WCMp Vendors&nbsp;/&nbsp;EXELEADMEN</ul>
                    </div>
                </div>
            </nav>          
            <section class="container-fluid product-section">
                <div class="container">            
                    <div class="tab-content right_divs">
                        <div class="tab-pane text-style active" id="most">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>EXELEADMEN</h1>
                                    <div class="vendor_description_background" style="background:url() no-repeat;width:100%;height:245px;color:#fff;background-size:100% 100%">
                                        <div class="vendor_description">
                                            <div class="vendor_img_add">
                                                <div class="img_div">
                                                    <img src="{{url('/')}}/assets_new/images/WP-stdavatar.png" pagespeed_url_hash="4195747638" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="200" height="200">
                                                </div>
                                                <div class="vendor_address">
                                                    <p><i class="fa fa-envelope-o fa-mail" aria-hidden="true"></i><label>lamine004@hotmail.com</label></p>
                                                </div>
                                            </div>
                                            <div class="description">
                                                <div class="social_profile"></div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="description_data clearfix">
                                        <div class=" clearfix">
                                            <label><strong>Description</strong></label>                                 
                                            <p></p>
                                        </div>
                                    </div>      
                                    <p class="woocommerce-info">No products were found matching your selection.</p>
                                    <aside id="sidebar">
                                        <div id="primary" class="widget-area">
                                            <ul class="sid">
                                            </ul>
                                        </div>
                                    </aside>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>  




@endsection