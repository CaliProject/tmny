@extends('layouts.admin-app')

@section('title','添加图文-新鲜生活')

@section('actions')
    <a href="{{ url('admin/blog/home') }}" class="btn btn-danger">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/blog/home') }}">新鲜生活</a></li>
    <li class="active">添加图文</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">添加图文</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/blog/add') }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('body') ? 'has-error' : '' }}">
                        <label for="body" class="col-md-2 control-label">文字描述:</label>
                        <div class="col-md-9">
                            <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>
                            @if($errors->has('body'))
                                <div class="help-block">
                                    <span>{{ $errors->first('body') }}</span>
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
                            <a href="{{ url('admin/blog/home') }}" class="btn btn-danger btn-block">返回</a>
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