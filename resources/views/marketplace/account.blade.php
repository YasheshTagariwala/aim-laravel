@extends('layouts.master')
@section('title', 'Settings MarketPlace')
@section('pagebody')

 <div id="s-share-buttons" class="horizontal-w-c-circular s-share-w-c"></div>
        <section class="about_datails">
            <div class="bread_crumb">
                <div class="container">           
                    <ul class="breadcrumb">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">Marketplace Settings</a></li>
                    </ul>
                </div>
            </div><!-- bread_crumb -->
        </section>
        <section class="dash_board_pages">
            <div class="container">
                <div class="row">   
                    <div class="pages_content"> 
                        @include('marketplace.sidebar')
                        <div class="col-md-9 col-sm-9 col-xs-12">                       
                            <div class="new_dashboard">
                                <h1>Market Pace Account Details</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <form method="post" action="{{ url('/market-place/account') }}" name="shop_settings_form" class="wcmp_billing_form" id="form_account_settings">
                                            <div class="wcmp_form1">
                                                <h4>Bank Information</h4>
                                                @if(Session::has('status') && Session::get('status')== 'success')
                                                <br>
                                                <div class="alert alert-success" role="alert">
                                                    {{ Session::get('message') }}
                                                </div>
                                                @endif
                                                <p style="padding-left: 0%;">Enter your Bank Details</p>
                                                <div class="two_third_part">
                                                    <div class="select_box no_input">
                                                        <select id="vendor_bank_account_type"  name="vendor_bank_account_type" class="user-profile-fields">
                                                            <option value="current" @if(old('vendor_bank_account_type', @$bankAccountDetails->account_type ?? '') == 'current') selected @endif >Current</option>
                                                            <option value="savings" @if(old('vendor_bank_account_type', @$bankAccountDetails->account_type ?? '') == 'savings') selected @endif >Savings</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <input class="long no_input"  type="text" id="vendor_bank_account_number" name="vendor_bank_account_number" class="user-profile-fields" value="{{ old('vendor_bank_account_number', @$bankAccountDetails->account_number ?? '') }}" placeholder="Account Number" required />
                                                <div class="half_part">
                                                    <input class="long no_input"  type="text" id="vendor_bank_name" name="vendor_bank_name" class="user-profile-fields"  placeholder="Bank Name"  value="{{ old('vendor_bank_name', @$bankAccountDetails->bank_name ?? '') }}" required />
                                                </div>
                                                <div class="half_part">
                                                    <input class="long no_input"  type="text" id="vendor_aba_routing_number" name="vendor_aba_routing_number" class="user-profile-fields" placeholder="ABA Routing Number"  value="{{ old('vendor_aba_routing_number', @$bankAccountDetails->abn_routing_number ?? '') }}" required/>
                                                </div>
                                                <div class="clear"></div>
                                                <textarea  style="color: #7e7e7e;" class="long no_input"  name="vendor_bank_address" cols="" rows="" placeholder="Bank Address" required>{{ old('vendor_bank_address', @$bankAccountDetails->bank_address ?? '') }}</textarea>
                                                <div class="one_third_part">
                                                    <input class="long no_input"  type="text" placeholder="Destination Currency" name="vendor_destination_currency"  value="{{ old('vendor_destination_currency', @$bankAccountDetails->destination_currency ?? '') }}" required />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="long no_input"  type="text" placeholder="IBAN"  name="vendor_iban" value="{{ old('vendor_iban', @$bankAccountDetails->bank_iban ?? '') }}" required />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="long no_input"  type="text" placeholder="Account Holder Name"  name="vendor_account_holder_name" value="{{ old('vendor_account_holder_name', @$bankAccountDetails->account_holder ?? '') }}" required />
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="action_div_space"> </div>
                                                <div class="action_div">                        
                                                    <!--div class="green_massenger"><i class="fa fa-check"></i> All Options Saved</div-->   
                                                    <button class="wcmp_orange_btn" name="store_save_billing" id="accountSaveBtn" >Save Options</button>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <style>.wcmp_form1 p { font-size: 15px !important; }</style>                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->


@endsection