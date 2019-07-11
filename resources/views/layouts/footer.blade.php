        
        
        <!-- Contact Section Starts Here    -->
        <section class="contact-form">
            <button type="button" id="getform" class="btn btn-default btn-circle btn-lg"><img src="{{url('/')}}/assets_new/images/call.png" /></button>
            <div id="contact-toggle" class="contact-content">
                <div class="container"> 
                    <form name="" action="{{url('/')}}/contact/store" method="post" >
                                                    {{csrf_field()}} 
                        <h3 style="color:#fff !important;">Contact Form</h3>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Name (Required)</label>                              
                            <input name="name" value="" size="40" class="form-control" type="text" required="">                                
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Email (Required)</label>                             
                            <input name="email" value="" size="40" class="form-control" type="email" required="">                              
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Subject</label>
                            <input name="subject" value="" size="40" class="form-control" type="text" required="">                             
                        </div>
                        <div class="form-group">
                            <label style="color:#fff !important;">Your Message</label>                              
                            <textarea name="message" cols="40" rows="10" class="form-control" required=""></textarea>                              
                        </div>         
                        <input value="{{Request::url()}}" name="current_url" type="hidden">                 
                        <input value="send" class="btn btn-primary" type="submit">
                    </form>                 
                </div>  
            </div>
        </section>
        <input type="hidden" class="userrole" value="" />

        <footer class="animated fadeInRight">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-6 col-xs-6 col-ms-12 footer_menu">
                        <h4>ABOUT US</h4>
                        <div class="menu-about-us-menu-container">
                            <ul id="menu-about-us-menu" class="menu">
                                <li id="menu-item-621" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-621"><a href="{{url('/why-aim')}}">Why AIM?</a></li>
                                <li id="menu-item-622" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-622"><a href="{{url('/what-aim')}}">What is AIM?</a></li>
                                <li id="menu-item-623" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-623"><a href="{{url('/press')}}">Press</a></li>
                                <li id="menu-item-624" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-624"><a href="{{url('/in-stats')}}">In STATS</a></li>
                                <li id="menu-item-625" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-625"><a href="{{url('/category')}}">Featured Projects</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 col-ms-12 footer_menu">
                        <h4>CAMPAIGN</h4>
                        <div class="menu-campaign-menu-container">
                            <ul id="menu-campaign-menu" class="menu">
                            <li id="menu-item-618" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-618"><a href="{{url('/start-campaign')}}">Start Your Campaign</a></li>
                            <li id="menu-item-620" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-620"><a href="{{url('/pricing-campaign')}}">Pricing</a></li>
                            <li id="menu-item-619" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-619"><a href="{{url('/campaign-support')}}">Campaign Support</a></li>
                            <li id="menu-item-2195" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2195"><a href="{{url('/org-list')}}">Organizations</a></li>
                            </ul>
                        </div>
                    </div>

                        <div class="col-md-2 col-sm-6 col-xs-6 col-ms-12 footer_menu">
                        <h4>HELP</h4>
                        <div class="menu-help-container">
                        <ul id="menu-help" class="menu">
                        <li id="menu-item-630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630"><a href="{{url('/blog')}}">Blog</a></li>
                        <li id="menu-item-631" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-631"><a href="{{url('/faq')}}">FAQ</a></li>
                        <li id="menu-item-635" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-635"><a href="{{url('/support')}}">Support</a></li>
                        <li id="menu-item-634" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-634"><a href="{{url('/term-use')}}">Terms of Use</a></li>
                        <li id="menu-item-633" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-633"><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                        </ul></div></div>
                        <div class="col-md-3 col-sm-6 col-xs-6 col-ms-12 footer_menu">
                        <h4>BROWSE</h4>
                        <div class="menu-browse-container">
                        <ul id="menu-browse" class="menu">
                        <li id="menu-item-627" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-627"><a href="{{url('/entrepreneur')}}/search/1">Diaspora</a></li>
                        <li id="menu-item-628" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-628"><a href="{{url('/entrepreneur')}}/search/2">Social Entrepreneur</a></li>
                        <li id="menu-item-626" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-626"><a href="{{url('/entrepreneur')}}/search/4">Youth</a></li>
                        <li id="menu-item-629" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-629"><a href="{{url('/entrepreneur')}}/search/5">Women</a></li>
                        </ul></div></div>
                        <!-- <div class="col-md-3 col-sm-6 col-xs-6 col-ms-12 footer_menu">
                        <h4>ENTREPRENEUR</h4>
                        <div class="menu-help-container">
                        <ul id="menu-help" class="menu">
                        <li id="menu-item-630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630"><a href="{{url('/entrepreneur')}}/search/1">Recent Entrepreneur</a></li>
                        <li id="menu-item-630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630"><a href="{{url('/entrepreneur')}}/search/2">Top Entrepreneur</a></li>
                        <li id="menu-item-630" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-630"><a href="{{url('/entrepreneur')}}/search/3">Featured Entrepreneur</a></li>
                        
                        </ul></div></div> -->
                    <div class="col-md-3 pull-right col-sm-12">
                        <img class="ribbon" src="{{url('/')}}/assets_new/images/ribbon.png">
                        <div class="subscribe">
                            <h5>Subscribe with Us</h5>
                            <p>Subscribe to keep in touch and follow the latest and most exciting campaigns.</p>
                            <form name="" action="{{url('/')}}/subscribe" method="post" name="subscriptionform" id="subscriptionform">
                                 {{csrf_field()}}
                                <div class="input-group">
                                    <input class="form-control subscribe_email" type="email" name="subscribe_email" id="subscribe_email" placeholder="Enter your email address" required>
                                    <span class="input-group-btn">
                                        <button type="submit" class="input-group-addon subscribe_button"><i class="glyphicon glyphicon-play"></i></button>
                                    </span> 
                                </div>
                            <input value="{{Request::url()}}" name="current_url" type="hidden">  
                            </form>
                        </div>     
                    </div>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            jQuery('#subscriptionform').submit(function(event){
                event.preventDefault()
                var emailid = jQuery('#subscribe_email').val();
                jQuery.post( "{{ url('/subscribe') }}", { subscribe_email: emailid }, function( data ) {
                    alert(data.message);
                }, "json");
            });
        </script>
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6 col-xs-7 col-ms-12"><p>© 2018 "Africa Innovation Market" Right Reserved</p></div>
                    <div class="pull-right col-md-4 col-sm-6 col-xs-5 col-ms-12">
                        <ul class="social-network social-circle">
                            <li><a href="https://www.facebook.com/Africa-Innovation-Market-264291690851142" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/AfricaInMarket" class="icoTwitter" title="Twitter"><i class="fa fa-twitter" target="_blank"></i></a></li>
                            <li><a href="https://plus.google.com/u/8/106266241987759767720" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/africa-innovation-market/" class="icoLinkedin" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>