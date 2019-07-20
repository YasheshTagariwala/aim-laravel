@extends('layouts.master')
@section('title', 'Payment History MarketPlace')
@section('pagebody')

 
       <section class="myaccount-header">
            <div class="container">
                <h1>Requirement List</h1>
            </div>
        </section>
        <section class="myaccount-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-white">
                            <div class="panel-body border-top" id="no-more-tables">                            
                                <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th class="numeric">Images</th>
                                        <th class="numeric">Name</th>
                                        <th class="numeric">Price</th>
                                        <th class="numeric">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enquiry_lists as $enquiry_list)
                                            <tr>
                                                <td class="numeric">
                                                    <img src="{{$enquiry_list->product->imagepath}}" style="width: 100px; height: 100px" width="100" height="100">
                                                </td>
                                                <td data-title="Name" class="numeric">{{$enquiry_list->product->name}}</td>
                                                <td data-title="Min-max Price" class="numeric">${{$enquiry_list->product->sale_price}}</td>
                                                <td data-title="Assign Product" class="numeric">
                                                    <a href="{{url('/market-place/enquiry-details/'.$enquiry_list->id)}}" class="btn btn-sm btn-primary">Enquiry Details </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                                <nav class="text-center"></nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>      
    <!-- section for images -->

@endsection
