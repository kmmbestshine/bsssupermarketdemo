@extends('backend.layouts.master')
@section('title')
    Customers List
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Customers List </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group top_search" style="padding-left: 130px;">
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
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
                        <div class="x_content">
                            <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> @lang('serial') </th>
                                        <th> @lang('name') </th>
                                        <th> @lang('pan') </th>
                                        <th> @lang('mobile') </th>
                                        <th> @lang('state') </th>
                                        <th> @lang('gstin') </th>
                                        <th> @lang('options') </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $contact_array = $customers->toArray();
                                        $i = $contact_array['from'];
                                    @endphp

                                    @if(count($customers) > 0)

                                        @foreach($customers as $contact)
                                            <tr>
                                                <th class="scope-row">{{$i}}</th>
                                                <td class="t-cap">{{$contact['name']}}</td>
                                                <td class="t-up">{{$contact['pan']}}</td>
                                                <td class="t-up">{{$contact['mobile']}}</td>
                                                <td class="t-cap">{{$contact['state']}}</td>
                                                <td class="t-up">{{$contact['gstin']}}</td>
                                                <td>

                                                        <a class="btn btn-sm btn-success mb-2 mb-sm-0" href="{{ route('Customers.customers.show', $contact['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.show')">
                                                            @lang('show')
                                                        </a>

                                                        <a class="btn btn-sm btn-warning mb-2 mb-sm-0" href="{{ route('Customers.customers.edit', $contact['id'])  }}" data-toggle="tooltip" title="@lang('laryl.tooltips.edit')">
                                                            @lang('edit')
                                                        </a>

                                                </td>
                                            </tr>

                                            @php $i++; @endphp
                                            
                                        @endforeach
                                        
                                    @else 
                                        
                                        <tr class="text-center">
                                            <td colspan="7">@lang('laryl.messages.no-records')</td>
                                        </tr>

                                    @endif
                                </tbody>
                            </table>
                            
                        {{-- table responsive --}}
                        </div> 

                        <div class="row">
                            <div class="col d-none d-sm-block">
                                {{ $customers->render() }}
                            </div>

                            <div class="col d-sm-none">
                                {{ $customers->links('pagination::simple-bootstrap-4') }}
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

@if ($errors->any())
 <script>
    @foreach ($errors->getMessages() as $key => $message)
        $("#{{$key}}.form-control").addClass("form-error-field");
    @endforeach
 </script>
@endif

<script>

    $(function() {
        
        autosize($('textarea.autosize'));

    });


</script>

@endsection