@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Cashout Details </h1>
                <p class="page-header-description">This page provides an overview of cashout requests from your application.</p>
            </div>
        </div>
    </div>
</header>
@endsection
@section('pagebody')

<div class="row">
    <div class="col-lg-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="hidden-xs hidden-sm">#</th>
                    <th class="hidden-xs hidden-sm">Name</th>
                    <th class="hidden-xs hidden-sm">Email</th>
                    <th class="hidden-xs hidden-sm">Phone</th>
                    <th class="hidden-xs hidden-sm">Amount</th>
                    <th class="hidden-xs hidden-sm">Type</th>
                    <th class="hidden-xs hidden-sm">Bank Details</th>
                    <th class="hidden-xs hidden-sm">Update Status</th>
                </tr>
            </thead>
            <tbody>
            @if(count($cashout_requests) > 0)
                @foreach ($cashout_requests as $key => $cashout_request)
                    <tr>
                        <td class="hidden-xs hidden-sm">{{$key + 1}}</td>
                        <td class="hidden-xs hidden-sm">{{$cashout_request->user->firstname}} {{$cashout_request->user->lastname}}</td>
                        <td><a href="mailto:marksmith@test.com">{{$cashout_request->user->email}}</a></td>
                        <td>{{$cashout_request->user->phone}}</td>
                        <td>${{$cashout_request->amount}}</td>
                        <td>@if($cashout_request->type == "bank")
                                Bank Transfer
                            @elseif($cashout_request->type == "cash")
                                Cash
                            @else
                                Cheque
                            @endif
                        </td>
                        <td>
                            @if($cashout_request->type == "bank")
                                Bank Name : - <b>{{$cashout_request->bank_name}}</b><br>
                                Acc No :- <b>{{$cashout_request->bank_acc_no}}</b><br>
                                Holder Name :- <b>{{$cashout_request->bank_account_holder_name}}</b><br>
                                Acc Type :- <b>{{$cashout_request->bank_account_type}}</b><br>
                                Abn No. :- <b>{{$cashout_request->aba_routing_number}}</b><br>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{url('/admin/cashout/status/'.$cashout_request->id.'/pending')}}" class="btn btn-faded btn-transparent btn-xs"
                               @if($cashout_request->status == "pending") style="background-color: #ffffff;opacity: 1;color: #333" @endif>
                                <span class="hidden-xs hidden-sm">Pending</span>
                            </a>
                            <a href="{{url('/admin/cashout/status/'.$cashout_request->id.'/rejected')}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs"
                               @if($cashout_request->status == "rejected") style="background-color: #f35842;opacity: 1;color: #ffffff" @endif>
                                <span class="hidden-xs hidden-sm">Reject</span>
                            </a>
                            <a href="{{url('/admin/cashout/status/'.$cashout_request->id.'/inprogress')}}" class="btn btn-faded btn-transparent btn-xs"
                               @if($cashout_request->status == "inprogress") style="background-color: #ffffff;opacity: 1;color: #333" @endif>
                                <span class="hidden-xs hidden-sm">In Progress</span>
                            </a>
                            <a href="{{url('/admin/cashout/status/'.$cashout_request->id.'/success')}}" class="btn btn-faded btn-transparent btn-xs"
                               @if($cashout_request->status == "success") style="background-color: #ffffff;opacity: 1;color: #333" @endif>
                                <span class="hidden-xs hidden-sm">Success</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
          {!! $cashout_requests->render() !!}
              
    </div>

</div>     
@endsection
