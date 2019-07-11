@extends('layouts.master')
@section('title','Pricing Campaign')
@section('pagebody')

<!-- Start Inner Contents -->       
        
    <section class="myaccount-header">
    <div class="container">
    <h1>Pricing Campaign</h1>
    </div>
</section>

  <section class="myaccount-body">
    <div class="myaccount-document"> 
    <div class="container">
            <div class="static-content">
            <div class="whygybi price-wrap" align="center">
            <h2>PRICE TABLE</h2>
            <h3>It is free for anyone to sign up and create an account.</h3>
            <p style="text-align: center">
                <table id="Table_01"  border="0" cellpadding="0" cellspacing="0" >
                    <tr>
                        <td colspan="7">
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_01.gif" width="1060" height="419" alt=""></td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_02.gif" width="315" height="116" alt=""></td>
                        <td>
                            <a href="{{url('/register')}}"><img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_03.gif" width="186" height="45" alt=""></a></td>
                        <td rowspan="2">
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_04.gif" width="56" height="116" alt=""></td>
                        <td>
                            <a href="{{url('/register')}}"><img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_05.gif" width="184" height="45" alt=""></a></td>
                        <td rowspan="2">
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_06.gif" width="55" height="116" alt=""></td>
                        <td>
                            <a href="{{url('/register')}}"><img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_07.gif" width="184" height="45" alt=""></a></td>
                        <td rowspan="2">
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_08.gif" width="80" height="116" alt=""></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_09.gif" width="186" height="71" alt=""></td>
                        <td>
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_10.gif" width="184" height="71" alt=""></td>
                        <td>
                            <img src="{{url('/')}}/assets_new/pricingtable/Untitled-1_11.gif" width="184" height="71" alt=""></td>
                    </tr>
                </table>
            </p>
            </div>
            </div>
<!-- AddThis Sharing Buttons below -->                  
        </div>
      </div>
    </section>
   

@endsection