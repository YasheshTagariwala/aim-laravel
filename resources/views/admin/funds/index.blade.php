@extends('admin.layouts.master')

@section('css')
@endsection

@section('breadcrumb')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <h1 class="page-header-heading"><span class="typcn typcn-home page-header-heading-icon"></span> Investments </h1>
                <p class="page-header-description">This page provides an overview of revenue from your application, based on <a href="#">varying time periods</a>.</p>
            </div>
        </div>
    </div>
</header>
@endsection
@section('pagebody')
<di

<div class="row">
    <div class="col-lg-12">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th class="hidden-xs hidden-sm">#</th>
                    <th class="hidden-xs hidden-sm">Project Title</th>
                    <th class="hidden-xs hidden-sm">Amount</th>
                    <th class="hidden-xs hidden-sm">Pay Type</th>
                    <th class="hidden-xs hidden-sm">Invsetor Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mydetails as $mydetail)
                <tr>
                    <td class="hidden-xs hidden-sm">{{$mydetail->id}}</td>
                    <?php $pname = DB::table('projects')->where('created_by',$mydetail->project_from)->get(); ?>
                    <td class="hidden-xs hidden-sm">{{$pname[0]->title}}</td>
                    <td class="hidden-xs hidden-sm">${{$mydetail->amount}}</td>
                    <td class="hidden-xs hidden-sm">{{$mydetail->pay_type}}</td>
                    <?php $name = DB::table('userdetails')->where('id',$mydetail->created_by)->get(); ?>
                    <td class="hidden-xs hidden-sm">{{$name[0]->firstname}} {{$name[0]->lastname}}</td>
                     

                    <!-- <td class="text-right">
                        <a href="{{url('/admin')}}/blog/edit/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-pencil"></span>
                            <span class="hidden-xs hidden-sm">Edit</span>
                        </a>
                        <a href="{{url('/admin')}}/blog/delete/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-transparent-danger btn-xs">
                            <span class="fa fa-trash"></span> 
                            <span class="hidden-xs hidden-sm">Delete</span>
                        </a>
                        <a href="{{url('/admin')}}/blog/{{$mydetail->id}}" class="btn btn-faded btn-transparent btn-xs">
                            <span class="fa fa-eye"></span>
                            <span class="hidden-xs hidden-sm">Show</span>
                        </a>
                    </td> -->
                </tr>
                @endforeach

            </tbody>
        </table>
          {!! $mydetails->render() !!}    
              
    </div>

</div>     
@endsection