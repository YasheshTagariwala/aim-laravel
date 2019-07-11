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
                                <h1>Marketplace Settings</h1>
                                <hr />
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        @if(Session::has('status'))
                                            <br>
                                            <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        <h4>General</h4>
                                        <form action="{{url('/')}}/marketplace/store" method="post" name="shop_settings_form" class="wcmp_shop_settings_form wcmp_billing_form" enctype="multipart/form-data">
                                                    {{csrf_field()}} 
                                            <div class="wcmp_form1">
                                                <p>Store Name *<span class="tooltip_gybi"><i class="fa fa-question-circle"></i></span></p>
                                                <input class="no_input"  type="text" name="store_name" value="{{ @$marketplace->storename }}"  placeholder="Enter your Store Name here" />
                                                <p>Store Slug1 *<span class="tooltip_gybi"><i class="fa fa-question-circle"></i></span></p>
                                                <span style="display:block;" class="txt">
                                                    <input class="no_input"  type="text" name="store_slug"  value="{{ @$marketplace->store_slug }}" placeholder="Enter your Store Name here" />
                                                </span>             
                                                <p>Shop Description<span class="tooltip_gybi"><i class="fa fa-question-circle"></i></span>              
                                                <span class="input-group-addon beautiful" ><input type="checkbox" name="vendor_description"  value="Enable" ><span>Hide from user</span></span></p>                
                                                <textarea class="no_input"  name="description" cols="" rows="" placeholder="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ">{{ @$marketplace->description }}</textarea>
                                                <p>Message to Buyers</p>
                                                <textarea class="no_input"  name="buyer_msg" cols="" rows="" placeholder="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ">{{ @$marketplace->buyer_msg }}</textarea>
                                                <div class="half_part">
                                                    <p>Phone <span class="input-group-addon beautiful" >
                                                    <input type="checkbox" name="vendor_hide_phone"  value="Enable" >
                                                    <span> Hide from user</span> </span> </p>
                                                    <input class="no_input"  type="text" name="phone" placeholder="" value="{{ @$marketplace->phone }}">
                                                </div>
                                                <div class="half_part">
                                                    <p>Email * <span class="input-group-addon beautiful" >
                                                        <input type="checkbox"  name="email_hide"  value="Enable" >
                                                        <span>Hide from user</span> </span></p>
                                                    <input class="no_input vendor_email"  type="text" name="email"  placeholder=""  value="{{ @$marketplace->email }}" />
                                                </div>
                                                <div class="clear"></div>
                                                <p>Address <span class="input-group-addon beautiful" >
                                                <input type="checkbox" name="vendor_hide_address"  value="Enable" >
                                                <span>Hide from user</span> </span> </p>
                                                <input class="no_input"  type="text" placeholder="Addressl line 1" name="address_1"  value="{{ @$marketplace->address_1 }}" />
                                                <input class="no_input"  type="text" placeholder="Addressl line 2" name="address_2"  value="{{ @$marketplace->address_2 }}" />
                                                <div class="one_third_part">
                                                    <input class="no_input"  type="text" placeholder="Country" name="country" value="{{ @$marketplace->country }}" />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="no_input"   type="text" placeholder="state"  name="state" value="{{ @$marketplace->state }}" />
                                                </div>
                                                <div class="one_third_part">
                                                    <input class="no_input"  type="text" placeholder="city"  name="city" value="{{ @$marketplace->city }}" />
                                                </div>
                                                <input class="no_input"  type="text" placeholder="Zipcode" style="width:50%;" name="zipcode" value="{{ @$marketplace->zipcode }}" />
                                                <!--div class="half_part">
                                                    <input class="no_input"  type="text" placeholder="External store URL" name="vendor_external_store_url" value="{{ @$marketplace->vendor_external_store_url }}" />
                                                </div>
                                                <div class="half_part">
                                                    <input class="no_input"  type="text" placeholder="External store URL Label" name="vendor_external_store_label" value="{{ @$marketplace->vendor_external_store_label }}" />
                                                </div-->                    
                                            </div>
                                            <input type="file" id="marketPlaceLogoUpload" name="marketPlaceLogoUpload" style="display:none" accept='image/*' />
                                            <h4>Media Files <span class="tooltip_gybi"><i class="fa fa-question-circle"></i>
                                                <span class="tooltip_gybitext tooltip_gybi-right">Add photos, videos, articles, etc. related to your products here.</span></span>
                                            </h4>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="wcmp_media_block wcmp_form1 ">
                                                        <i class="fas fa-plus-circle" style="color: red; font-size: 40px; cursor: pointer;" onclick="addNewFile();"></i>
                                                        <div class="uploadedMediasection">
                                                            <div class="original_mediaSelectBox" style="display: none;" >
                                                                <div class="select_box no_input" >
                                                                <select class="user-profile-fields" onChange="changeFeildType(this);">
                                                                    <option value="image">Photos</option>
                                                                    <option value="videos">Videos</option>
                                                                    <option value="articles">Articles</option>
                                                                </select>
                                                                </div>
                                                                <textarea class="videoEmbed" style="display: none;" placeholder="Please Enter Your Video Embed Code"></textarea>
                                                                <input type="text"  class="fileuploadTitle"   placeholder="Title" />
                                                                <input type="file"  class="fileuploadBox"  accept='image/*' />
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="numberOfFiles" name="numberOfFiles" value="0">
                                                        <div class="clear"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <style>
                                                    .mediaDisplayUL li{
                                                        margin-bottom: 10px;
                                                    }
                                                    .mediaImage{
                                                        width: 100px;
                                                        height: 100px;
                                                        padding: 4px;
                                                        border: 1px solid #dedede;
                                                    }
                                                </style>
                                                <div class="col-lg-6">
                                                    <ul class="mediaDisplayUL">
                                                    @foreach($marketplace->mediaFiles as $mediaFIle)
                                                        @if($mediaFIle->media_type == 'image')
                                                           <li><img class="mediaImage" src="{{ $mediaFIle->getMedia() }}" ><br>
                                                               <a href="{{ $mediaFIle->getMedia() }}" download target="_blank"><small>{{ $mediaFIle->media_title }}</small></a>
                                                               | <a href="{{ url('/marketplace/media/'. $mediaFIle->id .'/delete') }}" style="color: red" class="confirmDeleteFile" data-title="{{ $mediaFIle->media_title }}"><small>Delete</small></a>
                                                              </li>
                                                        @endif
                                                        @if($mediaFIle->media_type == 'videos')
                                                                <li>{{ $mediaFIle->getMedia() }}<br>
                                                                    <a href="{{ url('/marketplace/media/'. $mediaFIle->id .'/delete') }}" style="color: red" class="confirmDeleteFile" data-title="{{ $mediaFIle->media_title }}"><small>Delete</small></a></li>
                                                        @endif
                                                        @if($mediaFIle->media_type == 'articles')
                                                                <li><i class="fas fa-file" style="font-size: 95px"></i><br>
                                                                    <a href="{{ $mediaFIle->getMedia() }}" download target="_blank"><small>{{ $mediaFIle->media_title }}</small>
                                                                    </a>
                                                                    | <a href="{{ url('/marketplace/media/'. $mediaFIle->id .'/delete') }}" style="color: red" class="confirmDeleteFile" data-title="{{ $mediaFIle->media_title }}"><small>Delete</small></a>
                                                                </li>
                                                        @endif
                                                    @endforeach
                                                    </ul>
                                                    <br>
                                                </div>
                                            </div>
                                            <h4>Social Media</h4>
                                            <div class="wcmp_media_block">
                                                <p>Enter your Facebook, Twitter, etc. profile URL below:</p>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/facebook.png" alt="" class="social_icon" >
                                                  <input class="long no_input"  type="text"   name="fb_link" value="{{ @$marketplace->sociallinks->fb_link }}">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/twitter.png" alt="" class="social_icon">
                                                  <input class="long no_input"  type="text"   name="tw_link" value="{{ @$marketplace->sociallinks->tw_link }}">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/linkedin_33x35.png" alt="" class="social_icon">
                                                  <input class="long no_input"  type="text"  name="linked_link" value="{{ @$marketplace->sociallinks->linked_link }}">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/googleplus.png" alt="" class="social_icon">
                                                  <input class="long no_input"  type="text"   name="gp_link" value="{{ @$marketplace->sociallinks->gp_link }}">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/youtube.png" alt="" class="social_icon wcmp_to_disable">
                                                  <input class="long no_input"  type="text"   name="yt_link" value="{{ @$marketplace->sociallinks->yt_link }}">
                                                </div>
                                                <div class="full_part"><img src="{{url('/')}}/assets_new/img/instagram.png" alt="" class="social_icon wcmp_to_disable">
                                                  <input class="long no_input"  type="text"   name="insta_link" value="{{ @$marketplace->sociallinks->insta_link }}">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="action_div_space"> </div>
                                            <p class="error_wcmp">* This field is required, you must fill some information.</p>
                                            <div class="action_div">                
                                                <!--div class="green_massenger"><i class="fa fa-check"></i> All Options Saved</div-->
                                                <button class="wcmp_orange_btn" name="store_save">Save Options</button>
                                                <div class="clear"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>    
                            </div>
                            <style>
                            .input-group .form-control, .input-group-addon, .input-group-btn {
                                display: inline !important; float: none !important; background: none !important; border:none !important; font-size: small; }.wcmp_form1 p { font-size: 15px !important; }
                            </style>
                                                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->
    <script>
        let i=1;
        function addNewFile(){
            let newUpload = '';
            newUpload = jQuery('.original_mediaSelectBox').clone();
            console.log(newUpload);
            newUpload.removeClass('original_mediaSelectBox').css('display','block').attr('id', 'mktuploadmedia_'+i);
            newUpload.find('select').attr('name', 'mktuploadmediatype_'+i).attr('data-id', i);
            newUpload.find('input[type="file"]').attr('id', 'fileuploadBox_' + i).attr('name', 'fileuploadBox_' + i);
            newUpload.find('input[type="text"]').attr('id', 'fileuploadTitle_' + i).attr('name', 'fileuploadTitle_' + i);
            newUpload.find('textarea').attr('id', 'videoembed_' + i).attr('name', 'videoembed_' + i);
            jQuery('.uploadedMediasection').append(newUpload);
            i++;
            jQuery('#numberOfFiles').val(i);
        }

        function changeFeildType(uploadType) {
            let objUpload = jQuery(uploadType);
            let id = objUpload.data('id');
            switch (objUpload.val()) {
                case 'image':
                    jQuery('#mktuploadmedia_'+ id).find('.videoEmbed').hide();
                    jQuery('#mktuploadmedia_'+ id).find('.fileuploadBox').show();
                    jQuery('#mktuploadmedia_'+ id).find('.fileuploadTitle').show();
                    jQuery('#fileuploadBox_'+ id).attr('accept', 'image/*');
                    break;
                case 'articles':
                    jQuery('#mktuploadmedia_'+ id).find('.videoEmbed').hide();
                    jQuery('#mktuploadmedia_'+ id).find('.fileuploadBox').show();
                    jQuery('#mktuploadmedia_'+ id).find('.fileuploadTitle').show();
                    jQuery('#fileuploadBox_'+ id).attr('accept', 'application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,\n' +
                        'text/plain, application/pdf, ');
                    break;
                case 'videos':
                    jQuery('#mktuploadmedia_'+ id).find('.fileuploadBox').hide();
                    jQuery('#mktuploadmedia_'+ id).find('.videoEmbed').show();
                    jQuery('#mktuploadmedia_'+ id).find('.fileuploadTitle').hide();
                    break;
            }

        }

        function confirmDeleteFile(e) {
            alert('hi');
            e.preventDefault();
            let isConfirm = confirm("Are You Sure You Want To Delete " +  title + "?");
            if(isConfirm){
                window.location = jQuery(e).getAttribute('href');
            }
        }

        jQuery(document).ready(function () {
            jQuery('.confirmDeleteFile').click(function (e) {
                e.preventDefault();
                let title = jQuery(this).data('title');
                let isConfirm = confirm("Are You Sure You Want To Delete " + title + " ?");
                if(isConfirm){
                    window.location = jQuery(e).getAttribute('href');
                }
            })
        })
    </script>


@endsection
