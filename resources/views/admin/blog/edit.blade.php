@extends('layouts.admin-app')

@section('title','编辑图文-新鲜生活')

@section('actions')
    <a href="{{ url('admin/blog/home') }}" class="btn btn-danger">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/blog/home') }}">新鲜生活</a></li>
    <li class="active">编辑图文</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑标题信息</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/blog/header') }}" method="post" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题信息:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                            @if($errors->has('title'))
                                <div class="help-block">
                                    <span>{{ $errors->first('title') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                        <label for="caption" class="col-md-2 control-label">标题介绍:</label>
                        <div class="col-md-9">
                            <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ $blog->caption }}</textarea>
                            @if($errors->has('caption'))
                                <div class="help-block">
                                    <span>{{ $errors->first('caption') }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-2">
                            <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach($blog->posts as $id => $post)
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">图文#{{ $id+1 }}</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/blog/'.$id) }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="col-md-3 control-label">标题</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                                @if($errors->has('title'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('title') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('body') ? 'has-error' : '' }}">
                            <label for="body" class="col-md-3 control-label">详情文字</label>
                            <div class="col-md-9">
                                <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{ $post->body }}</textarea>
                                @if($errors->has('title'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('title') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">图片</label>
                            <div class="col-md-9">
                                <img src="{{ url($post->image) }}" alt="无法加载产品图片" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image" class="col-md-3 control-label">新图片</label>
                            <div class="col-md-9">
                                <input type="file" name="image" id="image" class="img-thumbnail" accept="image/jpeg,image/gif,image/png,image/jpg">
                                @if($errors->has('image'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('image') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="old_image" value="{{ $post->image }}">
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @include('admin.partials.site',['url' => 'admin/blog/'])
@endsection