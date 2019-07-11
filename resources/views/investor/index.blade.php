@extends('layouts.master')
@section('title', 'Investor')
@section('pagebody')

    
  <section class="myaccount-header">
            <div class="container">
                <h1>Investor</h1>
                <p class="col-md-8 col-md-offset-2">Create a investor profile with your criteria, Browse our catalog of investment opportunities, Sort, analyze, and compare opportunities in minutes.</p>
            </div>
        </section>  
        
        <section class="myaccount-body">            
            <div class="container">      
 
        <div class=" boxed-container"> 
          <!--form-controls-wrapper start-->
          <form>
            <div class="form-controls-wrapper"> <span class="dropdown-wrapper clearfix">
               <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-12 pull-left">
                                <select name="country" onchange="this.form.submit()" class="form-control">
                  <option value=""> Country </option>
                                                      <option value="in">
                  India                  </option>
                                  </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 pull-left marginleft8">
                                <select name="industry" onchange="this.form.submit()" class="form-control">
                  <option select value=""> Industry </option>
                                                      <option value="it-and-technology">
                  Diaspora                  </option>
                                                      <option value="social-entrepreneurship">
                  Social Entrepreneur                  </option>
                                                      <option value="uncategorized">
                  Uncategorized                  </option>
                                                      <option value="service-entrepreneurship">
                  Women                  </option>
                                                      <option value="agri-business">
                  Youth                  </option>
                                  </select>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 pull-left marginleft8">
                                <select name="stage" onchange="this.form.submit()" class="form-control">
                  <option select value=""> Bussiness Stage </option>
                                                      <option value="idea-to-pilot-experimentation">
                  Idea to pilot (experimentation)                  </option>
                                                      <option value="pilot-to-proof-of-concept-customer-feedback-viability">
                  Pilot to proof of concept (customer feedback &amp; viability)                  </option>
                                                      <option value="proof-of-concept-to-investment-ready-profitability">
                  Proof of concept to investment ready (profitability)                  </option>
                                                      <option value="investment-ready-to-revenue-generation-sustainability">
                  Investment ready to revenue generation (sustainability)                  </option>
                                                      <option value="revenue-generation-to-shared-value-creation-co-creation">
                  Revenue generation to shared value creation (co-creation)                  </option>
                                                      <option value="shared-value-creation-to-community-wellbeing-wellbeing">
                  Shared Value creation to Community well-being (well-being)                  </option>
                                  </select>
              </div>
              <div class="col-md-2 col-sm-3 col-xs-12 pull-left pull-left-btn"> 
              <a class="btn" href="https://africainnovationmarket.org/investor"><img src="https://africainnovationmarket.org/wp-content/themes/gybi/images/Refresh-icon.png" width="19" height="19" alt="" pagespeed_url_hash="2274236417" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/>
              </a> 
              </div>
            </div>
            </span> </div>
          </form>
            
            
            
          <div class="projects-list clearfix investors-list">
                                    <div class="row">
            <div class="col-md-12">
              <div class="boxed-container project-list-height">
                <p class="text-center projects-logo col-md-2 col-sm-3"> <a href="https://africainnovationmarket.org/investors/investor/" title="" rel="bookmark" class="profilepiccs"> <img src="http://gybi.org/wp-content/plugins/ultimate-member/assets/img/default_avatar.jpg" class="gravatar img-circle  avatar avatar-150 um-avatar" width="150" height="150" alt="" pagespeed_url_hash="1547584002" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"/> </a> </p>
              
              <div class="profile-info-right col-md-7 col-sm-5">
<h3><a href="https://africainnovationmarket.org/investors/investor/" title="Investor" rel="bookmark">Investor AIM</a></h3>                                    <span class="location location123">India</span> 
                <div class="description" style="padding-left:15px;">
                  <p>Testing Expertise by Acropolis</p>
                  ..</div>
                <div class="loop-rating"><div id="yasr_visitor_votes_4769" class="yasr-visitor-votes"><div class="rateit medium" id="yasr_rateit_visitor_votes_4769" data-rateit-starwidth="24" data-rateit-starheight="24" data-rateit-value="4" data-rateit-step="1" data-rateit-resetable="false" data-rateit-readonly="false"></div><span class="yasr-total-average-container" id="yasr-total-average-text_4769" title="yasr-stats">
                [Total: 1 &nbsp; &nbsp;Average: 4/5]
            </span><span class="yasr-small-block-bold" id="yasr-already-voted-text">You've already voted this article with 4.0 </span></div>

    </div></div>
              <div class="col-md-3 col-sm-3">
              
              <ul class="ch-grid">
    <li>
        <div class="ch-item ch-img-1">
        <span><em>ROI</em> <br/>
 Test ROI %</span>
        
        </div>
    </li>
    
    </ul>
              
             
              
              </div>
              </div>
            </div>
            </div>
                      </div>
          <nav class="text-center">
                      </nav>
          <!-- /form-controls-wrapper--> 
          
        </div></div>
        </section> 
      
       <script type="text/javascript" src="{{url('/assets_new')}}/includes/js/grids.js"></script> 
<script>jQuery(document).ready(function($){jQuery('.myStat4').circliful();jQuery('.project-list-height').responsiveEqualHeightGrid();});</script>


@endsection