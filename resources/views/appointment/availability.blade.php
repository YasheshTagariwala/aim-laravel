@extends('aimlaravel_msg.aimlaravel.resources.views.layouts.master')
@section('title', $type . ' Dashboard')
@section('pagebody')

    <style type="text/css">
        .multiselect {
            width: 200px;
        }

        .selectBox {
            position: relative;
        }

        .selectBox select {
            width: 100%;
            font-weight: bold;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #checkboxes {
            display: none;
            border: 1px #dadada solid;
        }

        #checkboxes label {
            display: block;
        }

        #checkboxes label:hover {
            background-color: #1e90ff;
        }
    </style>


    <section class="myaccount-header">
        <div class="container">
            @if($type == 'investor')
                <h1>Investor</h1>
                <p class="col-md-8 col-md-offset-2">Create a investor profile with your criteria, Browse our catalog of
                    investment opportunities, Sort, analyze, and compare opportunities in minutes.</p>
            @else
                <h1>Supporter</h1>
                <p class="col-md-8 col-md-offset-2">Create a supporter profile with your focus areas, Survey youth
                    entrepreneurship and training needs, Share your publications with youth around the world.</p>
            @endif
        </div>
    </section>
    <section class="myaccount-body">
        <div class="myaccount-document">
            <div class="container">
                @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="myaccount-body">
        <div class="container">
            <form action="{{url($type . '/availability-store')}}" method="post">
                {{csrf_field()}}
                <div class="col-md-3">
                    <div class="form-group">
                        <label>From Date</label>
                        <input type="date" name="fromDate" class="form-control" required placeholder="From Date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="date" name="toDate" class="form-control" required placeholder="To Date">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>From Time</label>
                        <input type="time" name="fromTime" class="form-control" required placeholder="From Time">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>To Time</label>
                        <input type="time" name="toTime" class="form-control" required placeholder="To Time">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>

            <table class="table">
                <thead>
                <th>From Date</th>
                <th>To Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Action</th>
                </thead>
                <tbody>
                @if(count($availableList) > 0)
                    @foreach($availableList as $avl)
                        <tr>
                            <td>{{date('d-m-Y',strtotime($avl->fromdate))}}</td>
                            <td>{{date('d-m-Y',strtotime($avl->todate))}}</td>
                            <td>{{date('h:i A',strtotime($avl->fromtime))}}</td>
                            <td>{{date('h:i A',strtotime($avl->totime))}}</td>
                            <td>--</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        No Data Found
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </section>


@endsection
