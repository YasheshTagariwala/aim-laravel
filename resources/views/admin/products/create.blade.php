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
                <a href="{{url('/admin')}}/products/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>

    

</header>
@endsection
@section('pagebody')

<div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    Vertical Form
                </header>
                <div class="widget-body">
                <form action="{{url('/admin')}}/products/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="name">Product Name *</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Type your name" required>
                        
                        <label for="short_desc">Product Short Description *</label>
                        <input type="text" name="short_desc" id="short_desc" class="form-control" placeholder="Type your Description in Short" required>
                        
                        <label for="description">Product Description*</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Type your description"></textarea>

                        <label>Product Data</label><br>
                        <label for="product_data">Regular Price *</label>
                        <input type="text" name="product_data" id="product_data" class="form-control" placeholder="Type your product data" required>

                        <label for="sale_price">Sales Price *</label>
                        <input type="text" name="sale_price" id="sale_price" class="form-control" placeholder="Type your sale price" required>

                        <label for="start_date">Sales Price Start Date *</label>
                        <input type="date" name="start_date" id="start_date" class="form-control">
                        <p class="help-block">Enter the Start Date.</p>

                        <label for="end_date">Sales Price End Date *</label>
                        <input type="date" name="end_date" id="end_date" class="form-control">
                        <p class="help-block">Enter the End Date.</p>

                        <label for="category">Product Categories *</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <p class="help-block">Select your category .</p>

                        <label for="tags">Product Tag *</label>
                        <input type="text" name="tags" id="tags" class="form-control" placeholder="Type your Tags" required>

                        <label for="imagepath">Product Image Gallery *</label>
                        <input type="file" name="imagepath" id="imagepath" class="form-control">
                        <p class="help-block">Upload your Product Image.</p>

                        <label for="userid">User Id *</label>
                        <input type="text" name="userid" id="userid" class="form-control" placeholder="Type your userid" required>

                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection