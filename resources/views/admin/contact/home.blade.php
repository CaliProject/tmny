@extends('layouts.admin-app')

@section('title','联系天美')

@section('breadcrumb')
    <li class="active">联系天美</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑标题-联系天美</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/contact/header') }}" class="form-horizontal" method="post" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $header->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">标题信息:</label>
                        <div class="col-md-9">
                            <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ $header->caption }}</textarea>
                            @if($errors->has('caption'))
                                <div class="help-block">
                                    <span>{{ $errors->first('caption') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-success btn-block">确认修改</button>
                    </div>
                </form>
            </div>
        </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">详细信息</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/contact/edit') }}" method="post" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group{{ $errors->has('tel') ? 'has-error' : '' }}">
                            <label for="tel" class="col-md-2 control-label">电话:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="tel" name="tel" value="{{ $details->tel }}">
                                @if($errors->has('tel'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('tel') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('url') ? 'has-error' : '' }}">
                            <label for="url" class="col-md-2 control-label">网址:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="url" name="url" value="{{ $details->url }}">
                                @if($errors->has('url'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('url') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address" class="col-md-2 control-label">地址:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="address" name="address" value="{{ $details->address }}">
                                @if($errors->has('address'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('address') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('company') ? 'has-error' : '' }}">
                            <label for="company" class="col-md-2 control-label">公司:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="company" name="company" value="{{ $details->company }}">
                                @if($errors->has('company'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('company') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('slogan') ? 'has-error' : '' }}">
                            <label for="slogan" class="col-md-2 control-label">口号:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="slogan" name="slogan" value="{{ $details->slogan }}">
                                @if($errors->has('slogan'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('slogan') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-success btn-block">确认修改</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
@endsection