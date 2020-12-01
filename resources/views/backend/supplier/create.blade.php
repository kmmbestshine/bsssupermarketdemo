@extends('backend.layouts.master')
@section('title')
    Create Supplier Page
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugins/select2.min.css')}}">
    <link  href="{{asset('backend/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create Supplier  </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 95px;">
                            <div class="input-group">
                                <a href="{{route('backend.supplier.list')}}" class="btn btn-success">View Supplier List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    {{ Session::get('success_message') }}<div id="msg"></div>
                </div>
            @endif
            @if(Session::has('error_message'))
                <div class="alert alert-danger">
                    {{ Session::get('error_message') }}
                </div>
            @endif
            <div class="resp"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create  Supplier </h2>
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
                        <div class="x_content">
                            <div class="card-header">
                                <h3 class="card-title">Create Supplier</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->
                            <form role="form" action="{{ route('backend.supplier.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Enter City">
                                            </div>
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select name="type" id="" class="form-control">
                                                    <option value="" disabled selected>Select a Type</option>
                                                    <option value="1">Distributor</option>
                                                    <option value="2">Whole Seller</option>
                                                    <option value="3">Brochure</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <input type="text" class="form-control" name="shop_name" value="{{ old('shop_name') }}" placeholder="Enter Shop Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Holder</label>
                                                <input type="text" class="form-control" name="account_holder" value="{{ old('account_holder') }}" placeholder="Enter Account Holder">
                                            </div>
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <input type="text" class="form-control" name="account_number" value="{{ old('account_number') }}" placeholder="Enter Account Number">
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" placeholder="Enter Bank Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Branch</label>
                                                <input type="text" class="form-control" name="bank_branch" value="{{ old('bank_branch') }}" placeholder="Enter Bank Branch">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-md-right">Create Supplier</button>
                                </div>
                            </form>
                            

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
@section('script')
    
@endsection