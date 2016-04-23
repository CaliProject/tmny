@extends('layouts.admin-app')

@section('title','关于天美')

@section('content')
    <ol class="breadcrumb">
        <h4>关于天美 <small class="pull-right"><a href="{{ url('admin/addAbout') }}" class="btn btn-primary">添加板块</a></small></h4>
        <li><a href="{{ url('admin') }}">后台管理</a></li>
        <li><a href="{{ url('admin/about') }}">关于天美</a></li>
        <li class="active">xxxx</li>
    </ol>
    @foreach($abouts as $key => $about)
        @if($key)
        <div class="col-md-3 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $about->header }}</h4>
                </div>
                <div class="panel-body">
                    <p>{{ $about->content }}</p>
                    <hr>
                    <a href="{{ url('admin/editAbout/'.$key) }}" class="btn btn-primary pull-right">编辑</a>
                    <a href="{{ url('admin/deleteAbout/'.$key) }}" class="btn btn-danger pull-right">删除</a>
                </div>
            </div>
        </div>
        @endif
    @endforeach
@endsection