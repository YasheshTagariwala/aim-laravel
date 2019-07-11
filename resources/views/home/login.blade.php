@extends('layouts.master')
@section('title','Login')
@section('pagebody')

<!-- Start Inner Contents -->               
        
        <section class="login-header">
            <div class="container">
                <h1>Login</h1>
            </div>
        </section>  
        <section class="login-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-bg">
                            <div class="row">
                                <div class="col-md-5 col-sm-12">                             
                                    <form method="post" action="{{url('/')}}/login/store" autocomplete="off">
                                        {{csrf_field()}} 
                                        @if(Session::has('message'))
                                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                                        @endif
                                        <div class="form-group">
                                            <input class="um-form-field valid  form-control" name="username" id="username" value="" placeholder="Email address" data-validate="unique_username_or_email" data-key="username" autocomplete="on" type="text" required="">
                                        </div>
                                        <div class="form-group">
                                            <input class="um-form-field valid  form-control" name="user_password" id="user_password" value="" placeholder="Password" data-validate="" data-key="user_password" autocomplete="off" type="password" required="">
                                        </div>
                                        <div class="um-col-alt">
                                            <input value="Login" class="um-button af-log-but" type="submit">
                                            <!-- <a href="{{url('/register')}}" class="um-button um-alt af-reg-but">Register</a> -->
                                        </div>
                                        <!-- <div class="checkbox">
                                            <label>
                                                <input name="rememberme" value="1" checked="" type="checkbox"><input type="checkbox"> <font>Remember Me</font>
                                                <a href="#" class="pull-right">Forgot Password?</a>
                                            </label>
                                        </div> -->
                                    </form> 
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <div class="custom-pos"><p class="text-center">(or)</p></div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="social-networks">                
                                        <div class="wp-social-login-widget">
                                            <div class="wp-social-login-connect-with">Connect with:</div>
                                            <div class="wp-social-login-provider-list">
                                                <a  href="{{url('/register')}}/facebook" title="" class="" data-provider="Facebook">
                                                    <img alt="Facebook" title="" src="{{ url('assets_new/social_icons/wpzoom') }}/facebook.png">
                                                </a>
                                                <a href="{{url('/register')}}/google" title="" class="" data-provider="Google">
                                                    <img alt="Google" title="" src="{{ url('assets_new/social_icons/wpzoom') }}/google.png">
                                                </a>
                                                <a href="{{url('/register')}}/twitter" title="" class="" data-provider="Twitter">
                                                    <img alt="Twitter" title="" src="{{ url('assets_new/social_icons/wpzoom') }}/twitter.png">
                                                </a>
                                                <a href="{{url('/register')}}/linkedin" title="" class="" data-provider="LinkedIn">
                                                    <img alt="LinkedIn" title="" src="{{ url('assets_new/social_icons/wpzoom') }}/linkedin.png">
                                                </a>
                                            </div>
                                            <div class="wp-social-login-widget-clearing"></div>
                                        </div>
                                    </div>
                                </div> 
                            </div>                      
                        </div>
                        <div class="signup text-center">
                            Haven't you register yet? 
                            <a href="{{url('/register')}}"><button type="submit" class="btn btn-blue">Sign up Now</button></a>
                        </div>
                    </div>
                </div>
            </div>            
        </section>    
        <!-- End Inner Contents -->                 
            

@endsection
