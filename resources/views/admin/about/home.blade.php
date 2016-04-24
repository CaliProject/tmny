@extends('layouts.admin-app')

@section('title','关于天美')

@section('content')
    <div class="col-md-10">
        <ol class="breadcrumb">
            <h4>关于天美
                <small class="pull-right">
                    <a href="{{ url('admin/about/add') }}" class="btn btn-primary">添加板块</a>
                    <a href="{{ url('admin/about/edit') }}" class="btn btn-primary">编辑</a>
                </small>
            </h4>
            <li><a href="{{ url('admin') }}">后台管理</a></li>
            <li><a href="{{ url('admin/about') }}">关于天美</a></li>
            <li class="active">xxxx</li>
        </ol>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ $header->title }}</h2>
                </div>
                <div class="panel-body">
                    {{ $header->caption }}
                </div>
            </div>
        </div>
        @foreach($abouts as $key => $about)
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>{{ $about->title }}</h4>
                        </div>
                        <div class="panel-body">
                            <p>{{ $about->body }}</p>
                            <hr>
                            <form action="{{ url('admin/about/'.$key) }}" class="form-horizontal" role="form" method="post">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger pull-right">删除</button>
                            </form>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>
@endsection