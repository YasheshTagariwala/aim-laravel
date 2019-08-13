@extends('layouts.master')
@section('title', 'Entrepreneur Search')
@section('pagebody')

    <!-- Start Inner Contents -->

    <section class="select-bar animated slideInUp">
        <div class="container">
            <div class="row">
                <form action="">
                    <div class="col-md-4 col-sm-4">
                        <div class="custom-select">
                            <select name="country" onchange="this.form.submit()" class="form-control basic">
                                <option value="">Country</option>
                                <option value="in">India</option>
                            </select>
                        </div>
                    </div>
                    {{--<div class="col-md-4 col-sm-4">--}}
                        {{--<div class="custom-select">--}}
                            {{--<select name="industry" onchange="this.form.submit()" class="form-control">--}}
                                {{--<option select="" value=""> Industry</option>--}}
                                {{--<option value="it-and-technology">Diaspora</option>--}}
                                {{--<option value="social-entrepreneurship">Social Entrepreneur</option>--}}
                                {{--<option value="uncategorized">Uncategorized</option>--}}
                                {{--<option value="service-entrepreneurship">Women</option>--}}
                                {{--<option selected="selected" value="agri-business">Youth</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-sm-4">--}}
                        {{--<div class="custom-select">--}}
                            {{--<select name="business" onchange="this.form.submit()" class="form-control">--}}
                                {{--<option select="" value="">Bussiness</option>--}}
                                {{--<option value="no-poverty">No Poverty</option>--}}
                                {{--<option value="zero-hunger">Zero Hunger</option>--}}
                                {{--<option value="good-health-and-well-being">Good Health and Well-Being</option>--}}
                                {{--<option value="quality-education">Quality Education</option>--}}
                                {{--<option value="gender-equality">Gender Equality</option>--}}
                                {{--<option value="clean-water-and-sanitation">Clean Water and Sanitation</option>--}}
                                {{--<option value="affordable-and-clean-energy">Affordable and Clean energy</option>--}}
                                {{--<option value="decent-work-and-economic-growth">Decent Work and Economic Growth</option>--}}
                                {{--<option value="industry-innovation-and-infrastructure">Industry,Innovation and Infrastructure</option>--}}
                                {{--<option value="reduced-inequalities">Reduced Inequalities</option>--}}
                                {{--<option value="sustainable-cities-and-communities">Sustainable Cities and Communities</option>--}}
                                {{--<option value="responsible-consumption-and-production">Responsible Consumption and Production</option>--}}
                                {{--<option value="climate-action">Climate Action</option>--}}
                                {{--<option value="life-below-water">Life Below Water</option>--}}
                                {{--<option value="life-on-land">Life On Land</option>--}}
                                {{--<option value="peace-justice-and-strong-institutions">Peace, Justice and Strong Institutions</option>--}}
                                {{--<option value="partnerships-for-the-goals">Partnerships for the Goals</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </form>
            </div>
        </div>
    </section>
    <!-- End Inner Contents -->


    <section class="list-items ddd">
        @if(count((array)$entrepreneurs) > 0)
            @foreach($entrepreneurs as $key => $entrepreneur)
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 animated slideInLeft">
                            <a href="#" data-toggle="modal" title="" data-target="#projectInfo{{$key}}">
                                <div class="list-content ">
                                    <div class="col-md-6 col-sm-6 col-xs-6 list-icon listcont1 text-center " style="height: 200px;">
                                        <div class="thumb_logo">
                                            <img src="{{(($entrepreneur->logo == NULL && $entrepreneur->logo == "") ? asset('/assets_new/images/profile_image.png') : $entrepreneur->logo) }}"
                                                 alt="{{$entrepreneur->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 vot-info listcont1" style="height: 200px;">
                                        <h3>
                                            {{$entrepreneur->user->firstname}} {{$entrepreneur->lastname}}<br>
                                            {{$entrepreneur->user->email}}<br>
                                            {{$entrepreneur->user->phone}}<br>
                                        </h3>
                                        <div class="rating">
                                            <font class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                {{$entrepreneur->city}},{{$entrepreneur->state}},{{$entrepreneur->country}}
                                                <div id="stars-default" class="inner-star"></div>
                                            </font>
                                        </div>
                                        <font class="text-left">
                                            <p><span lang="">{{$entrepreneur->overview}}</span></p>
                                        </font>
                                    </div>
                                    <font class="text-left"></font>
                                </div>
                            </a>
                            <font class="text-left"></font>
                        </div>
                        <font class="text-left">
                            <div class="popup-wrapper">
                                <div class="modal fade" id="projectInfo{{$key}}" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                            <div class="popup-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="popup-banner">
                                                            <h1>
                                                                @php
                                                                    $company = \App\Models\EntrepreneurCompanies::where('created_by',$entrepreneur->created_by)->first();
                                                                    $categories = $company ? \DB::table('categories')
                                                                    ->whereIn('id',explode(',',$company->category))
                                                                    ->pluck('name')->toArray() : [];
                                                                @endphp
                                                                {{ implode(",",$categories) }}
                                                            </h1>
                                                            <div id="stars-default" class="inner-star"></div>
                                                            <figure class="text-center">
                                                                <img src="{{(($entrepreneur->logo == NULL && $entrepreneur->logo == "") ? asset('/assets_new/images/profile_image.png') : $entrepreneur->logo) }}" alt="Testing Women by Acropolis">
                                                            </figure>
                                                            <a target="_blank" href="#"> </a>
                                                            {{--<ul>--}}
                                                                {{--<li id="shareit-menu" class="share">--}}
                                                                    {{--<a class="addthis_button_compact">--}}
                                                                        {{--<i class="fa fa-plus" aria-hidden="true"></i>Share--}}
                                                                    {{--</a>--}}
                                                                {{--</li>--}}
                                                            {{--</ul>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="view-all">
                                                            <h2>
                                                                {{ $entrepreneur->name }}
                                                                {{--<span class="wpfp-span"><img src="{{url('/')}}/assets_new/img/loading.gif" alt="Loading" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">--}}
                                                                {{--<a class="wpfp-link" href="?wpfpaction=add&amp;postid=4768" title="" rel="nofollow">--}}
                                                                    {{--<button><i class="fa fa-heart" aria-hidden="true"></i></button>--}}
                                                                {{--</a>--}}
                                                            {{--</span>--}}
                                                            </h2>
                                                            <h2>{{$entrepreneur->user->email}}</h2>
                                                            <h2>{{$entrepreneur->user->phone}}</h2>
                                                            <h3>
                                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                {{$entrepreneur->city}},{{$entrepreneur->state}},{{$entrepreneur->country}}
                                                            </h3>
                                                            {{--<p><span lang="">Testing Overview by Acropolis...</span></p>--}}
                                                            <div class="panel clearfix">
                                                                <div id="faq-cat-1-sub-2"
                                                                     class="panel-collapse popup_summnery">
                                                                    <div class="panel-body summery-body padding-none">
                                                                        <div class="  ">
                                                                            <div class="disp-tbl w-100">
                                                                                <div
                                                                                    class="col-sm-4 col-xs-4 prior-year disp-tcell">
                                                                                    <p>Prior Year Revenue</p>
                                                                                    <h1>{{$company ? $company->p_yr_revenue : 0}}</h1>
                                                                                </div>
                                                                                <div
                                                                                    class=" col-sm-4 col-xs-4 current-year disp-tcell">
                                                                                    <p>Current Year Revenue</p>
                                                                                    <h1>{{$company ? $company->c_yr_revenue : 0}}</h1>
                                                                                </div>
                                                                                <div
                                                                                    class=" col-sm-4 col-xs-4 next-year disp-tcell">
                                                                                    <p>Next Year Revenue</p>
                                                                                    <h1>{{$company ? $company->n_yr_revenue : 0}}</h1>
                                                                                </div>
                                                                            </div>
                                                                            <div class=" padding-t-10 ">
                                                                                <div class="disp-tbl w-100">
                                                                                    <div
                                                                                        class=" col-sm-6 employees dis-tcell ">
                                                                                        <div class="text-center ">
                                                                                            Employees
                                                                                            <h4>{{$company ? $company->no_employees : 0}}</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class=" col-sm-6 sub-industry dis-tcell">
                                                                                        <div class="text-center">
                                                                                            SDG<h4>{{$entrepreneur->sdg}}</h4>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="more-link">
                                                                                <div class="more-link">
                                                                                    @if(Session::get('groupid') == 3)
                                                                                        <a href="{{url('/supporter/entrepreneur/')}}/{{$entrepreneur->id}}">
                                                                                            <button type="button" class="btn btn-default">More Details</button>
                                                                                        </a>
                                                                                    @else
                                                                                        <a href="{{url('/investor/entrepreneur/')}}/{{$entrepreneur->id}}">
                                                                                            <button type="button" class="btn btn-default">More Details</button>
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(Session::get('is_login') != '1')
                                                <div class="popup-footer text-center">
                                                    <div class="col-sm-12">
                                                        <p>To view Business Plan Summary Login as an
                                                            Investor/Supporter</p>
                                                        <p class="padding-t-10 ">
                                                            <button type="button" class="btn btn-default"
                                                                    onclick="location.href ='{{url('/login')}}'">Login
                                                            </button>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </font>
                    </div>
                    <font class="text-left">
                        <nav class="text-center"></nav>
                    </font>
                </div>
            @endforeach
        @else
            <section class="list-items">
                <div class="container">
                    <div class="row">
                        <div class="alert-message-div">
                            <div class="alert alert-warning alert-dismissable"> No Data Found</div>
                        </div>
                    </div>
                    <nav class="text-center">
                    </nav>
                </div>
            </section>
        @endif
        <font class="text-left"></font>
    </section>

@endsection
