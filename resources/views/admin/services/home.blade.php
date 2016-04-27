@extends('layouts.admin-app')

@section('title','产业链条')

@section('actions')
    <a href="{{ url('admin/services/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">产业链条</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $services->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $services->caption }}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">页面内容</h4>
            </div>
            <div class="panel-body">
                {!! $services->content !!}
            </div>
        </div>
    </div>
    @include('admin.partials.showsite')
@stop
