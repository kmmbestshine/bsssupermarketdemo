@extends('backend.layouts.master')
@section('title')
    Show Supplier
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Show Supplier </h3>
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
                            <a href="{{ route('backend.supplier.list')  }}" class="bttn-plain">
                                &emsp;@lang('View Supplier List')
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
                         <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Show Supplier</h3>
                            </div>
                            <!-- /.card-header -->

                            <!-- form start -->


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <p>{{ $supplier->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <p>{{ $supplier->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <p>{{ $supplier->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <p>{{ $supplier->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>City</label>
                                                <p>{{ $supplier->city }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Shop Name</label>
                                                <p>{{ $supplier->shop_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <p>
                                                    @if($supplier->type == 1)
                                                        {{ 'Distributor' }}
                                                    @elseif($supplier->type == 2)
                                                        {{ 'Whole Seller' }}
                                                    @elseif($supplier->type == 3)
                                                        {{ 'Brochure' }}
                                                    @else
                                                        {{ 'None' }}
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile">Photo</label>
                                                <p>
                                                    <img width="50" height="50" src="{{ url('supplier').'/'. $supplier->photo }}" alt="{{ $supplier->name }}">
                                                </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Holder</label>
                                                <p>{{ $supplier->account_holder }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Account Number</label>
                                                <p>{{ $supplier->account_number }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Name</label>
                                                <p>{{ $supplier->bank_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Branch</label>
                                                <p>{{ $supplier->bank_branch }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /page content -->




@endsection