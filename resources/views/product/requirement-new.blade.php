@extends('layouts.master')
@section('title', 'New Requirement')
@section('pagebody')

 <!-- section for images -->

  <section class="custom_requi">
            <div class="container">
                <div class="center-block slider_content">
                    <h1>New Requirement</h1>
                </div><!-- container -->
            </div>
        </section>
        <section class="shop_cart_summary"> 
            <div class="container">
                <div id="profileVerticalTab" class="form-profile">            
                    <div class="resp-tabs-container hor_1 clearfix"> 
                        <h2 class="form-title">New Reqirment</h2>
                        <div class=" panel-group" >
                            <div class=" acf-form-fields " >
                                <form id="post" class="" action="" method="post">
                                    <div class="form-group">
                                        <label >Product Name <span class="acf-required">*</span></label>                                
                                        <input name="your-name" value="" size="40" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label >Category <span class="acf-required">*</span></label>                                
                                        <select class="form-control"><option>Select</option></select>
                                    </div>
                                    <div class="form-group">
                                        <label >Minimum Price <span class="acf-required">*</span></label>                               
                                        <input name="your-name" value="" size="40" class="form-control" type="number">
                                    </div>                                  
                                    <div class="form-group">
                                        <label >Maximum Price <span class="acf-required">*</span></label>                               
                                        <input name="your-name" value="" size="40" class="form-control" type="number">
                                    </div>
                                    <div class="form-group">
                                        <label >Product Thumbnail <span class="acf-required">*</span></label>                               
                                        <input name="your-name" value="" size="40" class="form-control" type="file">
                                    </div>  
                                    <div class="form-group">
                                        <label >Product Image <span class="acf-required">*</span></label>                               
                                        <input name="your-name" value="" size="40" class="form-control" type="file">
                                    </div>
                                    <div class="form-group">
                                        <label >Requirement  <span class="acf-required">*</span></label>                                
                                        <textarea name="your-message" cols="40" rows="10" class="form-control"></textarea>
                                    </div>  
                                    <div class="acf-form-submit">
                                    <input value="Save" class="button button-primary button-large" type="submit">
                                    </div>  
                                </form>                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- section for images -->

@endsection