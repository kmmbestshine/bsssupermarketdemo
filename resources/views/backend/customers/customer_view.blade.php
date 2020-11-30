@extends('backend.layouts.master')
@section('title')
    Create Customer
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Customer </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <div class="col-6 text-right">
                            <a href="{{ route('Customers.customers.create')  }}" class="bttn-plain">
                                <i class="fa fa-user-plus"></i>&emsp;@lang('Create New Customer')
                            </a>
                        </div>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">

                        <div class="container">

                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                        
                        <div class="row">
                            <label class="col-md-12 view-form-label">@lang('name')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->name}}</span>
                            </label>
                        </div>

                        <div class="row">
                            <label class="col-md-12 view-form-label">@lang('gstin')<span>&ensp;:&emsp;</span><span class="t-up">{{$contact->gstin}}</span>
                            </label>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('country')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->country}}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('state')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->state}}</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('person')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->person}}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('mobile')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->mobile}}</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('pan')<span>&ensp;:&emsp;</span><span class="t-up">{{$contact->pan}}</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('address')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->address}}</span>
                                    </label> 
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('pincode')<span>&ensp;:&emsp;</span><span class="t-up">{{$contact->pincode}}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('city')<span>&ensp;:&emsp;</span><span class="t-cap">{{$contact->city}}</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-md-12 view-form-label">@lang('email')<span>&ensp;:&emsp;</span><span class="t-low">{{$contact->email}}</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-auto ml-auto">
                                <a href="{{ route('Customers.customers.edit', $contact['id'])  }}" class="btn btn-md btn-warning" title="@lang('laryl.tooltips.edit')">
                                    @lang('edit')
                                </a>
                            </div>
                        </div>

                                    </div>
                                </div>
                        </div>

                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->




@endsection