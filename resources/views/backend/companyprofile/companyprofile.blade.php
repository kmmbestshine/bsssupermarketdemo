@extends('backend.layouts.master')
@section('title')
    Company Profile
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Company Profile </h3>
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
                            <form method="POST" action="{{ route('Settings.profile.update', $setting->id) }}" enctype="multipart/form-data">

                                        
                                        {{ csrf_field()}}
                                
                                        <div class="form-group row">
                                            <label for="businessName" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.businessName')</label>
                                
                                            <div class="col-md-12">
                                                <input id="businessName" type="text" class="form-control t-cap" name="businessName" value="{{ $setting->businessName }}" autofocus>
                                            </div>

                                            @if ($errors->has('businessName'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="businessName">{{ $errors->first('businessName') }}</small>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6 col-md-6">
                                                <div class="row">
                                                    <label for="address" class="col-auto col-form-label">@lang('laryl-settings.form.profile.label.address')</label>
            
                                                    <div class="col-md-12">
                                                        <textarea id="address" rows=4 class="form-control autosize t-cap" name="address">{{old('address', $setting->address)}}</textarea>
                                                    </div>
                
                                                    @if ($errors->has('address'))
                                                        <span class="col-md-12 form-error-message">
                                                            <small for="address">{{ $errors->first('address') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                    
                                            <div class="col-sm-6 col-md-6">
                                                <div class="row">
                                                    <label for="placeOfOrigin" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.placeOfOrigin')</label>
                    
                                                    <div class="col-md-12">
                                                        <select id="placeOfOrigin" name="placeOfOrigin" class="form-control bfh-states" data-country="India" data-state="{{ old('placeOfOrigin', $setting->placeOfOrigin) }}"></select>
                                                    </div>
                
                                                    @if ($errors->has('placeOfOrigin'))
                                                        <span class="col-md-12 form-error-message">
                                                            <small for="placeOfOrigin">{{ $errors->first('placeOfOrigin') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="gstin" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.gstin')</label>
                            
                                                    <div class="col-md-12">
                                                        <input id="gstin" type="text" class="form-control t-up" name="gstin" value="{{ $setting->gstin }}">
                                                    </div>
        
                                                    @if ($errors->has('gstin'))
                                                        <span class="col-md-12 form-error-message">
                                                            <small for="gstin">{{ $errors->first('gstin') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="panNumber" class="col-md-12 col-form-label">@lang('laryl-settings.form.profile.label.panNumber')</label>
                                                    
                                                    <div class="col-md-12">
                                                        <input id="panNumber" type="text" class="form-control t-up" name="panNumber" value="{{ $setting->panNumber }}">
                                                    </div>
                
                                                    @if ($errors->has('panNumber'))
                                                        <span class="col-md-12 form-error-message">
                                                            <small for="panNumber">{{ $errors->first('panNumber') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            
                                            <div class="col-12 col-md-6">
                                                <label for="bankName" class="col-form-label">@lang('laryl-settings.form.profile.label.bankName')</label>

                                                <input type="text" id="bankName" class="form-control" name="bankName" value="{{$setting->bankName}}">

                                                @if ($errors->has('bankName'))
                                                    <span class="col-md-12 form-error-message">
                                                        <small for="bankName">{{ $errors->first('bankName') }}</small>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label for="bankBranch" class="col-form-label">@lang('laryl-settings.form.profile.label.bankBranch')</label>

                                                <input type="text" id="bankBranch" class="form-control" name="bankBranch" value="{{$setting->bankBranch}}">

                                                @if ($errors->has('bankBranch'))
                                                    <span class="col-md-12 form-error-message">
                                                        <small for="bankBranch">{{ $errors->first('bankBranch') }}</small>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-12 col-md-6">
                                                <label for="bankAccount" class="col-form-label">@lang('laryl-settings.form.profile.label.bankAccount')</label>

                                                <input type="text" id="bankAccount" class="form-control" name="bankAccount" value="{{$setting->bankAccount}}">

                                                @if ($errors->has('bankAccount'))
                                                    <span class="col-md-12 form-error-message">
                                                        <small for="bankAccount">{{ $errors->first('bankAccount') }}</small>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="col-12 col-md-6">
                                                <label for="bankIfsc" class="col-form-label">@lang('laryl-settings.form.profile.label.bankIfsc')</label>

                                                <input type="text" id="bankIfsc" class="form-control" name="bankIfsc" value="{{$setting->bankIfsc}}">

                                                @if ($errors->has('bankIfsc'))
                                                    <span class="col-md-12 form-error-message">
                                                        <small for="bankIfsc">{{ $errors->first('bankIfsc') }}</small>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12 col-md-6">
                                                <label for="profileLogo" class="col-form-label">@lang('laryl-settings.form.profile.label.profileLogo')</label>

                                                <input type="file" name="profileLogo" class="form-control" />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="profileLogo" class="col-form-label">@lang('laryl-settings.form.profile.label.currentLogo')</label>
                                                @if($setting->logoPath != null)
                                                    <img src="{{asset("storage/swiftbilling/$setting->logoPath")}}" height="100px" />
                                                @else
                                                    {{-- <img src="{{asset("storage/swiftbilling/defaultLogo.png")}}" max-height="100px" /> --}}
                                                    <span>No Active Logo.</span>
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