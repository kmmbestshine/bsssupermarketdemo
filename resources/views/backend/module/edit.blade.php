@extends('backend.layouts.master')
@section('title')
    Module Edit Page
@endsection
@section('css')

@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Module Management </h3>
                </div>
                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <a href="{{route('module.list')}}" class="btn btn-success">View Module</a>
                            </div>
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
                            <h2>Edit Module</h2>
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
                            <form action="{{route('module.update', $module->id)}}" method="post">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="name">Module Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$module->name}}">
                                    <span class="error"><b>
                                         @if($errors->has('name'))
                                                {{$errors->first('name')}}
                                            @endif</b>
                                        </span>
                                </div>
                                <div class="form-group">
                                    <label for="module_key">Module Key</label>
                                    <input type="text" class="form-control" id="module_key" name="module_key" value="{{$module->module_key}}">
                                    <span class="error"><b>
                                         @if($errors->has('module_key'))
                                                {{$errors->first('module_key')}}
                                            @endif</b>
                                         </span>
                                </div>
                                <div class="form-group">
                                    <label for="module_url">Module Url</label>
                                    <input type="text" class="form-control" id="module_url" name="module_url" value="{{$module->module_url}}">
                                    <span class="error"><b>
                                         @if($errors->has('module_url'))
                                                {{$errors->first('module_url')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="module_rank">Module Rank</label>
                                    <input type="text" class="form-control" id="module_rank" name="module_rank" value="{{$module->module_rank}}">
                                    <span class="error"><b>
                                         @if($errors->has('module_rank'))
                                                {{$errors->first('module_rank')}}
                                            @endif</b></span>
                                </div>
                                <div class="form-group">
                                    <label for="module_icon">Module Icon</label>
                                    <input type="text" class="form-control" id="module_icon" name="module_icon" value="{{$module->module_icon}}">
                                </div>
                              {{--  <div class="form-group">
                                    <label>Disply in Sidebar</label>
                                    <input type="radio" name="view_sidebar" value="1" id="view_sidebar" checked="">
                                    <label for="view_sidebar"> Yes </label>
                                    <input type="radio" name="view_sidebar" id="deactive" value="0">
                                    <label for="deactive">No</label>
                                </div> --}}
                                 <div class="form-group">
                                    <label>Display For &nbsp;</label>
                                    <input type="checkbox" name="roles[]" value="{{$role[0]->id}}" {{ (in_array($role[0]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[0]->name}}">{{$role[0]->name}}</label>
                                    <input type="checkbox" name="roles[]" value="{{$role[1]->id}}" {{ (in_array($role[1]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[1]->name}}">{{$role[1]->name}}</label>
                                    <input type="checkbox" name="roles[]" value="{{$role[2]->id}}" {{ (in_array($role[2]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[2]->name}}">{{$role[2]->name}}</label>

                                    <input type="checkbox" name="roles[]" value="{{$role[3]->id}}" {{ (in_array($role[3]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[3]->name}}">{{$role[3]->name}}</label>
                                    <input type="checkbox" name="roles[]" value="{{$role[4]->id}}" {{ (in_array($role[4]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[4]->name}}">{{$role[4]->name}}</label>
                                    <input type="checkbox" name="roles[]" value="{{$role[5]->id}}" {{ (in_array($role[5]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[5]->name}}">{{$role[5]->name}}</label>
                                    <input type="checkbox" name="roles[]" value="{{$role[6]->id}}" {{ (in_array($role[6]->id, $matched_roleid)) ? 'checked="checked" ' : '' }}>
                                    <label for="{{$role[6]->name}}">{{$role[6]->name}}</label>
                                </div>
                                
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="btnCreate" class="btn btn-primary">Update Module</button>
                                </div>
                            </form>
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