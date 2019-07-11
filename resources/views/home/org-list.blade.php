@extends('layouts.master')
@section('title','Organization List')
@section('pagebody')

<!-- Search Selection part -->                      
                  
  
<?php $countries = DB::table('countries')->get();
 $categories = DB::table('categories')->where('groupid','1')->get(); ?>      
  <section class="select-bar animated slideInUp">
              <div class="container">
                <div class="row">
                    <form action="{{url('/org-list')}}/search" method="post">
                      {{ csrf_field() }}
                  <div class="col-md-4 col-sm-4">
                    <div class="custom-select">
                      <select name="country" onchange="this.form.submit()" class="form-control basic">
                        <option value=""> Country </option>
                          @foreach($countries as $country)
                          <option value="{{$country->name}}" @if($country->name == $country) selected="" @endif>{{$country->name}}</option>
                          @endforeach
                        </select>
                    </div>  
                  </div>
                  <div class="col-md-4 col-sm-4">
                  <div class="custom-select">
                  <select name="category" onchange="this.form.submit()" class="form-control">
                      <option value=""> Categories </option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" @if($category->name == $category) selected="" @endif >{{$category->name}}</option>
                          @endforeach
                  </select>
                  </div>
                  </div>
                  </form>
                </div>
              </div>
            </section>
              @foreach($organizations as $organization)
<section class="list-items">
  <div class="container">
    <div class="row">
              <div class="col-md-6 col-sm-6 animated slideInLeft">
             
        <a href="#" data-toggle="modal" title="" data-target="#orgInfo{{$organization->id}}"><div class="list-content ">
          <div class="col-md-6 col-sm-6 col-xs-6 list-icon  text-center ">
            <div class="thumb_logo"><img src='{{$organization->org_logo}}' alt='{{$organization->name}}' class='' id='' pagespeed_url_hash="843677404" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" style="width: 250px;height: 250px;"/></div>         </div>
          <div class="col-md-6 col-sm-6 col-xs-6 vot-info listcont1">
            <h3>{{$organization->name}}</h3>           <div class="rating">
              <font class="text-left">                      <i class="fa fa-map-marker" aria-hidden="true"></i> {{$organization->country}}</font>
              <div id="stars-default" class="inner-star"></div>
            </div>
            <p><span lang="">{{substr($organization->description,0,50)}}...
            </span></p>
          </div>
        </div></a>
      </div>
            <!--  List Page Section Ends Here -->
<!-- PopUp Window -->
<div class="popup-wrapper">
<div class="modal fade" id="orgInfo{{$organization->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        


        <div class="popup-body">
            <div class="row">
              <div class="col-md-5">
                <div class="popup-banner">
                    <h1></h1>
                    <div id="stars-default" class="inner-star"></div>
                    <figure class="text-center">
                    <div class="thumb_logo"><img src='{{$organization->org_logo}}' alt='{{$organization->name}}' class='img-responsive popup_img' id='' pagespeed_url_hash="843677404" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" style="width: 250px;height: 200px;"/></div>                 </figure>

                    <!-- <ul>
                                            <li id="shareit-menu" class="share"><a class="addthis_button_compact"><i class="fa fa-plus" aria-hidden="true"></i> Share</a>
                    </li>

                    </ul> -->
                    </div>
                    </div>
                    <div class="col-md-7">
                    <div class="view-all">
                    <h2>{{$organization->name}} &nbsp; <span class='wpfp-span'><!-- <img src='https://africainnovationmarket.org/wp-content/plugins/wp-favorite-posts/img/loading.gif' alt='Loading' title='Loading' class='wpfp-hide wpfp-img' pagespeed_url_hash="1515234855" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/> --><a class='wpfp-link' href='?wpfpaction=add&amp;postid=4758' title='' rel='nofollow'><button><i class="fa fa-heart" aria-hidden="true"></i></button></a></span></h2>
                    <h3>
                                              <i class="fa fa-map-marker" aria-hidden="true"></i> {{$organization->country}}                                    </h3>
                    <div id="yasr_visitor_votes_4758" class="yasr-visitor-votes"><div class="rateit" id="yasr_rateit_visitor_votes_4758" data-rateit-starwidth="16" data-rateit-starheight="16" data-rateit-value="5" data-rateit-step="1" data-rateit-resetable="false" data-rateit-readonly="true"></div><span class="yasr-total-average-container" id="yasr-total-average-text_4758" title="yasr-stats">
                    [Total: 1 &nbsp; &nbsp;Average: 5/5]
                    </span></div>

                    <p><span lang="">{{substr($organization->description,0,50)}}...
                    ...</span></p>
                    <div id="faq-cat-1-sub-2" class="panel-collapse panel">
                    <div class="panel-body summery-body padding-none">
                    <div class="clearfix">
                      <div class="col-md-6 col-sm-6 col-xs-6 prior-year">
                        <p>Founded Date</p>
                        <h1>{{date("d-m-Y",strtotime($organization->founded_date))}}                                                                    </h1>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6 current-year">
                        <p>Mission</p>
                        <h1><p>{{$organization->mission}}</p>
                    </h1>
                      </div>
                    </div>
                    <div class="more-link padding-t-10">  
                    <a href="{{url('/organization')}}/{{$organization->id}}"><button type="button" class="btn btn-default">More Details</button></a>
                    </div> 
                    </div>
                    </div>
                    </div>

                    </div>
                    </div>

        </div>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

          </div>
        <nav class="text-center">
            
                </nav>
              </div>
          
      </div>
        
</section>
@endforeach
</div>
<!-- Sponsors and Partners Section Starts Here  -->



        <section class="sponsonrs animated slideInLeft">
        <div class="container-fluid">
            <marquee scrollamount="5" onmouseover="this.stop();" onmouseleave="this.start();">
            <a href="http://www.cta.int/en/" target="_blank">
            <img src="http://52.91.239.163/wp-content/uploads/2016/03/ctanew.png" alt="CTA" width="250" height="100" pagespeed_url_hash="884728392" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </a>

            <a href="http://www8.gsb.columbia.edu/" target="_blank">
            <img src="http://52.91.239.163/wp-content/uploads/2016/02/columbia.png" alt="Columbia Women School" width="250" height="100" pagespeed_url_hash="2321047071" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
            </a>

            </marquee>
        </div>
        </section>
            



@endsection