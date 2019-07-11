@extends('layouts.master')
@section('title','Campaign Support')
@section('pagebody')

<!-- Start Inner Contents -->       
        
      <section class="myaccount-header">
    <div class="container">
    <h1>Campaign Support</h1>
    </div>
</section>

  <section class="myaccount-body">
    <div class="myaccount-document"> 
    <div class="container">
                <center><h4>Our dedicated support specialists are available 7 days a week, 365 days a year.</h4></center>
<div class="col-12 text-center"><a class="btn btn-info" href="{{url('/contact')}}">Contact US</a></div>
<!-- AddThis Sharing Buttons below -->                  </div>
      </div>
    </section>

   
<script>jQuery(document).ready(function($){$(".hint--top").tooltipster({animation:"grow",});});</script>
@endsection