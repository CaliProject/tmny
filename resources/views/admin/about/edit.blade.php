@extends('layouts.admin-app')

@section('title','编辑')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>编辑</h3>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/editAbout/'.$id) }}" class="form-horizontal" method="post" role="form">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('header') ? 'has-error' : '' }}">
                        <label for="header" class="col-md-3 control-label">板块标题</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="header" name="header" value="{{ $abouts->header }}">
                            @if($errors->has('header'))
                                <div class="help-block">
                                    <span>{{ $errors->first('header') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? 'has-error' : '' }}">
                        <label for="content" class="col-md-3 control-label">板块内容</label>
                        <div class="col-md-6">
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $abouts->content }}</textarea>
                            @if($errors->has('content'))
                                <div class="help-block">
                                    <span>{{ $errors->first('content') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="{{ url('admin/about') }}" class="btn btn-danger">返回</a>
                            <button type="submit" class="btn btn-primary">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection