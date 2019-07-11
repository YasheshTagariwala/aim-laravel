@extends('layouts.master')
@section('title','Register already')
@section('pagebody')

<!-- Start Inner Contents -->       
        
    <section class="myaccount-header">
    <div class="container">
    <h1>Register</h1>
    </div>
    </section>

    <section class="myaccount-body">
    <div class="myaccount-document"> 
    <div class="container">
    <p>You were already register from the email you entered in AIM . Kindly check your email in login page. <a href="{{url('/login')}}" target="_top">Click here to login </a>(or) <a href="{{url('/')}}" target="_top"> Go Back To Home Page</a></p>
    <!-- AddThis Sharing Buttons below -->                  </div>
    </div>
    </section>           

@endsection