@extends('layouts.admin-app')

@section('title','时令产品')

@section('actions')
    <a href="{{ url('admin/portfolio/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">时令产品</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">{{ $portfolio->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $portfolio->caption }}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">页面内容</h4>
            </div>
            <div class="panel-body">
                {!! $portfolio->content !!}
            </div>
        </div>
    </div>
    @include('admin.partials.showsite')
@endsection