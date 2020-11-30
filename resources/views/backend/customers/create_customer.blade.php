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
                        <div class="x_content">
                           <form method="POST" action="{{ route('Customers.customers.store') }}">
                                {{ csrf_field()}}
                        
                                <div class="form-group row">
                                    <label for="name" class="col-md-12 col-form-label">@lang('name')</label>
                        
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control t-cap" name="name" value="{{ old('name') }}" autofocus>
                                    </div>

                                    @if ($errors->has('name'))
                                        <span class="col-md-12 form-error-message">
                                            <small for="name">{{ $errors->first('name') }}</small>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="gstin" class="col-md-12 col-form-label">@lang('gstin')</label>
                        
                                    <div class="col-md-12">
                                        <input id="gstin" type="text" class="form-control t-up" name="gstin" value="{{ old('gstin') }}" maxlength="15" >
                                    </div>

                                    @if ($errors->has('gstin'))
                                        <span class="col-md-12 form-error-message">
                                            <small for="gstin">{{ $errors->first('gstin') }}</small>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="country" class="col-md-12 col-form-label">@lang('country')</label>
                                
                                            <div class="col-md-12">
                                                 <select name="country" id="countryId" onchange="window.CountryChange()">
                                                  <option value="0">Select Country</option>
                                                  <option value='india'>INDIA</option>
                                                  
                                                </select>
                                                 </div>

                                           
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div id="stateField" style="display:none">
                                              <label id="stateLabel">State:</label>
                                              <select name="state" id="stateId">
                                              </select>
                                            </div>
        
                                            
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="person" class="col-md-12 col-form-label">@lang('person')</label>
                                            
                                            <div class="col-md-12">
                                                <input id="person" type="text" class="form-control t-cap" name="person" value="{{ old('person') }}">
                                            </div>
        
                                            @if ($errors->has('person'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="person">{{ $errors->first('person') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="mobile" class="col-md-12 col-form-label">@lang('mobile')</label>
                                            
                                            <div class="col-md-12">
                                                <input id="mobile" type="text" class="form-control bfh-phone" name="mobile" data-country="country" value="{{ old('mobile') }}">
                                            </div>
        
                                            @if ($errors->has('mobile'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="mobile">{{ $errors->first('mobile') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="pan" class="col-md-12 col-form-label">@lang('pan')</label>
                                            
                                            <div class="col-md-12">
                                                <input id="pan" type="text" class="form-control t-up" name="pan" value="{{ old('pan') }}">
                                            </div>

                                            @if ($errors->has('pan'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="pan">{{ $errors->first('pan') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="address" class="col-md-12 col-form-label">@lang('address')</label>
                                            
                                            <div class="col-md-12">
                                                <textarea id="address" type="text" class="form-control autosize" name="address" value="{{ old('address') }}"> </textarea>
                                            </div>

                                            @if ($errors->has('address'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="address">{{ $errors->first('address') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="pincode" class="col-md-12 col-form-label">@lang('pincode')</label>
                                            
                                            <div class="col-md-12">
                                                <input id="pincode" type="text" class="form-control digit-6" name="pincode" value="{{ old('pincode') }}">
                                            </div>

                                            @if ($errors->has('pincode'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="pincode">{{ $errors->first('pincode') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="city" class="col-md-12 col-form-label">@lang('city')</label>
                                            
                                            <div class="col-md-12">
                                                <input id="city" type="text" class="form-control t-cap" name="city" value="{{ old('city') }}">
                                            </div>

                                            @if ($errors->has('city'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="city">{{ $errors->first('city') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                        
                                        <div class="form-group row">
                                            <label for="email" class="col-md-12 col-form-label">@lang('email')</label>
                                
                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control t-low" name="email" value="{{ old('email') }}">
                                            </div>

                                            @if ($errors->has('email'))
                                                <span class="col-md-12 form-error-message">
                                                    <small for="email">{{ $errors->first('email') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-auto ml-auto">
                                        <button type="submit" class="btn btn-success  ml-auto">
                                            @lang('laryl-contacts.buttons.save-contact')
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
<script type="text/javascript">
window.CountryChange = function () {
      var countryState = [
        [
          'india', [
            ['', 'State'],
            ['Andaman and Nicobar Islands', 'Andaman and Nicobar Islands'],
            ['Andhra Pradesh', 'Andhra Pradesh'],
            ['Arunachal Pradesh', 'Arunachal Pradesh'],
            ['Assam', 'Assam'],
            ['Bihar', 'Bihar'],
            ['Chandigarh', 'Chandigarh'],
            ['Chhattisgarh', 'Chhattisgarh'],
            ['Dadra and Nagar Haveli', 'Dadra and Nagar Haveli'],
            ['Daman and Diu', 'Daman and Diu'],
            ['Delhi', 'Delhi'],
            ['Goa', 'Goa'],
            ['Gujarat', 'Gujarat'],
            ['Haryana', 'Haryana'],
            ['Himachal Pradesh', 'Himachal Pradesh'],
            ['Jammu and Kashmir', 'Jammu and Kashmir'],
            ['Jharkhand', 'Jharkhand'],
            ['Karnataka', 'Karnataka'],
            ['Kerala', 'Kerala'],
            ['Lakshadweep', 'Lakshadweep'],
            ['Madhya Pradesh', 'Madhya Pradesh'],
            ['Maharashtra', 'Maharashtra'],
            ['Manipur', 'Manipur'],
            ['Meghalaya', 'Meghalaya'],
            ['Mizoram', 'Mizoram'],
            ['Nagaland', 'Nagaland'],
            ['Odisha', 'Odisha'],
            ['Puducherry', 'Puducherry'],
            ['Punjab', 'Punjab'],
            ['Rajasthan', 'Rajasthan'],
            ['Sikkim', 'Sikkim'],
            ['Tamil Nadu', 'Tamil Nadu'],
            ['Telangana', 'Telangana'],
            ['Tripura', 'Tripura'],
            ['Uttar Pradesh', 'Uttar Pradesh'],
            ['Uttarakhand', 'Uttarakhand'],
            ['West Bengal', 'West Bengal'],
          ],
        ],
       
      ];

      var countryElement = document.getElementById('countryId');
      var stateElement = document.getElementById('stateId');
      var stateLabelElement = document.getElementById('stateLabel');
      var stateFieldElement = document.getElementById('stateField');

      if (countryElement && stateElement) {
        var listOfState = [
          ['XX', 'None']
        ];

        var currentCountry = countryElement.options[countryElement.selectedIndex].value;
        for (var i = 0; i < countryState.length; i++) {
          if (currentCountry == countryState[i][0]) {
            listOfState = countryState[i][1];
          }
        }

        if (listOfState.length < 2) {
          stateFieldElement.style.display = "none";
        } else {
          stateFieldElement.style.display = "inline-block";
        }
        var selectedState;
        for (var i = 0; i < stateElement.length; i++) {
          if (stateElement.options[i].selected === true) {
            selectedState = stateElement.options[i].value;
          }
        }
        stateElement.options.length = 0;
        for (var i = 0; i < listOfState.length; i++) {
          stateElement.options[i] = new Option(listOfState[i][1], listOfState[i][0]);
          if (listOfState[i][0] == selectedState) {
            stateElement.options[i].selected = true;
          }
        }
      }
    }
</script>


@endsection