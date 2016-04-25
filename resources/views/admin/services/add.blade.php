@extends('layouts.admin-app')

@section('title','添加板块-产业链条')

@section('actions')
    <a href="{{ url('admin/services/home') }}" class="btn btn-danger pull-right">返回</a>
@stop

@section('breadcrumb')
    <li><a href="{{ url('admin/services/home') }}">产业链条</a></li>
    <li class="active">添加板块-产业链条</li>
@stop

@section('content')
    @include('admin.services.partials.form', [
        'title' => '添加板块-产业链条',
        'url' => url('admin/services/add'),
        'button' => '添加板块'
    ])
@endsection