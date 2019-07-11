@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span>Dashboard <small>As admin user</small></h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <!-- <div class="col-xs-12 col-md-3">
                <button type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Settings</button>
            </div> -->
        </div>
    </div>
</header>
@endsection
@section('pagebody')
<div class="row">
        <!-- < div class="col-lg-4">
            <div class="widget widget-default widget-fluctuation">
                <header class="widget-header">
                    Monthly Revenue
                    <div class="widget-header-actions">
                        <span class="widget-header-action fa fa-cog"></span>
                        <span data-close-widget class="widget-header-action fa fa-close"></span>
                    </div>
                </header>
                <div class="widget-body">
                    <section class="widget-fluctuation-period">
                        <span class="widget-fluctuation-period-text"><strong>$17,468.45</strong> in <strong>February</strong></span><br>
                        <button class="btn btn-sm btn-transparent-white" type="button"><span class="fa fa-calendar"></span> View Different Month</button>
                    </section>
                    <section class="widget-fluctuation-description">
                        <span class="widget-fluctuation-description-amount text-success">+$3,429.56</span>
                        <span class="widget-fluctuation-description-text">increase on<br>last month</span>
                    </section>
                </div>
            </div>
        </div> -->
        <div class="col-sm-6 col-lg-4">
            <div class="widget widget-statistic widget-primary">
                <header class="widget-statistic-header">Total Entrepreneur(s)</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value">{{$mydetails->where('groupid','1')->count()}}</span>
                    <span class="widget-statistic-description"><strong>{{$temp_users->where('groupid','1')->count()}}</strong> Entrepreneur(s) Waiting For your Approval</span>
                    <span class="widget-statistic-icon fa fa-credit-card-alt"></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="widget widget-statistic widget-purple">
                <header class="widget-statistic-header">Total Supporter(s)</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value">{{$mydetails->where('groupid','3')->count()}}</span>
                    <span class="widget-statistic-description"><strong>{{$temp_users->where('groupid','4')->count()}}</strong> Supporter(s) Waiting For your Approval</span>
                    <span class="widget-statistic-icon fa fa-support"></span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="widget widget-statistic widget-success">
                <header class="widget-statistic-header">Total Investor(s)</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value">{{$mydetails->where('groupid','4')->count()}}</span>
                    <span class="widget-statistic-description"><strong>{{$temp_users->where('groupid','3')->count()}}</strong> Investor(s) Waiting For your Approval</span>
                    <span class="widget-statistic-icon fa fa-credit-card-alt"></span>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row">
        <div class="col-lg-8">
            <div class="widget widget-default">
                <header class="widget-header">
                    Website Registrations
                    <div class="widget-header-actions">
                        <span class="widget-header-action fa fa-cog"></span>
                        <span data-close-widget class="widget-header-action fa fa-close"></span>
                    </div>
                </header>
                <div class="widget-body widget-body-md">
                    <canvas id="graph-monthly-registrations" class="widget-graph-md"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="widget widget-default">
                <header class="widget-header">
                    Dedicated Server Load
                    <div class="widget-header-actions">
                        <span class="widget-header-action fa fa-cog"></span>
                        <span data-close-widget class="widget-header-action fa fa-close"></span>
                    </div>
                </header>
                <div class="widget-body widget-body-md">
                    <div>CPU Load <span class="pull-right text-muted">28% / 100%</span></div>
                    <div class="progress">
                      <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 34%;">
                        <span class="sr-only">34% CPU Power In Use</span>
                    </div>
                </div>
                <div>CPU Load <span class="pull-right text-muted">28% / 100%</span></div>
                <div class="progress">
                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 28%;">
                    <span class="sr-only">28% Ram Used</span>
                </div>
            </div>
            <div>CPU Load <span class="pull-right text-muted">28% / 100%</span></div>
            <div class="progress">
              <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 84%;">
                <span class="sr-only">84% Full</span>
            </div>
        </div>
        <div class="row margin-top-15">
            <div class="col-xs-6"><button class="btn btn-block btn-default">Purge Cache</button></div>
            <div class="col-xs-6"><button class="btn btn-block btn-default">Reset Server</button></div>
        </div>
    </div>
</div>
</div>
</div> -->


<div class="row">
    <div class="col-lg-4">
            <div class="widget widget-statistic widget-purple">
                <header class="widget-statistic-header">Total Organization(s)</header>
                <div class="widget-statistic-body">
                    <span class="widget-statistic-value">{{$mydetails->where('groupid','2')->count()}}</span>
                    <span class="widget-statistic-description"><strong>{{$temp_users->where('groupid','2')->count()}}</strong> Organization(s) Waiting For your Approval</span>
                    <span class="widget-statistic-icon fa fa-support"></span>
                </div>
            </div>
        <div class="widget widget-success widget-achievement">
            <div class="widget-body widget-body-lg">
                <h2 class="achievement-heading">Africa Innovation Market</h2>
                <h3 class="achievement-subheading">Administrator</h3>
                <img src="{{url('/')}}/assets/img/africainn.png" alt="Administrator" class="achievement-image" style="height: 120px;">
                <p class="achievement-description">AIM <strong>Admin</strong></p>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="hidden-xs hidden-sm">ID</th> 
                    <th class="hidden-xs hidden-sm">Name</th>
                    <th class="hidden-xs hidden-sm">Status</th>
                    <th class="hidden-xs hidden-sm">Date Time</th>       
                    <th class="hidden-xs hidden-sm">Action</th>                   
                </tr>
            </thead>
            <tbody>
                @foreach($userlogs as $userlog)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$userlog->id}}</td>
                    <td class="hidden-xs hidden-sm">Admin</td>
                    <td class="hidden-xs hidden-sm">{{$userlog->status}}</td>
                    <td class="hidden-xs hidden-sm">{{$userlog->datetime}}</td>
                    <!-- <td><div data-toggle="tooltip" data-placement="left" title="3GB / 10GB used"><span class="piety-pie">3/10</span></div></td> -->
                    <td><button class="btn btn-faded btn-transparent btn-xs" onclick="a.href('/userlogs/1')"><span class="fa fa-pencil"></span> <span class="hidden-xs hidden-sm">View</span></button> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $userlogs->render() !!}
    </div>

</div>     
@endsection