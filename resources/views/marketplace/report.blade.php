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
                                <h1>Market Place Status / Reports</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group button_ds">
                                            <span>Showing stats and reports for :  October 2018</span>      
                                        </div>
                                        <form name="wcmp_vendor_dashboard_stat_report" method="get" >
                                            <div class="wcmp_form1 ">
                                                <p>Select Date Range :</p>
                                                <input type="text" name="wcmp_stat_start_dt" value="" class="pickdate gap1 wcmp_stat_start_dt">
                                                <input type="text" name="wcmp_stat_end_dt" value="" class="pickdate wcmp_stat_end_dt">
                                                <button name="submit_button" type="submit" value="Show" class="wcmp_black_btn ">Show</button>
                                            </div>
                                        </form>
                                        <div class="wcmp_ass_holder_box">
                                            <div class="wcmp_displaybox2 today_sl">
                                                <h4>Total Sales</h4>
                                                <h3><sup>$</sup>0</h3>
                                            </div>
                                            <div class="wcmp_displaybox2 today_ear">
                                                <h4>My Earnings</h4>
                                                <h3><sup>$</sup>0</h3>
                                            </div>
                                            <div class="clear"></div>
                                            <p>&nbsp; </p>
                                            <div class="wcmp_displaybox3">Total number of <span>Order placed</span><h3>0</h3></div>
                                            <div class="wcmp_displaybox3">Number of <span>Purchased Products</span><h3>0</h3></div>
                                            <div class="wcmp_displaybox3">Number of <span>Coupons used</span><h3>0</h3></div>
                                            <div class="wcmp_displaybox3">Total <span>Coupon Discount </span> value <h3>$0</h3></div>
                                            <div class="wcmp_displaybox3">Number of <span>Unique Customers </span><h3>0</h3></div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="wcmp_mixed_txt" > 
                                            <span>Download CSV to get complete Stats & Reports</span>
                                            <form name="wcmp_vendor_dashboard_stat_export" method="post" >
                                                <input type="hidden" name="wcmp_stat_export_submit" value="submit" />
                                                <button type="submit" class="wcmp_black_btn" name="wcmp_stat_export" value="export" style="float:right">Download CSV</button>
                                                <div class="clear"></div>
                                            </form>
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

    

@endsection