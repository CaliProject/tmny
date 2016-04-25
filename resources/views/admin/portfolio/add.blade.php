@extends('layouts.admin-app')

@section('title','添加产品-时令产品')

@section('actions')
    <a href="{{ url('admin/portfolio/home') }}" class="btn btn-danger">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/portfolio/home') }}">时令产品</a></li>
    <li class="active">添加产品</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">添加产品</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/portfolio/add') }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-2 control-label">产品名称:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @if($errors->has('name'))
                                <div class="help-block">
                                    <span>{{ $errors->first('name') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">产品简短介绍:</label>
                        <div class="col-md-9">
                            <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ old('caption') }}</textarea>
                            @if($errors->has('caption'))
                                <div class="help-block">
                                    <span>{{ $errors->first('caption') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
                        <label for="image" class="col-md-2 control-label">图片:</label>
                        <div class="col-md-9">
                            <input type="file" name="image" id="image" accept="image/jpeg,image/gif,image/png,image/jpg">
                            @if($errors->has('image'))
                                <div class="help-block">
                                    <span>{{ $errors->first('image') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2 col-md-offset-2">
                            <a href="{{ url('admin/portfolio/home') }}" class="btn btn-danger btn-block">返回</a>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary btn-block">确认添加</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection