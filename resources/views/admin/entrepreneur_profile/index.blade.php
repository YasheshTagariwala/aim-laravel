@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Entrepreneur Profile </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <!-- <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur_profile/create" type="button" class="btn btn-primary btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div> -->
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
                    <th class="hidden-xs hidden-sm">Women Name</th>
                    <th class="hidden-xs hidden-sm">City</th>
                    <th class="hidden-xs hidden-sm">State</th>
                    <th class="hidden-xs hidden-sm">Country</th>
                    <th class="hidden-xs hidden-sm">Make Top</th>
                    <th class="hidden-xs hidden-sm">Make Feature</th>
       
                    
                    <th class="text-right">Manage <span class="hidden-xs hidden-sm">User</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mydetails as $mydetail)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$mydetail->id}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->name}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->city}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->state}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->country}}</td>
                    
                    
                     @if($mydetail->is_top == 0)
                  
                    <td class="text-left">
                        <a href="{{url('/admin')}}/entrepreneur_profile/maketop/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-check"></span>
                            <span class="hidden-xs hidden-sm">Yes</span>
                        </a>
                            <span class="fa fa-times"></span>
                            <span class="hidden-xs hidden-sm">No</span>
                    @else 

                    <td class="text-left">
                        <span class="fa fa-check"></span>
                        <span class="hidden-xs hidden-sm">Yes</span> 

                        <a href="{{url('/admin')}}/entrepreneur_profile/make_top/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-times"></span>
                            <span class="hidden-xs hidden-sm">No</span>
                        </a>
                    </td>
                    
                    @endif

                     @if($mydetail->is_featured == 0)
                  
                    <td class="text-left">
                        <a href="{{url('/admin')}}/entrepreneur_profile/makefeature/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-check"></span>
                            <span class="hidden-xs hidden-sm">Yes</span>
                        </a>
                            <span class="fa fa-times"></span>
                            <span class="hidden-xs hidden-sm">No</span>
                    @else 

                    <td class="text-left">
                        <span class="fa fa-check"></span>
                        <span class="hidden-xs hidden-sm">Yes</span> 

                        <a href="{{url('/admin')}}/entrepreneur_profile/make_feature/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-times"></span>
                            <span class="hidden-xs hidden-sm">No</span>
                        </a>
                    </td>
                    
                    @endif

                                    
                    <td class="text-right">
                       <!--  <a href="{{url('/admin')}}/entrepreneur_profile/edit/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-pencil"></span>
                            <span class="hidden-xs hidden-sm">Edit</span>
                        </a> -->
                        <a href="{{url('/admin')}}/entrepreneur_profile/delete/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs">
                            <span class="fa fa-trash"></span> 
                            <span class="hidden-xs hidden-sm">Delete</span>
                        </a>
                        <a href="{{url('/admin')}}/entrepreneur_profile/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
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