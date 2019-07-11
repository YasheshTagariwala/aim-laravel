@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Investor Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/investor/create" type="button" class="btn btn-primary btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                    <th class="hidden-xs hidden-sm">First Name</th>
                    <th class="hidden-xs hidden-sm">Last Name</th>
                    <th class="hidden-xs hidden-sm">User Name</th>
                    <th class="hidden-xs hidden-sm">Email</th>
                    <th class="hidden-xs hidden-sm">Phone</th>
                    <th class="hidden-xs hidden-sm">Profile Hide</th>
                    
                    <th class="text-right">Manage <span class="hidden-xs hidden-sm">User</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mydetails as $mydetail)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$mydetail->id}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->firstname}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->lastname}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->username}}</td>
                    <td>
                        <a href="mailto:marksmith@test.com">{{$mydetail->email}}</a>
                    </td>
                    <td>{{$mydetail->phone}}</td>


                    @if($mydetail->is_hide == 0)
                  
                    <td class="text-left">
                        <a href="{{url('/admin')}}/investor/hide/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-check"></span>
                            <span class="hidden-xs hidden-sm">Yes</span>
                        </a>
                            <span class="fa fa-times"></span>
                            <span class="hidden-xs hidden-sm">No</span>
                    @else 

                    <td class="text-left">
                        <span class="fa fa-check"></span>
                        <span class="hidden-xs hidden-sm">Yes</span> 

                        <a href="{{url('/admin')}}/investor/unhide/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-times"></span>
                            <span class="hidden-xs hidden-sm">No</span>
                        </a>
                    </td>
                    
                    @endif

                    
                    <td class="text-right">
                        <a href="{{url('/admin')}}/investor/edit/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-pencil"></span>
                            <span class="hidden-xs hidden-sm">Edit</span>
                        </a>
                        <a href="{{url('/admin')}}/investor/delete/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs">
                            <span class="fa fa-trash"></span> 
                            <span class="hidden-xs hidden-sm">Delete</span>
                        </a>
                        <a href="{{url('/admin')}}/investor/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
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