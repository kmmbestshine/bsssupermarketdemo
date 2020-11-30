@extends('backend.layouts.master')
@section('title')
    Invoice Profile
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Invoice Profile </h3>
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
                            <form method="POST" action="{{ route('Settings.invoice.update', $setting->id) }}">

										{{ csrf_field()}}

										<div class="form-group row">

											<div class="col-md-6">
												<div class="form-group row">
													<label for="serialPrefix" class="col-md-12 col-form-label">@lang('laryl-settings.form.invoice.label.serialPrefix')</label>
								
													<div class="col-md-12">
														<input id="serialPrefix" type="text" class="form-control t-cap" name="serialPrefix" value="{{ $setting->serialPrefix }}" autofocus>
													</div>

													@if ($errors->has('serialPrefix'))
														<span class="col-md-12 form-error-message">
															<small for="serialPrefix">{{ $errors->first('serialPrefix') }}</small>
														</span>
													@endif
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group row">
													<label for="serialNumberStart" class="col-md-12 col-form-label">@lang('laryl-settings.form.invoice.label.serialNumberStart')</label>
													
													<div class="col-md-12">
														<input id="serialNumberStart" type="text" class="form-control t-up" name="serialNumberStart" value="{{ $setting->serialNumberStart }}">
													</div>
				
													@if ($errors->has('serialNumberStart'))
														<span class="col-md-12 form-error-message">
															<small for="serialNumberStart">{{ $errors->first('serialNumberStart') }}</small>
														</span>
													@endif
												</div>
											</div>
										</div>

										<div class="form-group row">

											<div class="col-12 col-md-6">
												<label for="invoiceNotes" class="col-form-label">@lang('laryl-settings.form.invoice.label.invoiceNotes')</label>

												<textarea id="invoiceNotes" class="form-control autosize" name="invoiceNotes">{{ old('invoiceNotes', $setting->invoiceNotes) }}</textarea>

												@if ($errors->has('invoiceNotes'))
													<span class="col-md-12 form-error-message">
														<small for="invoiceNotes">{{ $errors->first('invoiceNotes') }}</small>
													</span>
												@endif
											</div>

											<div class="col-12 col-md-6">
												<label for="invoiceTerms" class="col-form-label">@lang('laryl-settings.form.invoice.label.invoiceTerms')</label>

												<textarea id="invoiceTerms" class="form-control autosize" name="invoiceTerms">{{ old('invoiceTerms', $setting->invoiceTerms) }}</textarea>

												@if ($errors->has('invoiceTerms'))
													<span class="col-md-12 form-error-message">
														<small for="invoiceTerms">{{ $errors->first('invoiceTerms') }}</small>
													</span>
												@endif
											</div>

										</div>

										<div class="form-group row mb-0">
											<div class="col-auto ml-auto">
												<button type="submit" class="btn btn-success  ml-auto">
													@lang('laryl-settings.buttons.save-settings')
												</button>
											</div>
										</div>
									</form>
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