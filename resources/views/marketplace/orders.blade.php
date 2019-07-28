@extends('layouts.master')
@section('title', 'Orders MarketPlace')
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
                            <div class="new_dashboard">
                                <h1>Market Place Orders</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group button_ds">
                                            <span>Showing Orders for {{ date('F') }} {{ date('Y') }}</span>
                                        </div>
                                        <div class="wcmp_form1 ">
                                            <p>Select Date Range</p>
                                            <form name="wcmp_vendor_dashboard_orders" method="get" action="{{url('/market-place/orders')}}">
                                                <input type="date" required name="wcmp_start_date_order" class="pickdate gap1 wcmp_start_date_order" placeholder="" value="" />
                                                <input type="date" required name="wcmp_end_date_order" class="pickdate wcmp_end_date_order" placeholder="" value="" />
                                                <button class="wcmp_black_btn" type="submit" name="wcmp_order_submit">Show</button>
                                            </form>
                                        </div>
                                        <div class="wcmp_tab">
                                            {{--<ul>--}}
                                                {{--<li><a href="#all" id="all_click">All</a></li>--}}
                                                {{--<li><a href="#processing" id="processing_click" >Processing</a></li>--}}
                                                {{--<li><a href="#completed" id="complited_click" >Completed</a></li>--}}
                                            {{--</ul>--}}
                                            <div class="wcmp_tabbody"  id="all" >
                                                <form name="wcmp_vendor_dashboard_all_stat_export" method="get" action="{{url('/market-place/orders')}}">
                                                    {{--<div class="wcmp_table_loader"> Showing Results <span>--}}
                                                        {{--<span>--}}
                                                            {{--<span class="wcmp_all_now_showing"> @php echo '6'; @endphp</span> out of 10</span>--}}
                                                            {{--<span></span>--}}
                                                    {{--</div>--}}
                                                    <div class="wcmp_table_holder">
                                                        <table width="100%" border="0" cellspacing="0" class="wcmp_order_all_table" cellpadding="0">
                                                            <tr>
                                                                <td align="center"  valign="top"  width="20"><span class="input-group-addon beautiful">
                                                                    <input type="checkbox"  class="select_all_all" >
                                                                    </span></td>
                                                                <td align="center" valign="top"  >ID</td>
                                                                <td align="center" valign="top"  >Order #</td>
                                                                <td  align="center" valign="top" >Date<br><sub>dd/mm</sub></td>
                                                                <td align="center" class="no_display"  valign="top" > Earnings </td>
                                                                <td align="center" class="no_display" valign="top"  > Status </td>
                                                                <td align="center"  valign="top" > Actions </td>
                                                            </tr>
                                                            @if(count($orders) > 0)
                                                                @foreach($orders as $order)
                                                                    <tr>
                                                                        <td align="center"  valign="top"  width="20"><span class="input-group-addon beautiful">
                                                                    <input type="checkbox"  class="select_all_all" >
                                                                    </span></td>
                                                                        <td align="center" valign="top"  >{{ $order->id }}</td>
                                                                        <td align="center" valign="top"  >{{ $order->order_no }}</td>
                                                                        <td  align="center" valign="top" >{{ $order->created_at }}</td>
                                                                        <td align="center" class="no_display"  valign="top" > {{ $order->amount }} </td>
                                                                        <td align="center" class="no_display" valign="top"  > {{ $order->status }} </td>
                                                                        <td align="center"  valign="top" >
                                                                            <a href="#myModal{{$order->id}}" data-toggle="modal">View</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="7" class="text-center">No Orders</td>
                                                                </tr>
                                                            @endif
                                                        </table>
                                                        {{ $orders->render() }}
                                                        @foreach($orders as $order)
                                                            <div class="modal fade" id="myModal{{$order->id}}" role="dialog" tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="">
                                                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h1>Order Summery</h1>
                                                                            <hr />
                                                                            <h4>Order No :- {{$order->order_no}}</h4>
                                                                            <h4>Name :- {{$order->orderAddress->firstname}} {{$order->orderAddress->lastname}}</h4>
                                                                            <h4>Company Name :- {{$order->orderAddress->companyname}}</h4>
                                                                            <h4>Email :- {{$order->orderAddress->email}}</h4>
                                                                            <h4>Phone :- {{$order->orderAddress->phone}}</h4>
                                                                            <h4>Address :- {{$order->orderAddress->appartmentno}},{{$order->orderAddress->address}}</h4>
                                                                            <h4>Country,State,City :- {{$order->orderAddress->country}},{{$order->orderAddress->state}},{{$order->orderAddress->city}}</h4>
                                                                            <h4>Pincode :- {{$order->orderAddress->zipcode}}</h4>
                                                                            <h4>Note :- {{$order->orderAddress->notes}}</h4>
                                                                            <h1>Products List</h1>
                                                                            <hr />
                                                                            <table class="table table-condensed">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Image</th>
                                                                                    <th>Product Name</th>
                                                                                    <th>Price</th>
                                                                                    <th>Qyt</th>
                                                                                    <th>Total</th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                @foreach($order->orderProducts as $product)
                                                                                    <tr>
                                                                                        <td class="numeric product"><img src="{{$product->product->imagepath}}" height="60" width="60"></td>
                                                                                        <td class="numeric">{{$product->product->name}}</td>
                                                                                        <td class="numeric">${{$product->product->sale_price}}</td>
                                                                                        <td class="numeric">${{$product->qty}}</td>
                                                                                        <td class="numeric">{{$product->product->sale_price * $product->qty}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="wcmp_table_loader">
                                                        <a href="{{url('/market-place/orders?download=csv')}}" target="_blank" class="wcmp_black_btn">Download CSV</a>
                                                        <div class="clear"></div>
                                                    </div>
                                                </form>
                                                {{--<div class="wcmp_table_loader"> Showing Results<span> 0 </span></div>           --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>.wcmp_form1 p { font-size: 15px !important; }</style>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->


@endsection
