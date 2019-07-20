@extends('layouts.master')
@section('title', 'Add Product Enquiry')
@section('pagebody')
    <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
    <section class="about_datails">
        <div class="bread_crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">Add Product Enquiry</a></li>
                </ul>
            </div>
        </div><!-- bread_crumb -->
    </section>
    <section class="dash_board_pages">
        <div class="container">
            <div class="row">
                <div class="pages_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="new_dashboard">
                            <h1>Add Product Enquiry</h1>
                            <hr/>
                            <form id="post" class="" action="{{url('/')}}/market-place/add-product-enquiry" method="post"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>Product <span class="acf-required">*</span></label>
                                            <select name="product_name" class="form-control" required="">
                                                <option value="">-- Please Select --</option>
                                                @foreach($products as $product)
                                                    <option value={{$product->id}}>{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Enquiry Details <span class="acf-required">*</span></label>
                                            <textarea name="short_message" cols="40" rows="10" class="form-control" required=""></textarea>
                                        </div>
                                        <input value="Submit Enquiry" class="btn btn-primary" type="submit">
                                        <style>.error {
                                                border: 1px solid red
                                            }</style>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
