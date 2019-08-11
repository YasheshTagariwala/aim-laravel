{{--{{print_r($plan_detail)}}--}}
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
                        <img src="{{$plan_detail->entrepreneurs->logo}}" alt="{{$plan_detail->entrepreneurs->name}}" class="details-logo" id="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h2>
                        {{$plan_detail->entrepreneurs->name}}<br>
                        {{$plan_detail->entrepreneurs->user->email}}<br>
                        {{$plan_detail->entrepreneurs->user->phone}}<br>
                    </h2>
                    <p class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$plan_detail->entrepreneurs->city}}
                        ,{{$plan_detail->entrepreneurs->state}},{{$plan_detail->entrepreneurs->country}}</p>
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
                        <span><a class="active" href="#">{{$plan_detail->entrepreneurs->name}}</a></span>
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
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h3 class="panel-title">Entrepreneurs </h3>
                            <div class="actions pull-right"><i class="fa fa-chevron-down"></i></div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive project-stats">
                                @if(count($feedbackList) > 0)
                                    <table class="table disktop-view">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($feedbackList as $feedback)
                                            <tr>
                                                <th>{{$feedback->feedback}}</th>
                                                <th>
                                                    <a style="cursor: pointer" onclick="goToEdit({{$feedback->id}},'{{str_replace("\"","\\\"",str_replace("'","\'",$feedback->feedback))}}')">edit</a>
                                                    <a style="cursor: pointer" onclick="goToDelete({{$feedback->id}},this)">delete</a>
                                                </th>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-warning alert-dismissable">
                                        No Data Found
                                    </div>
                                @endif
                                <form action="{{url($type . '/entrepreneur/feedback/add')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="business_plan_id" value="{{$plan_detail->id}}">
                                    <input type="hidden" name="fedback_id" id="fedback_id" value="">
                                    <table class="table disktop-view">
                                        <tbody>
                                            <tr>
                                                <td><textarea required placeholder="Description" name="description" id="description" style="width: 100%;height: 200px"></textarea> </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary">Post</button>
                                                    <a class="btn btn-primary" id="btnCancel" onclick="goToCancel()" style="display: none">cancel</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function goToEdit(id,desc){
            $("#fedback_id").val(id);
            $("#description").val(desc);
            $("#btnCancel").show();
        }

        function goToDelete(id,ele){
            jQuery.ajax({
                data:  {
                    _token:'{{ csrf_token() }}',
                    id:id
                },
                type: "post",
                url: "{{ url($type . '/entrepreneur/feedback/delete') }}",
                dataType: "JSON",
                success: function(data){
                    $(ele).parent().parent().remove();
                }
            });
        }

        function goToCancel() {
            $("#fedback_id").val('');
            $("#description").val('');
            $("#btnCancel").hide();
        }

    </script>
@endsection
