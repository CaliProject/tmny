@extends('layouts.admin-app')

@section('title','添加板块')

@section('breadcrumb')
    <li><a href="{{ url('admin/about') }}">关于天美</a></li>
    <li class="active">添加板块</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4>添加关于天美的板块内容</h4>
            </div>
            <div class="panel-body">
                <div class="col-xs-12">
                    <form action="{{ url('admin/about/add') }}" class="form-horizontal" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
                            <label for="header" class="col-md-2 control-label">板块标题</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="header" name="header"
                                       value="{{ old('header') }}">
                                @if($errors->has('header'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('header') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-2 control-label">板块内容</label>
                            <div class="col-md-10">
                            <textarea name="content" id="content" class="form-control" cols="30"
                                      rows="10">{{ old('content') }}</textarea>
                                @if($errors->has('content'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('content') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <a href="{{ url()->previous() }}" class="btn btn-danger">返回</a>
                                <button type="submit" class="btn btn-primary">确认添加</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection