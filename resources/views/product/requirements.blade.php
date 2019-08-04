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
                        @php
                            $selected_categories = \Illuminate\Support\Facades\Request::get('category',[]);
                        @endphp
                        <form id="search" method="get">
                            @foreach($categories as $category)
                                <div class="clearfix">
                                    <div class="squaredFour">
                                        <input id="squaredFour{{$category->id}}" value="{{$category->id}}" @if(in_array($category->id,$selected_categories)) checked @endif name="category[]" onchange="" type="checkbox">
                                        <label for="squaredFour{{$category->id}}"></label>
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
                            <div class="article_content">
                                <h2>{{$product->email}}</h2>
                                <span>{{$product->category_name}}</span>
                                <p>{{$product->requirement}}...</p>
                                {{--<a href="{{url('/')}}/product/{{$product->id}}" class="btn btn-sm">view details</a> --}}
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
                    <form class="req_success_messsage" method="post" action="{{url('/')}}/market-place/custom-enquiry/store">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input class="form-control name required" id="exampleInputtext" required="required" name="email" placeholder="Email" type="text">
                        </div>
                        <div class="select-style form_arrow">
                            <select name="cat" id="cat" class="postform" required="required" onchange="setName(this)">
                                <option class="level-0" value="">Categories</option>
                                @foreach($categories as $category)
                                    <option class="level-0" value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="cat_text" id="cat_text" value="Category">
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
                                                <i class="fa fa-star" style="color: orange"></i>
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
 <script>
     function setName(val) {
         jQuery('#cat_text').val(jQuery(val).find("option:selected").text());
     }
 </script>

@endsection
