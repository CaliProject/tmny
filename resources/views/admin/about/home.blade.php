@extends('layouts.admin-app')

@section('title','关于天美')

@section('actions')
    <a href="{{ url('admin/about/add') }}" class="btn btn-primary">添加板块</a>
    <a href="{{ url('admin/about/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">关于天美</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4>{{ $header->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $header->caption }}
            </div>
        </div>
    </div>
    @foreach($abouts as $key => $about)
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4>{{ $about->title }}</h4>
                    </div>
                    <div class="panel-body">
                        <p>{{ $about->body }}</p>
                        <a href="{{ url('admin/about/' . $key) }}" class="btn btn-danger pull-right">删除</a>
                    </div>
                </div>
            </div>
    @endforeach
@endsection