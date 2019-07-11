@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Messages </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/messages/create" type="button" class="btn btn-primary btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>
</header>
@endsection
@section('pagebody')
<di

<div class="row">
    <div class="col-lg-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="hidden-xs hidden-sm">#</th>
                    <th class="hidden-xs hidden-sm">Name</th>
                    <th class="hidden-xs hidden-sm">Message</th>
                    <th class="hidden-xs hidden-sm">Message to</th>
                    <th class="hidden-xs hidden-sm">Composed by</th>
                     
                    <th class="text-right">Manage <span class="hidden-xs hidden-sm">User</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mydetails as $mydetail)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$mydetail->id}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->subject}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->message}}</td>
                    <?php $name = DB::table('userdetails')->where('id',$mydetail->msg_to)->get(); ?>
                    <td class="hidden-xs hidden-sm">@if($mydetail->msg_to > 0 ){{$name[0]->firstname}} {{$name[0]->lastname}} @else Admin @endif</td>

                    <?php $name = DB::table('userdetails')->where('id',$mydetail->created_by)->get(); ?>
                    <td class="hidden-xs hidden-sm">@if($mydetail->created_by > 0 ){{$name[0]->firstname}} {{$name[0]->lastname}} @else Admin @endif</td>
                     

                    <td class="text-right">
                        <a href="{{url('/admin')}}/messages/edit/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-pencil"></span>
                            <span class="hidden-xs hidden-sm">Reply</span>
                        </a>
                        <a href="{{url('/admin')}}/messages/delete/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs">
                            <span class="fa fa-trash"></span> 
                            <span class="hidden-xs hidden-sm">Delete</span>
                        </a>
                        <a href="{{url('/admin')}}/messages/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-eye"></span>
                            <span class="hidden-xs hidden-sm">Show</span>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
          {!! $mydetails->render() !!}    
              
    </div>

</div>     
@endsection