@extends('layouts.master')
@section('title', 'Requirements List')
@section('pagebody')

 <!-- section for images -->
    @php
        $categories = DB::table('categories')->where('groupid','1')->get(); ?>
    @endphp
  <section class="custom_requi">
            <div class="container">
                <div class="center-block slider_content">
                    <h1>Requirements Lists</h1>
                </div><!-- container -->
            </div>
        </section>
        <section class="custom_content">
            <div class="container">
                <div class="row disp-tbl w-100 ">
                    <div class="col-md-3 checkbox_side dis-tcell">
                        <h3>categories</h3>
                        <form id="search" method="get">
                            @foreach($categories as $category)
                                <div class="clearfix">
                                    <div class="squaredFour">
                                        <input id="squaredFour{{$category->name}}" value="{{$category->name}}" name="category[]" onchange="" type="checkbox">
                                        <label for="squaredFour{{$category->name}}"></label>
                                    </div>
                                    <span>{{$category->name}}</span>
                                </div>
                            @endforeach
                            <div class="clearfix">
                                <div class="squaredFour">
                                    <input type="submit" value="Search" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>        
                    <div class="col-md-9 col-sm-9 col-xs-12 dis-tcell">
                        @foreach($products as $product)
                        <article>
                            <img src="{{$product->imagepath}}" alt="Placeholder" width="135" height="135">           
                            <div class="article_content">
                                <h2>{{$product->name}}</h2>
                                <p>{{substr($product->short_desc,0,50)}}...</p>
                                <?php $uname = DB::table('userdetails')->where('id',$product->created_by)->get(); ?>
                                <p>Posted by <b>{{$uname[0]->firstname}} {{$uname[0]->lastname}}</b></p>
                                <a href="{{url('/')}}/product/{{$product->id}}" class="btn btn-sm">view details</a> 
                            </div>
                        </article>
                        @endforeach
                        {{$products->render()}}
                    </div>
                </div>
                <nav class="text-center"></nav>
            </div><!-- row -->
        </section>      
    <!-- section for images -->
    
    <section class="form_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 slideInLeft animated">
                    <p><span>Have</span> custom Product Enquiry?</p>
                    <h1 class="text-right">post here</h1>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 slideInRight animated ">
                    <form class="req_success_messsage">
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input class="form-control name required" id="exampleInputtext" name="name" placeholder="Name" type="text">
                        </div>
                        <div class="select-style form_arrow">
                            <select name="cat" id="cat" class="postform">
                                <option class="level-0" value="562">Industry</option>
                                <option class="level-0" value="563">Social Entrepreneur</option>
                                <option class="level-0" value="564">Youth</option>
                                <option class="level-0" value="565">Diaspora</option>
                                <option class="level-0" value="566">Women</option>
                                <option class="level-0" value="567">Uncategorized</option>
                            </select> 
                        </div>
                        <textarea class="form-control requirement required" rows="3" placeholder="Enter requirement" name="requirement" required="required"></textarea>
                        <button type="submit" class="btn btn-default btn-block btn-raise btn_veiw_all requirement_submit">Submit</button>
                    </form>
                </div>            
            </div><!-- row -->
        </div><!-- container -->
    </section>  
        <section class="top_seller">
            <div class="container">
                <div class="row">
                    <h2 class="vendor-headding-custom">Top sellers</h2>
                    @foreach($top_seller as $sellers)
                        <div class="col-md-2 col-sm-2 col-xs-12 img_sec">
                            <div class="images_12_sell" style="height: 350px;">
                                <div class="animate_img">
                                    <a href="{{ url('market-place/seller/'.$sellers->id) }}">
                                        <img class="img-responsive vendor_img" src="{{url('/')}}/assets_new/images/WP-stdavatar.png" id="vendor_image_display" width="125">
                                    </a>
                                    <div class="textbox">
                                        <div class="v_center">
                                            <a href="{{ url('market-place/seller/'.$sellers->id) }}">
                                                <button type="button" class="btn btn-primary btn-lg btn-block">DETAILS</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <h6>{{ $sellers->firstname }} {{ $sellers->lastname }}</h6>
                                <div class="row lead">
                                    <div style="width:100%; height:50px; margin-bottom:5px; padding-left:15px;">
                                        @if(count((array)$sellers->ratings) > 0)
                                            @php
                                                $ratings = $sellers->ratings;
                                                $rates = [0 => 0,1 => 0,2 => 0,3 => 0,4 => 0];
                                                foreach ($ratings as $rating) {
                                                    $rates[$rating->rating] += 1;
                                                }
                                            @endphp
                                            @for ($i = 0;$i < array_search(max($rates),$rates);$i++)
                                                <i class="fas fa-star" style="color: orange"></i>
                                            @endfor
                                        @else
                                            <div>No Rating Yet</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        
                </div><!-- row -->
            </div><!-- container -->
        </section>
    

@endsection
