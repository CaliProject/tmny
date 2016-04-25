@extends('layouts.admin-app')

@section('title','编辑产业链条')

@section('actions')
    <a href="{{ url('admin/services/home') }}" class="btn btn-danger pull-right">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/services/home') }}">产业链条</a></li>
    <li class="active">编辑-产业链条</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑头部</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/services/header') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">头部标题</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title"
                                   value="{{ $header->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">头部内容</label>
                        <div class="col-md-9">
                            <textarea name="caption" id="caption" class="form-control" cols="30"
                                      rows="10">{{ $header->caption }}</textarea>
                            @if($errors->has('caption'))
                                <div class="help-block">
                                    <span>{{ $errors->first('caption') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                </form>
            </div>
        </div>
    </div>
    @foreach($provides as $id => $provide)
        @include('admin.services.partials.form', [
            'title' => "板块#" . ($id + 1),
            'method' => 'PATCH',
            'url' => url('admin/services/' . $id),
            'button' => '确定修改',
            'provide' => $provide
        ])
    @endforeach
@stop
