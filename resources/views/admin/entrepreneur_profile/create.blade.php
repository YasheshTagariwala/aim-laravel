@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Entrepreneur profile </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/entrepreneur_profile/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
            </div>
        </div>
    </div>

    

</header>
@endsection
@section('pagebody')

<div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <header class="widget-header">
                    Vertical Form
                </header>
                <div class="widget-body">
                <form action="{{url('/admin')}}/entrepreneur_profile/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="name">Women Name *</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Type your name" required>
                        
                        <label for="city">City *</label>
                        <input type="text" name="city" id="city" class="form-control" placeholder="Type your city" required>
                        
                        <label for="state">State *</label>
                        <input type="text" name="state" id="state" class="form-control" placeholder="Type your state" required>
                        
                        <label for="country">Country *</label>
                        <input type="text" name="country" id="country" class="form-control" placeholder="Type your country" required>
                        
                        <label for="zipcode">Postal Code *</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Type your Postal Code" required>
                        
                        <label for="gender">Gender *</label><br>
                        <input type="radio" name="gender" value="male"> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Others
                        <p class="help-block">Select your gender.</p>

                        <label for="womenstage">Women stage *</label>
                        <select name="womenstage" class="form-control">
                            @foreach($women_stages as $women_stage)
                            <option value="{{$women_stage->id}}">{{$women_stage->name}}</option>@endforeach

                        </select>
                        <p class="help-block">Select your women stage .</p>

                        <label for="logo">Logo *</label>
                        <input type="file" name="org_logo" id="org_logo" class="form-control">
                        <p class="help-block">Upload your logo.</p>

                        <label for="website">Website *</label>
                        <input type="text" name="website" id="website" class="form-control" placeholder="Type your Website URL">
                        
                        <label for="fburl">Facebook URL *</label>
                        <input type="text" name="fburl" id="fburl" class="form-control" placeholder="Type your Facebook URL">
                        
                        <label for="twurl">Twitter URL *</label>
                        <input type="text" name="twurl" id="twurl" class="form-control" placeholder="Type your Twitter URL">
                       
                        <label for="linkedurl">Linkedin URL *</label>
                        <input type="text" name="linkedurl" id="linkedurl" class="form-control" placeholder="Type your Linkedin URL">
                        
                        <label for="blogurl">Blog URL *</label>
                        <input type="text" name="blogurl" id="blogurl" class="form-control" placeholder="Type your Blog URL">
                        
                        <label for="gpurl">Google+ URL *</label>
                        <input type="text" name="gpurl" id="gpurl" class="form-control" placeholder="Type your gp URL">
                        
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection