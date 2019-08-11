@extends('layouts.master')
@section('title', 'Search')
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
        @if(count((array)$users) > 0)
            @foreach($users as $key => $user)
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 animated slideInLeft">
                            <a href="#" data-toggle="modal" title="" data-target="#projectInfo{{$key}}">
                                <div class="list-content ">
                                    <div class="col-md-6 col-sm-6 col-xs-6 list-icon listcont1 text-center "
                                         style="height: 200px;">
                                        <div class="thumb_logo">
                                            @if($group_id == 1)
                                                <?php
                                                $company = \App\Models\EntrepreneurCompanies::where('created_by',$user->created_by)->first();
                                                ?>
                                                <img src="{{(($user->logo == NULL && $user->logo == "" && file_exists($user->logo)) ? asset('/assets_new/images/profile_image.png') : $user->logo) }}">
                                            @elseif($group_id == 2)
                                                <img src="{{(($user->org_logo == NULL && $user->org_logo == "" && file_exists($user->org_logo)) ? asset('/assets_new/images/profile_image.png') : $user->org_logo) }}">
                                            @elseif($group_id == 3)
                                                <img src="{{(($user->image == NULL && $user->image == "" && file_exists($user->image)) ? asset('/assets_new/images/profile_image.png') : $user->image) }}">
                                            @else
                                                <img src="{{asset('/assets_new/images/profile_image.png')}}" alt="">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 vot-info listcont1" style="height: 200px;">
                                        <h3>
                                            {{$user->user->firstname .' '. $user->user->lastname}}<br>
                                            {{$user->user->email}}<br>
                                            {{$user->user->phone}}<br>
                                        </h3>
                                        <div class="rating">
                                            <font class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                @if($group_id == 1)
                                                    {{$user->city}},{{$user->state}}
                                                    ,{{$user->country}}
                                                @elseif($group_id == 2)
                                                    {{$user->country}}
                                                @else
                                                    {{$user->country_interest}}
                                                @endif
                                                <div id="stars-default" class="inner-star"></div>
                                            </font>
                                        </div>
                                        <font class="text-left">
                                            @if($group_id == 1)
                                                <p><span lang="">{{$company->overview}}</span></p>
                                            @elseif($group_id == 2)
                                                <p><span lang="">{{$user->description}}</span></p>
                                            @else($group_id == 3 && $group_id == 4)
                                                <p><span lang="">{{$user->expectation}}</span></p>
                                            @endif
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
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                X
                                            </button>
                                            <div class="popup-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="popup-banner">
                                                            <h1>
                                                                @php
                                                                    if($group_id == 1) {
                                                                        $categories = $company ? \DB::table('categories')
                                                                        ->whereIn('id',explode(',',$company->category))
                                                                        ->pluck('name')->toArray() : [];
                                                                    }
                                                                    elseif($group_id == 2) {
                                                                        $categories = \DB::table('categories')
                                                                        ->whereIn('id',explode(',',$user->categories))
                                                                        ->pluck('name')->toArray();
                                                                    }elseif ($group_id == 3 || $group_id == 4){
                                                                        $categories = \DB::table('categories')
                                                                            ->where('id',$user->category)
                                                                            ->pluck('name')->toArray();
                                                                    }
                                                                @endphp
                                                                {{ implode(",",$categories) }}
                                                            </h1>
                                                            <div id="stars-default" class="inner-star"></div>
                                                            <figure class="text-center">
                                                                @if($group_id == 1)
                                                                    <img src="{{(($user->logo == NULL && $user->logo == "") ? asset('/assets_new/images/profile_image.png') : $user->logo) }}" alt="Logo Image">
                                                                @elseif($group_id == 2)
                                                                    <img src="{{(($user->org_logo == NULL && $user->org_logo == "") ? asset('/assets_new/images/profile_image.png') : $user->org_logo) }}" alt="Logo Image">
                                                                @elseif($group_id == 3)
                                                                    <img src="{{(($user->image == NULL && $user->image == "") ? asset('/assets_new/images/profile_image.png') : $user->image) }}" alt="Logo Image">
                                                                @else
                                                                    <img src="{{asset('/assets_new/images/profile_image.png')}}" alt="">
                                                                @endif
                                                            </figure>
                                                            <a target="_blank" href="#"> </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <div class="view-all">
                                                            <h2>{{$user->user->firstname .' '. $user->user->lastname}}</h2>
                                                            <h2>{{$user->user->email}}</h2>
                                                            <h2>{{$user->user->phone}}</h2>
                                                            <h3>
                                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                @if($group_id == 1)
                                                                    {{$user->city}},{{$user->state}}
                                                                    ,{{$user->country}}
                                                                @elseif($group_id == 2)
                                                                    {{$user->country}}
                                                                @else
                                                                    {{$user->country_interest}}
                                                                @endif
                                                            </h3>
                                                            {{--<p><span lang="">Testing Overview by Acropolis...</span></p>--}}
                                                            <div class="panel clearfix">
                                                                <div id="faq-cat-1-sub-2"
                                                                     class="panel-collapse popup_summnery">
                                                                    <div class="panel-body summery-body padding-none">
                                                                        <div class="  ">
                                                                            @if($group_id == 1)
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
                                                                                                SDG<h4>{{$user->sdg}}</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif($group_id == 2)
                                                                                <div class="disp-tbl w-100">
                                                                                    <div
                                                                                        class="col-sm-4 col-xs-4 prior-year disp-tcell">
                                                                                        <p>Founded Date</p>
                                                                                        <h1>{{$user->founded_date ? date('Y-m-d',strtotime($user->founded_date)) : '-'}}</h1>
                                                                                    </div>
                                                                                    <div
                                                                                        class=" col-sm-4 col-xs-4 current-year disp-tcell">
                                                                                        <p>Mission</p>
                                                                                        <h1>{{$user->mission}}</h1>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="padding-t-10">
                                                                                    <div class="disp-tbl w-100">
                                                                                        <div
                                                                                            class=" col-sm-12 employees dis-tcell ">
                                                                                            <div class="text-center ">
                                                                                                Description
                                                                                                <h4>{{$user->description}}</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @elseif($group_id == 3)
                                                                                <div class="disp-tbl w-100">
                                                                                    <div
                                                                                        class="col-sm-4 col-xs-4 prior-year disp-tcell">
                                                                                        <p>Area Of Interest</p>
                                                                                        @php
                                                                                            $area_of_interest = \DB::table('categories')
                                                                                                ->where('id',$user->area_interest)
                                                                                                ->pluck('name')->toArray()
                                                                                        @endphp
                                                                                        <h1>{{ implode(",",$area_of_interest)  }}</h1>
                                                                                    </div>
                                                                                    <div
                                                                                        class=" col-sm-4 col-xs-4 current-year disp-tcell">
                                                                                        <p>Expectation</p>
                                                                                        <h1>{{$user->expectation}}</h1>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="padding-t-10">
                                                                                    <div class="disp-tbl w-100">
                                                                                        <div
                                                                                            class=" col-sm-12 employees dis-tcell ">
                                                                                            <div class="text-center ">
                                                                                                Expertise
                                                                                                <h4>{{$user->expertise}}</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <div class="disp-tbl w-100">
                                                                                    <div
                                                                                        class="col-sm-4 col-xs-4 prior-year disp-tcell">
                                                                                        <p>Investment Capital</p>
                                                                                        <h1>{{ $user->capital_invesment}}</h1>
                                                                                    </div>
                                                                                    <div
                                                                                        class=" col-sm-4 col-xs-4 current-year disp-tcell">
                                                                                        <p>ROI</p>
                                                                                        <h1>{{$user->roi}}</h1>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="padding-t-10">
                                                                                    <div class="disp-tbl w-100">
                                                                                        <div
                                                                                            class=" col-sm-12 employees dis-tcell ">
                                                                                            <div class="text-center ">
                                                                                                Expertise
                                                                                                <h4>{{$user->expertise}}</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            <div class="more-link">
                                                                                @if($group_id == 1)
                                                                                    <a href="{{url('/profile/entrepreneur')}}/{{$user->created_by}}">
                                                                                        <button type="button"
                                                                                                class="btn btn-default">
                                                                                            More Details
                                                                                        </button>
                                                                                    </a>
                                                                                @elseif($group_id == 2)
                                                                                    <a href="{{url('/profile/organization')}}/{{$user->created_by}}">
                                                                                        <button type="button"
                                                                                                class="btn btn-default">
                                                                                            More Details
                                                                                        </button>
                                                                                    </a>
                                                                                @elseif($group_id == 3)
                                                                                    <a href="{{url('/profile/supporter')}}/{{$user->created_by}}">
                                                                                        <button type="button"
                                                                                                class="btn btn-default">
                                                                                            More Details
                                                                                        </button>
                                                                                    </a>
                                                                                @else
                                                                                    <a href="{{url('/profile/investor')}}/{{$user->created_by}}">
                                                                                        <button type="button"
                                                                                                class="btn btn-default">
                                                                                            More Details
                                                                                        </button>
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
