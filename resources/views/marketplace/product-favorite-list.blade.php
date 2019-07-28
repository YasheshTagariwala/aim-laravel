@extends('layouts.master')
@section('title', 'Settings MarketPlace')
@section('pagebody')

 <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
        <section class="about_datails">
            <div class="bread_crumb">
                <div class="container">           
                    <ul class="breadcrumb">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">Marketplace Settings</a></li>
                    </ul>
                </div>
            </div><!-- bread_crumb -->
        </section>
        <section class="dash_board_pages">
            <div class="container">
                <div class="row">   
                    <div class="pages_content"> 
                        
                        @include('marketplace.sidebar')
                        <div class="col-md-9 col-sm-9 col-xs-12">                       
                            <div class="purchase_history product_ist">
                                <h1>Products List</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id="no-more-tables" class="">
                                            <table class="col-md-12 table-condensed cf">
                                                <thead class="cf">
                                                    <tr><th class="numeric product">Image</th>
                                                        <th class="numeric">Product Name</th>
                                                        <th class="numeric">Price</th>
                                                        <th class="numeric">View</th>
                                                        <th class="numeric">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                @foreach($products as $product)                                                  
                                                    <tr>
                                                        <td class="numeric product"><img src="{{$product->imagepath}}" height="60" width="60"></td>
                                                        <td class="numeric">{{$product->name}}</td>
                                                        <td class="numeric">${{$product->sale_price}}</td>
                                                        <td class="numeric"><a href="{{url('/')}}/product/{{$product->id}}">View</a></td>
                                                        <td class="numeric"><a href="#" onclick="deleteFavorite('{{$product->id}}',this)">Delete</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->
<script>
    function deleteFavorite(id,ele) {
        $.ajax({
            url : '{{url('/product/delete-favorite')}}',
            type : "post",
            data : {id : id,_token : '{{ csrf_token() }}'},
            success : function(data) {
                if(data.status) {
                    $(ele).parent().parent().remove();
                }
            }
        })
    }
</script>

@endsection
