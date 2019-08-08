@extends('layouts.master')
@section('title', 'Entrepreneur Details')
@section('pagebody')
    <style type="text/css">
        .panel-title {
            margin: -10px !important;
            padding: 0 0 10px 44px !important;
        }

        .panel-title span {

        }
        /**
       * The CSS shown here will not be introduced in the Quickstart guide, but shows
       * how you can use CSS to style your Element's container.
       */
        .StripeElement {
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

    </style>
    <script src="https://js.stripe.com/v3/"></script>
    <section class="details-header-bg animated slideInDown">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-5">
                    <div class="thumb_logo">
                        <img src="{{$entrepreneur->logo}}" alt="{{$entrepreneur->name}}" class="details-logo" id=""></div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2>
                        {{$entrepreneur->name}}<br>
                        {{$entrepreneur->user->email}}<br>
                        {{$entrepreneur->user->phone}}<br>
                    </h2>
                    <p class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$entrepreneur->city}}
                        ,{{$entrepreneur->state}},{{$entrepreneur->country}}</p>
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
                            <span><a href="{{url('/supporter')}}">Home</a></span>/
                            <span><a class="active" href="#">{{$entrepreneur->name}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Inner Contents -->

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
                                            <p><span lang="">{{$company ? $company->overview : ''}}</span></p>
                                            {{--<a href="#" data-toggle="modal" data-target="#businessdeailsmodal">Business Plan Summary</a>--}}
                                            {{--<br>--}}
                                            {{--<a target="_blank" href="http://"> </a>--}}
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
                                    </div>
                                </div>
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-project" class="collapsed" aria-expanded="false">
                                            <h4 class="panel-title overview">Project Status</h4>
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </div>
                                    <div id="faq-cat-1-sub-project" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animated slideInRight">
                    <div class="right-content">
                        @if(Session::get('groupid') > '1' && Session::get('groupid') < '5')
                            <div class="btn-invest  btn-campaign"><img
                                    src="{{url('/assets_new')}}/images/Invest-bl-icon.png" width="49" height="35"
                                    alt=""/><a data-toggle="modal" data-target="#donationsmodal" href="#"><span> Donation</span></a>
                                <div id="donatModal" class="modal fade" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                </div>
                            </div>
                        @endif

                        <div class="btn-businessplan  btn-invest">
                            <img src="{{url('/assets_new')}}/images/business-plan-icon.png" alt=""
                                 pagespeed_url_hash="53345294"
                                 onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="49"
                                 height="35"><a href="#" data-toggle="modal" data-target="#businessdeailsmodal"><span>Business Plan</span></a>
                        </div>
                        <div>
                            <p>Funding Type</p>
                            <span>{{$funding_info ? $funding_info->fund_type : ''}}</span>
                        </div>
                        <div>
                            <p>Bussiness Stage</p>
                            <span><span lang="">{{ $women_stages ? $women_stages->name : '' }}</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade in" id="donationsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="myModalLabel">Business Plan Summary</h4>
                </div>
                <div class="modal-body">
                    <form action="/funding" method="post" id="payment-form">
                        {{csrf_field()}}

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
                        <div class="input-group">
                            <label>Amount (USD)</label>
                            <input class="form-control" type="number" name="amount" placeholder="Enter Amount" required>
                        </div>
                        <label>Payment</label>
                        <select name="pay_type" class="form-control" required="">
                            <option value="onetime">Onetime</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                        <label>Comments</label>
                        <textarea class="form-control" placeholder="Enter Comments" name="comments" rows="2"></textarea><br>
                        <input type="hidden" name="project_id" value="{{$entrepreneur->created_by}}">
                        <button class="btn-businessplan btn-primary">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade in" id="businessdeailsmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="myModalLabel">Business Plan Summary</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-group" id="accordion">
                        @if(count((array)$business_plans) > 0)
                            @foreach($business_plans as $key => $business_plan)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$key}}">Business Plan {{$key + 1}}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$key}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="business-details">
                                                <li><h3>Idea</h3><span lang=""><p>{{$business_plan->idea}} </p></span></li>
                                                <li><h3>Business Model</h3><span lang=""><p>{{$business_plan->women_model}}</p></span></li>
                                                <li><h3>Customer</h3><span lang=""><p>{{$business_plan->customer}}</p></span></li>
                                                <li><h3>Market</h3><span lang=""><p>{{$business_plan->market}}</p></span></li>
                                                <li><h3>Industry</h3><span lang="">{{$business_plan->industry}}</span></li>
                                                <li><h3>Product</h3><span lang="">{{$business_plan->product}}</span></li>
                                                <li><h3>Campaign</h3><span lang="">{{$business_plan->campaign}}</span></li>
                                                <li><h3>Budget</h3><span lang="">{{$business_plan->budget}}</span></li>
                                                <li><h3>Pitch</h3>{{$business_plan->pitch}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-center">No Business Plans</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<section class="sponsonrs animated slideInLeft">--}}
        {{--<div class="container-fluid">--}}
            {{--<marquee scrollamount="5" onmouseover="this.stop();" onmouseleave="this.start();">--}}
                {{--<a href="#" target="_blank">--}}
                    {{--<img src="{{url('/assets_new')}}/images/ctanew.png" alt="CTA" pagespeed_url_hash="884728392"--}}
                         {{--onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="250" height="100">--}}
                {{--</a>--}}
                {{--<a href="#" target="_blank">--}}
                    {{--<img src="{{url('/assets_new')}}/images/columbia.png" alt="Columbia Women School"--}}
                         {{--pagespeed_url_hash="2321047071"--}}
                         {{--onload="pagespeed.CriticalImages.checkImageForCriticality(this);" width="250" height="100">--}}
                {{--</a>--}}
            {{--</marquee>--}}
        {{--</div>--}}
    {{--</section>--}}
    <!-- End Inner Contents -->
    <script>
        jQuery(document).ready(function ($) {
            app.timer();
        });
        // Create a Stripe client.
        var stripe = Stripe('{{config("services.stripe.key")}}');

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
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
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
@endsection
