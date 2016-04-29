@extends('layouts.admin-app')

@section('title','编辑产品-时令产品')

@section('actions')
    <a href="{{ url('admin/portfolio/home') }}" class="btn btn-danger">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/portfolio/home') }}">时令产品</a></li>
    <li class="active">编辑产品</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">编辑内容</h4>
            </div>
            <div class="panel-body">
                <form action="{{ url('admin/portfolio/edit') }}" method="post" class="form-horizontal" role="form" id="main-form">
                    {{ csrf_field() }}
                    {{ method_field('patch') }}
                    <div class="form-group{{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-md-2 control-label">标题信息:</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $portfolio->title }}">
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
                            <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ $portfolio->caption }}</textarea>
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
    @include('admin.partials.site',['url' => 'admin/portfolio/'])
    @foreach($portfolio->products as $id => $product)
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">板块#{{ $id+1 }}</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ url('admin/portfolio/'.$id) }}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name" class="col-md-3 control-label">产品名称</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                                @if($errors->has('name'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('name') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('caption') ? 'has-error' : '' }}">
                            <label for="caption" class="col-md-3 control-label">产品介绍</label>
                            <div class="col-md-9">
                                <textarea name="caption" id="caption" class="form-control" cols="30" rows="10">{{ $product->caption }}</textarea>
                                @if($errors->has('caption'))
                                    <div class="help-block">
                                        <span>{{ $errors->first('caption') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">产品图片</label>
                            <div class="col-md-9">
                                <img src="{{ url($product->image) }}" alt="无法加载产品图片" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image" class="col-md-3 control-label">新图片</label>
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
                            <label class="col-md-3 control-label">指向链接</label>
                            <div class="col-md-9">
                                <input type="url" name="link" class="form-control" value="{{ $product->link }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">二维码</label>
                            <div class="col-md-9">
                                <img src="{{ url($product->qrcode) }}" alt="二维码" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">新二维码</label>
                            <div class="col-md-9">
                                <input type="file" name="qrcode" accept="image/jpeg,image/gif,image/png,image/jpg">
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">确认修改</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection