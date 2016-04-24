@extends('layouts.admin-app')

@section('title','编辑板块')

@section('breadcrumb')
    <li><a href="{{ url('admin/about') }}">关于天美</a></li>
    <li class="active">添加板块</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4>编辑标题</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/about/header') }}" class="form-horizontal" role="form" method="post">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group">
                        <label for="title" class="col-md-2 control-label">标题</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" id="title"
                                   value="{{ $header->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="caption" class="col-md-2 control-label">标题内容</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="caption" id="caption"
                                      rows="5">{{ $header->caption }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($abouts as $id => $about)
        <div class="col-md-6 padding-0">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>板块#{{ $id+1 }}</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/about/'.$id) }}" class="form-horizontal" method="post" role="form">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">板块标题</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ $about->title }}">
                                @if($errors->has('title'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('title') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('body') ? 'has-error' : '' }}">
                            <label for="body" class="col-md-3 control-label">板块内容</label>
                            <div class="col-md-9">
                                    <textarea name="body" id="body" class="form-control" cols="30"
                                              rows="10">{{ $about->body }}</textarea>
                                @if($errors->has('body'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('body') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection