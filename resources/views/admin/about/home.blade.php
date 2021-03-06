@extends('layouts.admin-app')

@section('title','关于天美')

@section('actions')
    <a href="{{ url('admin/about/edit') }}" class="btn btn-primary">编辑</a>
@stop

@section('breadcrumb')
    <li class="active">关于天美</li>
@stop

@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4>{{ $about->title }}</h4>
            </div>
            <div class="panel-body">
                {{ $about->caption }}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">页面内容</h4>
            </div>
            <div class="panel-body">
                {!! $about->content !!}
            </div>
        </div>
    </div>
    @include('admin.partials.showsite')
@endsection