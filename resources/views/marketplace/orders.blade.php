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
                                            <form name="wcmp_vendor_dashboard_orders" method="get" >
                                                <input type="text" name="wcmp_start_date_order" class="pickdate gap1 wcmp_start_date_order" placeholder="" value="" />
                                                <input type="text" name="wcmp_end_date_order" class="pickdate wcmp_end_date_order" placeholder="" value="" />
                                                <button class="wcmp_black_btn" type="submit" name="wcmp_order_submit">Show</button>
                                            </form>
                                        </div>
                                        <div class="wcmp_tab">
                                            <ul>
                                                <li><a href="#all" id="all_click">All</a></li>
                                                <li><a href="#processing" id="processing_click" >Processing</a></li>
                                                <li><a href="#completed" id="complited_click" >Completed</a></li>
                                            </ul>
                                            <div class="wcmp_tabbody"  id="all" >           
                                                <form name="wcmp_vendor_dashboard_all_stat_export" method="post" >
                                                    <div class="wcmp_table_loader"> Showing Results <span> 
                                                        <span>
                                                            <span class="wcmp_all_now_showing"> <?php echo '6'; ?></span> out of 10</span> 
                                                            <span></span>
                                                    </div>
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
                                                                <td align="center"  valign="top" > Actions </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                    <div class="wcmp_table_loader">
                                                        <button type="submit" name="download_all_all_csv" class="wcmp_black_btn">Download CSV</button>
                                                        <input type="hidden" id="wcmp_all_order_total_hidden" name="wcmp_submit_order_total_hidden" value="all" /> 
                                                        <button  value="Show" data-shown="6" data-type="all" data-total="" name="wcmp_download_order_submit" class="wcmp_black_btn wcmp_download_order_submit" style="float:right">Show More</button>
                                                        <div class="clear"></div>
                                                    </div>
                                                </form>
                                                <div class="wcmp_table_loader"> Showing Results<span> 0 </span></div>           
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
