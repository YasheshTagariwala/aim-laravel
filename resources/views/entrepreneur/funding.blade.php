@extends('layouts.master')
@section('title', 'Entrepreneur Search')
@section('pagebody')

    <section class="select-bar animated slideInUp">
        <div class="container"></div>
    </section>
    <section class="list-items ddd">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Funding / Donation List</h1>
                    <hr />
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#funding">Funding</a></li>
                        <li><a data-toggle="tab" href="#donation">Donation</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="funding" class="tab-pane fade in active padding-t-10">
                            <table border="0" style="width: 100%" class="table">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Amount</td>
                                        <td>Date</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($project_fundings as $project_funding)
                                        <tr>
                                            <td>{{$project_funding->user->firstname .' '.$project_funding->user->lastname}}</td>
                                            <td>{{$project_funding->user->email}}</td>
                                            <td>{{$project_funding->user->phone}}</td>
                                            <td>${{$project_funding->amount}}</td>
                                            <td>{{date('Y-m-d',strtotime($project_funding->updated_at))}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$project_fundings->render()}}
                        </div>
                        <div id="donation" class="tab-pane fade padding-t-10">
                            <table border="0" style="width: 100%" class="table">
                                <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Phone</td>
                                    <td>Amount</td>
                                    <td>Date</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project_donations as $project_donation)
                                    <tr>
                                        <td>{{$project_donation->user->firstname .' '.$project_donation->user->lastname}}</td>
                                        <td>{{$project_donation->user->email}}</td>
                                        <td>{{$project_donation->user->phone}}</td>
                                        <td>${{$project_donation->amount}}</td>
                                        <td>{{date('Y-m-d',strtotime($project_donation->updated_at))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$project_donations->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <font class="text-left"></font>
    </section>

@endsection
