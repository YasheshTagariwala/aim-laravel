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
                            <div class="new_dashboard">
                                <h1>Market Place Messages </h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div id = "tabs-1" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                                            <ul class="wcmp_msg_tab_nav wcmp_msg_tab_nav ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
                                                <li data-element="_all"><a href = "#wcmp_msg_tab_1">All</a></li>
                                                <li data-element="_read"><a href = "#wcmp_msg_tab_2">Read</a></li>
                                                <li data-element="_unread" ><a href = "#wcmp_msg_tab_3">Unread</a></li>
                                                <li data-element="_archive"><a href = "#wcmp_msg_tab_4">Archive</a></li>
                                            </ul>
                                            
                                            <div id = "wcmp_msg_tab_1" data-element="_all">
                                                <div class="ajax_loader_class_msg"><img src="" alt="ajax-loader" /></div>
                                                <div class="msg_container" >            
                                                    Showing Results 0 out of 0      
                                                </div>
                                            </div>
                                            
                                            <!--div id = "wcmp_msg_tab_2" data-element="_read">
                                                <div class="ajax_loader_class_msg"><img src="" alt="ajax-loader" /></div>
                                                <div class="msg_container" >                            
                                                    Showing Results 0 out of 0              
                                                </div>
                                            </div>
                                            
                                            <div id = "wcmp_msg_tab_3" data-element="_unread">
                                                <div class="ajax_loader_class_msg"><img src="" alt="ajax-loader" /></div>
                                                <div class="msg_container" >                
                                                    Showing Results 0 out of 0                  
                                                </div>
                                            </div>
                                            
                                            <div id = "wcmp_msg_tab_4" data-element="_archive">
                                                <div class="ajax_loader_class_msg"><img src="" alt="ajax-loader" /></div>
                                                <div class="msg_container">             
                                                    Showing Results 0 out of 0                  
                                                </div>
                                            </div-->
                                            
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