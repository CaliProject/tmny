@extends('layouts.admin-app')

@section('title','添加板块-产业链条')

@section('actions')
    <a href="{{ url('admin/services/home') }}" class="btn btn-danger pull-right">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/services/home') }}">产业链条</a></li>
    <li class="active">添加板块-产业链条</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">添加板块-产业链条</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/services/add') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">板块标题</label>
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
                        <label for="body" class="col-md-2 control-label"></label>
                        <div class="col-md-9">
                            <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ old('body') }}</textarea>
                            @if($errors->has('body'))
                                <div class="help-block">
                                    <span>{{ $errors->first('body') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <a href="{{ url()->previous() }}" class="btn btn-danger">返回</a>
                            <button type="submit" class="btn btn-primary">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection