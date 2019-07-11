@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Investor profile </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
            <div class="col-xs-12 col-md-3">
                <a href="{{url('/admin')}}/investor_profile/create" type="button" class="btn btn-transparent btn-xl btn-faded pull-right visible-lg visible-md"><span class="fa fa-paint-brush"></span> Create New</a>
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
                <form action="{{url('/admin')}}/investor_profile/store" method="post" enctype="multipart/form-data" >
                    {{csrf_field()}} 


                    @if(Session::has('message'))
                         <div class="alert alert-info">
                         {{ Session::get('message') }}
                         </div>
                    @endif

                        <label for="expertise">Expertise *</label>
                        <textarea name="expertise" id="expertise" class="form-control" placeholder="Type your expertise"></textarea>
                        
                        <label for="capital_investment">Investment Capital *</label>
                        <input type="text" name="capital_investment" id="capital_investment" class="form-control" placeholder="Type your capital investment">
                        
                        <label for="category">Interested Industries *</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <p class="help-block">Select your category .</p>


                        <label for="country_interest">Country of Interest *</label>
                        <input type="text" name="country_interest" id="country_interest" class="form-control" placeholder="Type your country Interest" required>
                        
                        <label for="roi">ROI *</label>
                        <input type="text" name="roi" id="roi" class="form-control" placeholder="Type your roi" required>
                        
                        <label for="womenstage">Women stage *</label>
                        <select name="womenstage" class="form-control">
                            @foreach($women_stages as $women_stage)
                            <option value="{{$women_stage->id}}">{{$women_stage->name}}</option>@endforeach

                        </select>
                        <p class="help-block">Select your women stage .</p>

                        <label for="expectation">How do you want to be involved? *</label>
                        <textarea name="expectation" id="expectation" class="form-control" placeholder="Type your expectation">   
                        </textarea>
                        
                        <button type="submit" class="btn btn-transparent">Save</button>
                    </form>



                </div>
            </div>
        </div>   
</div> 
@endsection