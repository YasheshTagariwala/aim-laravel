@extends('layouts.master')
@section('title','Account')
@section('pagebody')
    <!-- Start Inner Contents -->
<style>
    /*!
 * bootstrap-vertical-tabs - v1.1.0
 * https://dbtek.github.io/bootstrap-vertical-tabs
 * 2014-06-06
 * Copyright (c) 2014 Ä°smail Demirbilek
 * License: MIT
 */
    .tabs-left, .tabs-right {
        border-bottom: none;
        padding-top: 2px;
    }
    .tabs-left {
        border-right: 1px solid #ddd;
    }
    .tabs-right {
        border-left: 1px solid #ddd;
    }
    .tabs-left>li, .tabs-right>li {
        float: none;
        margin-bottom: 2px;
    }
    .tabs-left>li {
        margin-right: -1px;
    }
    .tabs-right>li {
        margin-left: -1px;
    }
    .tabs-left>li.active>a,
    .tabs-left>li.active>a:hover,
    .tabs-left>li.active>a:focus {
        border-bottom-color: #ddd;
        border-right-color: transparent;
    }

    .tabs-right>li.active>a,
    .tabs-right>li.active>a:hover,
    .tabs-right>li.active>a:focus {
        border-bottom: 1px solid #ddd;
        border-left-color: transparent;
    }
    .tabs-left>li>a {
        border-radius: 4px 0 0 4px;
        margin-right: 0;
        display:block;
    }
    .tabs-right>li>a {
        border-radius: 0 4px 4px 0;
        margin-right: 0;
    }
    .vertical-text {
        margin-top:50px;
        border: none;
        position: relative;
    }
    .vertical-text>li {
        height: 20px;
        width: 120px;
        margin-bottom: 100px;
    }
    .vertical-text>li>a {
        border-bottom: 1px solid #ddd;
        border-right-color: transparent;
        text-align: center;
        border-radius: 4px 4px 0px 0px;
    }
    .vertical-text>li.active>a,
    .vertical-text>li.active>a:hover,
    .vertical-text>li.active>a:focus {
        border-bottom-color: transparent;
        border-right-color: #ddd;
        border-left-color: #ddd;
    }
    .vertical-text.tabs-left {
        left: -50px;
    }
    .vertical-text.tabs-right {
        right: -50px;
    }
    .vertical-text.tabs-right>li {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
    }
    .vertical-text.tabs-left>li {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }
</style>
    <section class="myaccount-header">
        <div class="container">
            <h1>Account</h1>
            <p></p>
        </div>
    </section>
    <section class="myaccount-body">
        <div class="container">
            <div class="vtab-nav vtab-nav-hrz clearfix">
                <ul class="resp-tabs-list clearfix">
                    <li class=""><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="active" id="account"><a href="#">Account</a></li>
                    <li class="" id="market-place"><a href="{{url('/market-place/dashboard')}}">MarketPlace </a></li>
                </ul>
                <ul class="resp-tabs-list right-tab  clearfix">
                    <li class=" " id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o"
                                                                                  aria-hidden="true"></i></a></li>
                    <li class=" active" id="account"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                    <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out"
                                                                       aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="col-xs-3">
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#account_details" data-toggle="tab">Account</a></li>
                    <li><a href="#password" data-toggle="tab">Change Password</a></li>
                    <li><a href="#privacy" data-toggle="tab">Privacy</a></li>
                    <li><a href="#delete" data-toggle="tab">Delete Account</a></li>
                </ul>
            </div>
            <div class="col-xs-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="account_details">
                        <form id="messageform" action="{{url('/account')}}/store" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group um-field">
                                <label>User Name <span class="acf-required">*</span></label>
                                <input name="username" value="{{$userdetails[0]->username}}" size="40"
                                       class="form-control" type="text">
                            </div>
                            <div class="form-group um-field">
                                <label>First Name <span class="acf-required">*</span></label>
                                <input name="firstname" value="{{$userdetails[0]->firstname}}" size="40"
                                       class="form-control" type="text">
                            </div>
                            <div class="form-group um-field">
                                <label>Last Name <span class="acf-required">*</span></label>
                                <input name="lastname" value="{{$userdetails[0]->lastname}}" size="40"
                                       class="form-control" type="text">
                            </div>
                            @if(Session::get('provider') == '')
                                <div class="form-group um-field">
                                    <label>Email Address <span class="acf-required">*</span></label>
                                    <input name="email" value="{{$userdetails[0]->email}}" size="40"
                                           class="form-control" type="email">
                                </div>
                            @endif
                            <input type="hidden" value="1" name="savefor">
                            <div class="acf-form-submit">
                                <input value="Update Account" class="button button-primary button-large"
                                       type="submit">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="password">
                        <form id="messageform" action="{{url('/account')}}/store" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group um-field">
                                <label>Current Password <span class="acf-required">*</span></label>
                                <input name="cur_password" value="" size="40" class="form-control" type="password">
                            </div>
                            <div class="form-group um-field">
                                <label>New Password <span class="acf-required">*</span></label>
                                <input name="password" value="" size="40" class="form-control" type="password">
                            </div>
                            <div class="form-group um-field">
                                <label>Confirm Password <span class="acf-required">*</span></label>
                                <input name="cpassword" value="" size="40" class="form-control" type="password">
                            </div>
                            <input type="hidden" value="2" name="savefor">
                            <div class="acf-form-submit">
                                <input value="Update Password" class="button button-primary button-large"
                                       type="submit">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="privacy">
                        Hide my profile from
                        <form id="messageform" action="{{url('/account')}}/store" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group um-field">
                                <label>Yes <input name="hide_pfl" value="1" size="40" class="" type="radio"></label>
                            </div>
                            <div class="form-group um-field">
                                <label>No <input name="hide_pfl" value="0" size="40" class="" type="radio"></label>
                            </div>
                            <input type="hidden" value="3" name="savefor">
                            <div class="acf-form-submit">
                                <input value="Update Privacy" class="button button-primary button-large"
                                       type="submit">
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="delete">
                        <p>Are you sure you want to delete your account? This will erase all of your account data
                            from the site. To delete your account enter your password below</p>
                        <form id="messageform" action="{{url('/account')}}/store" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group um-field">
                                <label>Password <span class="acf-required">*</span></label>
                                <input name="password" value="" size="40" class="form-control" type="password">
                            </div>
                            <input type="hidden" value="4" name="savefor">
                            <div class="acf-form-submit">
                                <input value="Delete Account" class="button button-primary button-large"
                                       type="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>

@endsection
