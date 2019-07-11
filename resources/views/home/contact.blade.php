@extends('layouts.master')
@section('title','Contact Form')
@section('pagebody')

<!-- Start Inner Contents -->       
        
        <section class="myaccount-header">
    <div class="container">
    <h1>Contact</h1>
    </div>
</section>

  <section class="myaccount-body">
    <div class="myaccount-document"> 
    <div class="container">
<div class="row">
<div class="col-xs-12">
<div class="contact_details">
<div class="row">
<div class="col-md-6 col-sm-12 col-xs-12 contactform"><div class="wpcf7" id="wpcf7-f4734-p19-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form name="" action="{{url('/')}}/contact/store" method="post" class="wpcf7-form">
                                                    {{csrf_field()}} 
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="4734"/>
<input type="hidden" name="_wpcf7_version" value="4.1.1"/>
<input type="hidden" name="_wpcf7_locale" value="en_US"/>
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f4734-p19-o1"/>
<input type="hidden" name="_wpnonce" value="dbffad85d7"/>
</div>
<h3>Contact Form</h3>
<div class="form-group"><label>Your Name (Required)</label><span class="wpcf7-form-control-wrap your-name"><input type="text" name="name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" required=""/></span> </div>
<div class="form-group"><label>Your Email (Required)</label><span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" required=""/></span> </div>
<div class="form-group"><label>Subject</label><span class="wpcf7-form-control-wrap your-subject"><input type="text" name="subject" value="" size="40" class="wpcf7-form-control wpcf7-text form-control" aria-invalid="false" required=""/></span> </div>
<div class="form-group"><label>Your Message</label><span class="wpcf7-form-control-wrap your-message"><textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" required=""></textarea></span> </div>
                        <input value="{{url('/')}}" name="current_url" type="hidden"> 
<p><input type="submit" value="send" class="wpcf7-form-control wpcf7-submit btn btn-primary"/></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div>
</div>
</div>
</div>
</div>
<div class="normal-content no-boxed"><!--

<div id="map-contact" class="insert-map" data-showcontrols="true" data-lat="38.877166" data-lng="-77.000117" data-zoom="12" data-title="Global Youth Women Incubation" ></div>


</div>


--><br/>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script></div>
<!-- AddThis Sharing Buttons below -->                  </div>
      </div>
      </section
        
<!-- End Inner Contents -->                 

@endsection