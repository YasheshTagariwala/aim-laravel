@extends('layouts.master')
@section('title', 'Project Insert')
@section('pagebody')

    
        <!-- Start Inner Contents -->               
        
        <section class="myaccount-header">
    <div class="container">
    <h1>Project Status Insert</h1>
        </div>
</section>
<section class="myaccount-body">
    <div class="myaccount-document">
    <div class="container">
<div class="vtab-nav clearfix vtab-nav-hrz"> 
              <ul class="resp-tabs-list clearfix">
                <li class=""><a href="{{url('/')}}">Dashboard</a></li>
                <li class=" active"><a href="#">Project Status</a></li>
                <!-- <li class="" id="Orders"><a href="{{url('/orders')}}">Orders</a></li> -->
                <li class="" id="marketplace"><a href="{{url('/market-place/dashboard')}}">Market Place </a></li></a>
           </ul>
           <ul class="resp-tabs-list right-tab  clearfix">
                                <li class="side_menu" id="messages"><a href="{{url('/messages')}}"><i class="fa fa-commenting-o" aria-hidden="true"></i></a></li>
                                <li class="side_menu" id="account"><a href="{{url('/account')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li> 
                                <li class="logout"><a href="{{url('/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              </ul>
              </div> 
     <div class="resp-tab">
      <div class="row ">  

                                    <div id="profileVerticalTab" class="form-profile">
              <div class="resp-tabs-container hor_1 clearfix"> 
                                <div class="panel-group" id="panel_2870">
                    
                    <form class="" action="{{url('/')}}/project/add-status" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                        <input type="hidden" value="{{$project_id}}" name="project_id">
                                <div class="form-group">
                                    <label >Title <span class="acf-required">*</span></label>                               
                                    <input name="title"  value="" size="40" class="form-control" type="text" required="">
                                </div>
                                <div class="form-group">
                                    <label >Description <span class="acf-required">*</span></label>                             
                                    <textarea name="content" cols="40" rows="10" class="form-control" required=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label >Percentage of Progress <span class="acf-required">*</span></label>                               
                                    <input name="percentage"  value="" size="40" class="form-control" type="number" required="">
                                </div>
                                <input value="Save" class="btn btn-primary" type="submit">
                      </form>
    
                    </div>
                              </div>
            </div>
                          
      </div>
    </div>
  </div>
  </div>
</section>
        <!-- End Inner Contents -->

    

@endsection
