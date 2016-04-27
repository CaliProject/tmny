@extends('layouts.admin-app')

@section('title','新鲜生活')

@section('actions')
    <a href="{{ url('admin/blog/add') }}" class="btn btn-primary">添加图文</a>
    <a href="{{ url('admin/blog/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">新鲜生活</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $blog->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $blog->caption }}
            </div>
        </div>
    </div>
    @foreach($blog->posts as $id => $post)
        <div class="col-md-6" style="clear: {{ $id % 2 === 0 ? 'left' : 'right' }}">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ $post->title }}</h4>
                </div>
                <div class="panel-body">
                    <div class="text-center">
                        <img src="{{ url($post->image) }}" alt="没有找到图片信息" class="img-thumbnail">
                    </div>
                    <hr>
                    {{ $post->body }}
                    <hr>
                    <form action="{{ url('admin/blog/'.$id) }}" method="post" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block">删除</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    @include('admin.partials.showsite')
@stop