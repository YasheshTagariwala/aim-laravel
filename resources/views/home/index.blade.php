@extends('layouts.master')
@section('title', 'Home')
@section('pagebody')

<!-- Start Inner Contents -->       
        
        <section class="working-process">
            <div class="container">
                <h1 class="text-center">How it Works</h1>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 res-worklist chevron animated fadeInLeft">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/business-plan.png" alt="SUBMIT YOUR BUSINESS PLAN" >
                                <h4>Become an Entrepreneur!</h4>
                                <ul>
                                <li class="working_p"><!-- <span class="badge">1</span> --> Create, analyze, and optimize your business plan</li>
                                <li class="working_p"><!-- <span class="badge">2</span> --> Maximize your entrepreneurship success with supporters</li>
                                <li class="working_p"><!-- <span class="badge">3</span> --> Secure flexible funding for your business from investors</li>
                                </ul><br>
                                <button onclick="location.href='{{url('/ent-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                    <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>
                            </figure>
                            <br></br>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 res-worklist chevron2 animated fadeInLeft">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/feedback.png" alt="GET EXPERT FEEDBACK" >
                                <h4>Become an Investor!</h4>
                                <ul class="float left">
                                <li class="working_p"><!-- <span class="badge">1</span> --> Create an investor profile with your criteria</li>
                                <li class="working_p"><!-- <span class="badge">2</span> --> Browse our entrepreneurs’ investment opportunities</li>
                                <li class="working_p"><!-- <span class="badge">3</span> --> Sort, analyze, and compare opportunities in minutes</li> 
                                </ul><br>
                                <button onclick="location.href='{{url('/inv-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>
                            </figure>
                            <br></br>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 chevron2 animated fadeInRight">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/funding.png" alt="PICK YOUR FUNDING OPTION" >
                                <h4>Become an Organization!</h4>
                                <ul>
                                <li class="working_p"><!-- <span class="badge">1</span> --> Create an organization profile with your focus areas</li>
                                <li class="working_p"><!-- <span class="badge">2</span> --> Invite youth, women, innovators to join your community</li>
                                <li class="working_p"><!-- <span class="badge">3</span> --> Connect with other organizations to learn about new trends and patterns</li> 
                                </ul>   <br>
                                <button onclick="location.href='{{url('/org-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                    <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>                        
                            </figure>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 chevron animated fadeInRight">
                        <div class="work-list">
                            <figure class="text-center">
                                <img src="{{url('/')}}/assets_new/images/business-grow.png" alt="GROW YOUR BUSINESS" >
                                <h4>Become a Supporter!</h4>
                                <ul>
                                <li class="working_p"><!-- <span class="badge">1</span> --> Create a supporter profile with your focus areas</li>
                                <li class="working_p"><!-- <span class="badge">2</span> --> Understand entrepreneur’s needs and growth opportunities</li>
                                <li class="working_p"><!-- <span class="badge">3</span> --> Share your expertise and practical experience with entrepreneurs</li>
                                </ul><br>
                                <button onclick="location.href='{{url('/sup-register')}}'" style="padding:10px;border:none; border-radius:8px;background-color:#ff3e02;color:#ffffff;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
                                    <a style="color:#ffffff;" href="#">Sign Up</a>
                                </button>                        
                            </figure>
                            <br><br>
                        </div>
                    </div>
                </div>  <br>
        <!-- <div class="nav pills tomato_link">
            <li class="col-md-4"><a href="{{url('/entrepreneur')}}/search/11" style="color: white;font-size: 20px;text-align: center;">Recent Entrepreneurs</a></li>  
            <li class="col-md-4"><a href="{{url('/entrepreneur')}}/search/12" style="color: white;font-size: 20px;text-align: center;">Top Entrepreneurs</a>  </li>        
            <li class="col-md-4"><a href="{{url('/entrepreneur')}}/search/13" style="color: white;font-size: 20px;text-align: center;">Featured Entrepreneurs</a> </li>         
        </div> -->
            </div>
        </section>
        
<!-- End Inner Contents -->                 
                        

@endsection