@extends('layouts.master')
@section('title', 'Payment History MarketPlace')
@section('pagebody')

 
        <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
        <section class="about_datails">
            <div class="bread_crumb">
                <div class="container">           
                    <ul class="breadcrumb">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">Marketplace Payment History</a></li>
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
                                <h1>Payments History </h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group button_ds">
                                            <span>Showing Payment History for : </span> 01-10-2018-31-10-2018
                                        </div>
                                        <div class="wcmp_form1">    
                                            <div class="transaction_settings">
                                                <form method="get" id="wcmp_transaction_filter" class="">
                                                    <div class="wcmp_form1 ">
                                                        <p>Select Date Range :</p>
                                                        <input id="wcmp_from_date" name="from_date" class="pickdate gap1" placeholder="From" value =""/>
                                                        <input id="wcmp_to_date" name="to_date" class="pickdate" placeholder="To" value =""/>
                                                        <button type="submit" name="order_export_submit" id="submit"  class="wcmp_black_btn" >Show</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <form method="post" name="export_transaction_form"> 
                                                <div class="wcmp_table_holder">
                                                    <table class="get_wcmp_transactions" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody> 
                                                            <tr>
                                                                <td align="center" valign="top"  width="20">
                                                                    <span class="input-group-addon beautiful">
                                                                        <input class="select_all_transaction" type="checkbox" >
                                                                    </span>
                                                                </td>
                                                                <td>Date</td>
                                                                <td>Transc.ID</td>
                                                                <td>Order IDs</td>
                                                                <td>Fee</td>
                                                                <td>Net Earnings</td>
                                                            </tr>
                                                                
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="wcmp_table_loader">
                                                    <form method="post" name="export_transaction" style="float: left;">                         
                                                        <button type="submit" name="export_transaction" class="wcmp_black_btn">Download CSV</button>
                                                    </form>                     
                                                    <div class="clear"></div>
                                                </div>
                                            </form>
                                            <p style="clear: both;">Sorry. No transactions are available.</p>
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