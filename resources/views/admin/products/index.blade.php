@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Product Details </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/products/create" type="button" class="btn btn-primary btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                    <th class="hidden-xs hidden-sm">Product Name</th>
                    <th class="hidden-xs hidden-sm">Product Short Description</th>
                    <th class="hidden-xs hidden-sm">Product Description</th>
                                        
                    <th class="text-right">Manage <span class="hidden-xs hidden-sm">User</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$product->id}}</td>
                    <td class="hidden-xs hidden-sm">{{$product->name}}</td>
                    <td class="hidden-xs hidden-sm">{{$product->short_desc}}</td>
                    <td class="hidden-xs hidden-sm">{{$product->description}}</td>
                                    
                    <td class="text-right">
                        <a href="{{url('/admin')}}/products/edit/{{$product->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-pencil"></span>
                            <span class="hidden-xs hidden-sm">Edit</span>
                        </a>
                        <a href="{{url('/admin')}}/products/delete/{{$product->id}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs">
                            <span class="fa fa-trash"></span> 
                            <span class="hidden-xs hidden-sm">Delete</span>
                        </a>
                        <a href="{{url('/admin')}}/products/{{$product->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-eye"></span>
                            <span class="hidden-xs hidden-sm">Show</span>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
          {!! $products->render() !!}    
              
    </div>

</div>     
@endsection