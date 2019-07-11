@extends('layouts.master')
@section('title','Blog')
@section('pagebody')

<!-- Start Inner Contents -->       
    <section class="myaccount-header">
    <div class="container">
    <h1>Blog</h1>
    </div>
</section>
<section class="myaccount-body">
  <div class="container">
    <div class="row">
      <div class="col-sm-12  col-md-11 even-height ">
        <div class="blog-wrapper"> 
          <div class="clearfix">
          <div class="row">
            <div class="col-md-12">
              @foreach($blogs as $blog)                      
              <div class="blog-container">
              <div class="blog-info">
         <h3><a href="https://africainnovationmarket.org/blog/testing-blog-by-acropolis-11/" title="Testing Blog by Acropolis 11" rel="bookmark">{{$blog->name}}</a></h3>                 <div class="created-blog-info">
                       <div class="create-time"><?php echo date("M d Y",strtotime($blog->created_at)); ?> </div>
                       <?php $name = DB::table('userdetails')->where('id',$blog->created_by)->get(); ?>
                       <div class="create-author">@if($blog->created_by > 0 ) {{$name[0]->firstname}} {{$name[0]->lastname}} @else Admin @endif</div>
                       <div class="sharelinks" style="float:right"></div>
                 </div> 
                <div class="description">
                <p>                 {{$blog->content}}<div class="readmore">
<!-- <a href="https://africainnovationmarket.org/blog/testing-blog-by-acropolis-11/" rel="bookmark" title="Testing Blog by Acropolis 11">Read more...</a> --></div><div class="loop-rating">
<!-- AddThis Custom -->

                <div class="addthis_toolbox addthis_default_style " addthis:url='' addthis:title='Testing Blog by Acropolis 11'>
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_pinterest_pinit"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
<!-- End AddThis Custom -->
</div></div>
                </div>
              </div>
            @endforeach
                                  

            
                        </div>
            </div>
          </div>
          <!-- <nav class="text-center">
            <div class="post-nav"><ul class="pager"><li class="active"><span class="active">01</span></li><li><a href="/blog/?page=2">02</a></li><li><a href="/blog/?page=2" title="next"><i class="glyphicon glyphicon-chevron-right"></i></a></li><li class="next"><a href="/blog/?page=2">Last</a></li></ul></div>          </nav> -->
          <!-- /form-controls-wrapper--> 
          
        </div>
      </div>
      <!-- <div class="col-sm-4   col-md-3">
            <aside id="sidebar">
<div id="primary" class="widget-area">
<ul class="sid">
<div class="achives"><h2 class="rounded">Archives</h2>    <ul>
        </ul>
    </div><div class="tags"><h2 class="rounded">Tags</h2><div class="tagcloud"><a href='https://africainnovationmarket.org/tag/agriprofocus/' class='tag-link-527 tag-link-position-1' title='1 topic' style='font-size: 10pt;'>AgriProFocus</a>
<a href='https://africainnovationmarket.org/tag/aim/' class='tag-link-510 tag-link-position-2' title='1 topic' style='font-size: 10pt;'>AIM</a>
<a href='https://africainnovationmarket.org/tag/akon-lighting-africa/' class='tag-link-531 tag-link-position-3' title='1 topic' style='font-size: 10pt;'>Akon Lighting Africa</a>
<a href='https://africainnovationmarket.org/tag/asu/' class='tag-link-535 tag-link-position-4' title='1 topic' style='font-size: 10pt;'>ASU</a>
<a href='https://africainnovationmarket.org/tag/diaspora/' class='tag-link-520 tag-link-position-5' title='1 topic' style='font-size: 10pt;'>Diaspora</a>
<a href='https://africainnovationmarket.org/tag/social-entrepeneur/' class='tag-link-521 tag-link-position-6' title='1 topic' style='font-size: 10pt;'>Social Entrepeneur</a>
<a href='https://africainnovationmarket.org/tag/women/' class='tag-link-522 tag-link-position-7' title='1 topic' style='font-size: 10pt;'>Women</a>
<a href='https://africainnovationmarket.org/tag/youth/' class='tag-link-519 tag-link-position-8' title='1 topic' style='font-size: 10pt;'>Youth</a></div>
</div></ul>
</div>
</aside>
<div class="clear"></div>
            </div> -->
          </div>
  </div>
</section>
</div>
<script type="text/javascript" src="https://africainnovationmarket.org/wp-content/themes/gybi/includes/js/grids.js"></script> 
<script>jQuery(document).ready(function($){jQuery('li#menu-item-579').addClass('active');jQuery('.myStat4').circliful();jQuery('.project-list-height').responsiveEqualHeightGrid();});</script>

 
@endsection