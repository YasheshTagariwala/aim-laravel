@extends('layouts.master')
@section('title', 'Messages MarketPlace')
@section('pagebody')

 <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
        <section class="about_datails">
            <div class="bread_crumb">
                <div class="container">           
                    <ul class="breadcrumb">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">MarketPlace Dashboard</a></li>
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
                                <h1>Dashboard</h1>
                                <hr />
                                <!--div class="vendor_non_configuration_msg">
                                    <h4>You have not configured your store properly missing some required fields!</h4>
                                </div-->    
                                <div class="row">
                                    <div class="wcmp_tab col-md-12">
                                        <ul class="btn-group button_ds">
                                            <li><a href="#today" id="today_click" class="active active btn btn-default tody">Today</a></li>
                                            <li><a href="#theweek" id="theweek_click" class="btn btn-default" >This Week</a></li>
                                        </ul>
                                        <div class="col-md-12">
                                            <div class="row"></div>
                                        </div>
                                        <div class="wcmp_tabbody"  id="today" >             
                                            <div class="col-md-4 col-sm-4">
                                                <div class="today_sl">
                                                    <p>Todays Sales</p>
                                                    <h1><sup>$</sup>0<span>.00</span></h1>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="today_ear">
                                                    <p>Todays Earnings</p>
                                                    <h1><sup>$</sup>0<span>.00</span></h1>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="net_bal">
                                                    <p>Net Balance</p>
                                                    <h1><sup>$</sup>0<span>.00</span></h1>
                                                </div>
                                            </div>
                                            <div class="col-md-12 sale_tb">
                                                <h3 >Sales</h3>
                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="wcmp_sale_report_table_today" width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
                                                        <tr>
                                                            <td align="center" >ID</td>
                                                            <td  align="center" >SKU</td>
                                                            <td class="no_display"  align="center" >Sales</td>
                                                            <td class="no_display" align="center" >Discount</td>
                                                            <td align="center" >My Earnings</td>
                                                        </tr>
                                                        <!--tr>
                                                            <td align="center" >#22</td>
                                                            <td align="center" >aaa</td>
                                                            <td align="center" class="no_display" >$0.00</td>
                                                            <td align="center" class="no_display" >$0.00</td>
                                                            <td align="center" >$0.00</td>
                                                        </tr-->                     
                                                    </table>
                                                </div>
                                                <div class="wcmp_table_loader">                 
                                                    <div class="col-md-6"><p>Showing Results<span> <span class="wcmp_front_count_first_num_today">0</span> out of 0</span></p></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 sale_tb">
                                                <h3>Pending Shipping</h3>
                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="wcmp_pending_shipping_report_table_today" class="table table-striped" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tr>
                                                            <td align="center" >Product Name</td>
                                                            <td  align="center" class="no_display" >Order Date<br>
                                                                <span style="font-size:12px;">dd/mm</span></td>
                                                            <td  align="center" class="no_display" >L/B/H/W</td>
                                                            <td align="left" >Address</td>
                                                            <td align="center" class="no_display" >Charges</td>
                                                        </tr>
                                                        <!--tr>
                                                            <td align="center" >Test</td>
                                                            <td align="center" class="no_display" >--</td>
                                                            <td align="center" class="no_display" >--</td>
                                                            <td align="left" >--</td>
                                                            <td align="center" class="no_display" >--</td>
                                                       </tr-->
                                                    </table>
                                                </div>              
                                                <div class="wcmp_table_loader">                     
                                                    <div class="col-md-6"><p>Showing Results<span> <span class="wcmp_front_count_first_num_today_ps">0</span>out of 0</span></p></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wcmp_tabbody" id="theweek" >
                                            <div class="col-md-4 col-sm-4">
                                                <div class="today_sl">
                                                    <p>Weekly Sales</p>
                                                    <h1><sup>$</sup>0<span>.00</span></h1>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="today_ear">
                                                    <p>Weekly Earnings</p>
                                                    <h1><sup>$</sup>0<span>.00</span></h1>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="net_bal">
                                                    <p>Weekly Balance</p>
                                                    <h1><sup>$</sup>0<span>.00</span></h1>
                                                </div>
                                            </div>
                                            <div class="col-md-12 sale_tb">
                                                <h3>Sales</h3>
                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="wcmp_sale_report_table_week" width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
                                                    <table id="wcmp_sale_report_table_today" width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
                                                        <tr>
                                                            <td align="center" >ID</td>
                                                            <td  align="center" >SKU</td>
                                                            <td class="no_display"  align="center" >Sales</td>
                                                            <td class="no_display" align="center" >Discount</td>
                                                            <td align="center" >My Earnings</td>
                                                        </tr>
                                                        <!--tr>
                                                            <td align="center" >#22</td>
                                                            <td align="center" >aaa</td>
                                                            <td align="center" class="no_display" >$0.00</td>
                                                            <td align="center" class="no_display" >$0.00</td>
                                                            <td align="center" >$0.00</td>
                                                        </tr-->                     
                                                    </table>
                                                    </table>
                                                </div>
                                                <div class="wcmp_table_loader">             
                                                    <div class="col-md-6"><p class="show_res">Showing Results<span> <span class="wcmp_front_count_first_num_week">0</span> out of 0</span></p></div>                
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-12 sale_tb">
                                                <h3>Pending Shipping</h3>
                                                <hr />
                                                <div class="table-responsive">
                                                    <table id="wcmp_pending_shipping_report_table_week" width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
                                                        <tr>
                                                            <td align="center" >Product Name</td>
                                                            <td  align="center" class="no_display" >Order Date<br>
                                                                <span style="font-size:12px;">dd/mm</span></td>
                                                            <td  align="center" class="no_display" >L/B/H/W</td>
                                                            <td align="left" >Address</td>
                                                            <td align="center" class="no_display" >Charges</td>
                                                        </tr>
                                                        <!--tr>
                                                            <td align="center" >Test</td>
                                                            <td align="center" class="no_display" >--</td>
                                                            <td align="center" class="no_display" >--</td>
                                                            <td align="left" >--</td>
                                                            <td align="center" class="no_display" >--</td>
                                                       </tr-->
                                                    </table>
                                                </div>              
                                                <div class="wcmp_table_loader">             
                                                    <div class="col-md-6"><p>Showing Results<span> <span class="wcmp_front_count_first_num_week_ps">0</span> out of 0</span></p></div>
                                                </div>      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <style type="text/css">
                            .ajax_loader_class {
                                width:100%;
                                position:absolute;
                                z-index:8888;
                                background-color:#ddd;
                                opacity:0.7;
                                height:100%;
                                text-align:center;
                                display:none;
                            }
                            .ajax_loader_class img{ 
                                margin:50px auto;   
                            }
                            </style>                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->

@endsection