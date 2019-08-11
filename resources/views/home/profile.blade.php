@extends('layouts.master')
@section('title', 'Profile Details')
@section('pagebody')
    <style type="text/css">
        .panel-title {
            margin: -10px !important;
            padding: 0 0 10px 44px !important;
        }

        .panel-title span {

        }
    </style>
    <section class="details-header-bg animated slideInDown">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-5">
                    <div class="thumb_logo">
                        @if($group_id == 1)
                            <img src="{{(($user->logo == NULL && $user->logo == "" && file_exists($user->logo)) ? asset('/assets_new/images/profile_image.png') : $user->logo) }}" class="details-logo" id="">
                        @elseif($group_id == 2)
                            <img src="{{(($user->org_logo == NULL && $user->org_logo == "" && file_exists($user->org_logo)) ? asset('/assets_new/images/profile_image.png') : $user->org_logo) }}" class="details-logo" id="">
                        @elseif($group_id == 3)
                            <img src="{{(($user->image == NULL && $user->image == "" && file_exists($user->image)) ? asset('/assets_new/images/profile_image.png') : $user->image) }}" class="details-logo" id="">
                        @else
                            <img src="{{asset('/assets_new/images/profile_image.png')}}" alt="" class="details-logo" id="">
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2>
                        {{$user->user->firstname .' '. $user->user->lastname}}<br>
                        {{$user->user->email}}<br>
                        {{$user->user->phone}}<br>
                    </h2>
                    <p class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i>
                        @if($group_id == 1)
                            {{$user->city}},{{$user->state}}
                            ,{{$user->country}}
                        @elseif($group_id == 2)
                            {{$user->country}}
                        @else
                            {{$user->country_interest}}
                        @endif
                    </p>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="sent-btns"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="details-navbar">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-sm-8 col-xs-7 col-ns-12">
                    <div>
                        @if($group_id == 1)
                            <span><a href="{{url('/entrepreneur')}}">Home</a></span>/
                        @elseif($group_id == 2)
                            <span><a href="{{url('/organization')}}">Home</a></span>/
                        @elseif($group_id == 3)
                            <span><a href="{{url('/supporter')}}">Home</a></span>/
                        @else
                            <span><a href="{{url('/investor')}}">Home</a></span>/
                        @endif
                        <span><a class="active" href="#">{{$user->user->firstname .' '. $user->user->lastname}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Inner Contents -->
    <?php
    if($group_id == 1) {
        $company = \App\Models\EntrepreneurCompanies::where('created_by',$user->created_by)->first();
    }
    ?>
    <section class="details-body">
        <div class="container">
            <div class="row" style="margin-bottom:20px;">
                <div class="col-md-offset-3 col-md-6 col-sm-6">
                    <div class="addthis_native_toolbox"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 animated slideInLeft">
                    <div class="tab-content faq-cat-content">
                        <div class="tab-pane active in fade" id="faq-cat-1">
                            <div class="panel-group" id="accordion-cat-1">
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-1" class="collapsed" aria-expanded="false">
                                            <h4 class="panel-title overview">Overview</h4>
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </div>
                                    <div id="faq-cat-1-sub-1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            @if($group_id == 1)
                                                <p><span lang="">{{$company->overview}}</span></p>
                                            @elseif($group_id == 2)
                                                <p><span lang="">{{$user->description}}</span></p>
                                            @else($group_id == 3 && $group_id == 4)
                                                <p><span lang="">{{$user->expectation}}</span></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-2"
                                           class="collapsed" aria-expanded="false">
                                            <h4 class="panel-title summary">Summary</h4>
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </div>
                                    <div id="faq-cat-1-sub-2" class="panel-collapse collapse" aria-expanded="false"
                                         style="height: 0px;">
                                        @if($group_id == 1)
                                            <div class="panel-body summery-body">
                                                <div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 prior-year">
                                                        <p>Prior Year Revenue</p>
                                                        <h1>{{$company ? $company->p_yr_revenue : 0}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 current-year">
                                                        <p>Current Year Revenue</p>
                                                        <h1>{{$company ? $company->c_yr_revenue : 0}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 next-year">
                                                        <p>Next Year Revenue</p>
                                                        <h1>{{$company ? $company->n_yr_revenue : 0}}</h1>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div style="padding-top:5px;">
                                                    <div class="text-center employees">Employees
                                                        <h4>{{$company ? $company->no_employees : 0}}</h4></div>
                                                    <div class="text-center sub-industry">Sub-Industry<h4>
                                                            @php
                                                                $categories = $company ? \DB::table('categories')
                                                                ->whereIn('id',explode(',',$company->category))
                                                                ->pluck('name')->toArray() : [];
                                                            @endphp
                                                            {{ implode(",",$categories) }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($group_id == 2)
                                            <div class="panel-body summery-body">
                                                <div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 prior-year">
                                                        <p>Founded Date</p>
                                                        <h1>{{$user->founded_date ? date('Y-m-d',strtotime($user->founded_date)) : '-'}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 current-year">
                                                        <p>Mission</p>
                                                        <h1>{{$user->mission}}</h1>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div style="padding-top:5px;">
                                                    <div class="text-center employees">Business Stage
                                                        @php
                                                            $woman_stage = \DB::table('women_stage')
                                                                ->where('id',$user->women_stage)
                                                                ->pluck('name')->toArray()
                                                        @endphp
                                                        <h4>{{implode(",",$woman_stage)}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($group_id == 3)
                                            <div class="panel-body summery-body">
                                                <div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 prior-year">
                                                        <p>Expertise</p>
                                                        <h1>{{$user->expertise}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 current-year">
                                                        <p>Expectation</p>
                                                        <h1>{{$user->expectation}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 next-year">
                                                        <p>Area Interest</p>
                                                        @php
                                                            $area_of_interest = \DB::table('categories')
                                                                ->where('id',$user->area_interest)
                                                                ->pluck('name')->toArray()
                                                        @endphp
                                                        <h1>{{ implode(",",$area_of_interest)  }}</h1>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div style="padding-top:5px;">
                                                    <div class="text-center employees">Business Stage
                                                        @php
                                                            $woman_stage = \DB::table('women_stage')
                                                                ->where('id',$user->women_stage)
                                                                ->pluck('name')->toArray()
                                                        @endphp
                                                        <h4>{{implode(",",$woman_stage)}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="panel-body summery-body">
                                                <div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 prior-year">
                                                        <p>Expertise</p>
                                                        <h1>{{$user->expertise}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 current-year">
                                                        <p>Expectation</p>
                                                        <h1>{{$user->expectation}}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 next-year">
                                                        <p>Capital Investment</p>
                                                        <h1>{{$user->capital_invesment  }}</h1>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-xs-4 next-year">
                                                        <p>ROI</p>
                                                        <h1>{{$user->roi }}</h1>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div style="padding-top:5px;">
                                                    <div class="text-center employees">Business Stage
                                                        @php
                                                            $woman_stage = \DB::table('women_stage')
                                                                ->where('id',$user->women_stage)
                                                                ->pluck('name')->toArray()
                                                        @endphp
                                                        <h4>{{implode(",",$woman_stage)}}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if($group_id == 1)
                                    <div class="panel panel-default panel-faq">
                                        <div class="panel-heading">
                                            <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-project" class="collapsed" aria-expanded="false">
                                                <h4 class="panel-title overview">Project Status</h4>
                                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                                            </a>
                                        </div>
                                        <div id="faq-cat-1-sub-project" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                            <div class="panel-body">
                                                <?php $project = DB::table('projects')->where('created_by',$user->created_by)->first(); ?>
                                                @if($project)
                                                    <section id="cd-timeline" class="cd-container">
                                                        <div class="cd-timeline-block">
                                                            <div class="cd-timeline-img cd-warning"><i class="fa fa-tag"></i></div>
                                                            <div class="cd-timeline-content">
                                                                <h2>{{$project->title}}</h2>
                                                                <p>{{$project->content}}</p>
                                                                <div class="readmore">
                                                                    <div class="hidden-card-description">
                                                                        <h5>{{$project->title}}</h5>
                                                                        <p>{{$project->content}}</p>
                                                                    </div>
                                                                    <span class="cd-date"><span>{{$project->updated_at}}</span>
                                                                    <h3 class="percentage-completed">
                                                                        <span class="timer" data-to="{{$project->progress}}" data-speed="2500">
                                                                        </span>% <small>completed</small>
                                                                    </h3>
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    @php
                                                        $status = \App\Models\ProjectStatus::where('project_id',$project->id)->where('delete_status',0)->get();
                                                    @endphp
                                                    @if(count($status) > 0)
                                                        @foreach($status as $state)
                                                            <section id="cd-timeline" class="cd-container">
                                                                <div class="cd-timeline-block">
                                                                    <div class="cd-timeline-img cd-warning"><i class="fa fa-tag"></i></div>
                                                                    <div class="cd-timeline-content">
                                                                        <h2>{{$state->title}}</h2>
                                                                        <p>{{$state->description}}</p>
                                                                        <div class="readmore">
                                                                            <div class="hidden-card-description">
                                                                                <h5>{{$state->title}}</h5>
                                                                                <p>{{$state->description}}</p>
                                                                            </div>
                                                                            <span class="cd-date"><span>{{$state->updated_at}}</span> <h3 class="percentage-completed"><span class="timer" data-to="{{$state->progress}}" data-speed="2500"></span>% <small>completed</small></h3></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        @endforeach
                                                    @endif
                                                @else
                                                    <div class="clearfix"></div>
                                                    <div class="alert alert-warning alert-dismissable"> No Data Found</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function ($) {
            app.timer();
        });

    </script>
@endsection
